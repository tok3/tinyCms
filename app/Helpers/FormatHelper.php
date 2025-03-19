<?php

namespace App\Helpers;

class FormatHelper
{
    /**
     * Wandelt einen HEX-Farbwert in RGBA um.
     *
     * @param string $hexColor Hex-Farbcode (z. B. #ff0000)
     * @param float $alpha Transparenzwert (0 - 1)
     * @return string RGBA-Wert als String
     */
    public static function hexToRgba(string $hexColor, float $alpha = 1.0): string
    {
        $hexColor = ltrim($hexColor, '#');

        if (strlen($hexColor) === 3) {
            $hexColor = preg_replace('/(.)/', '$1$1', $hexColor);
        }

        if (strlen($hexColor) !== 6) {
            return 'rgba(0, 0, 0, ' . $alpha . ')'; // Fallback auf Schwarz
        }

        list($r, $g, $b) = sscanf($hexColor, "%02x%02x%02x");

        return "rgba($r, $g, $b, $alpha)";
    }

    /**
     * Kürzt einen String auf eine bestimmte Länge und fügt "..." hinzu.
     *
     * @param string $string Der Originalstring
     * @param int $length Maximale Länge
     * @return string Gekürzter String mit "..."
     */
    public static function truncateString(string $string, int $length = 50): string
    {
        return strlen($string) > $length ? substr($string, 0, $length) . '...' : $string;
    }

    /**
     * Formatiert eine Zahl als Währung (z. B. 1000 → 1.000,00 €).
     *
     * @param float $amount Betrag
     * @param string $currency Währungssymbol
     * @return string Formatierte Währungsangabe
     */
    public static function formatCurrency(float $amount, string $currency = '€'): string
    {
        return number_format($amount, 2, ',', '.') . ' ' . $currency;
    }
}
