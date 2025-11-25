<?php

namespace App\Services;

use App\Models\Company;

class ScoreChartService
{
    /**
     * Erzeugt ein kleines Liniendiagramm (Score-Verlauf) als PNG
     * und gibt es als data:image/png;base64,... String zurück.
     *
     * @param Company $company
     * @param array   $daily   // array von ['day' => 'YYYY-MM-DD', 'score' => int]
     * @return string|null
     */
    public function createScoreChartBase64(Company $company, array $daily): ?string
    {
        if (empty($daily)) {
            return null;
        }

        if (!extension_loaded('gd')) {
            return null;
        }

        // Bildgröße und Ränder
        $width  = 1200;
        $height = 200;
        $marginLeft   = 40;
        $marginRight  = 20;
        $marginTop    = 20;
        $marginBottom = 30;

        $img = imagecreatetruecolor($width, $height);

        // Farben
        $bgColor      = imagecolorallocate($img, 255, 255, 255);
        $axisColor    = imagecolorallocate($img, 200, 200, 200);
        $lineColor    = imagecolorallocate($img, 23, 139, 255); // blau
        $textColor    = imagecolorallocate($img, 80, 80, 80);
        $gridColor    = imagecolorallocate($img, 235, 235, 235);

        // Hintergrund
        imagefilledrectangle($img, 0, 0, $width, $height, $bgColor);

        $plotWidth  = $width - $marginLeft - $marginRight;
        $plotHeight = $height - $marginTop - $marginBottom;

        // Y-Skala: 0–100
        $minScore = 0;
        $maxScore = 100;

        // Grid-Linien für Y (alle 20 Punkte)
        for ($yVal = 0; $yVal <= 100; $yVal += 20) {
            $yPos = $marginTop + $plotHeight - ($yVal - $minScore) / ($maxScore - $minScore) * $plotHeight;
            imageline($img, $marginLeft, (int)$yPos, $marginLeft + $plotWidth, (int)$yPos, $gridColor);
            imagestring($img, 1, 5, (int)$yPos - 4, (string)$yVal, $textColor);
        }

        // X-Achse, Y-Achse
        // Y-Achse
        imageline(
            $img,
            $marginLeft,
            $marginTop,
            $marginLeft,
            $marginTop + $plotHeight,
            $axisColor
        );
        // X-Achse
        imageline(
            $img,
            $marginLeft,
            $marginTop + $plotHeight,
            $marginLeft + $plotWidth,
            $marginTop + $plotHeight,
            $axisColor
        );

        // Punkte vorbereiten
        $count = count($daily);
        if ($count === 1) {
            // Wenn nur ein Punkt existiert, kopieren wir ihn doppelt, damit es wenigstens ein Strich ist
            $daily[] = $daily[0];
            $count = 2;
        }

        $stepX = $plotWidth / max(1, $count - 1);
        $points = [];

        foreach (array_values($daily) as $index => $row) {
            $score = (int) ($row['score'] ?? 0);
            $score = max($minScore, min($maxScore, $score));

            $x = $marginLeft + $index * $stepX;
            $y = $marginTop + $plotHeight - ($score - $minScore) / ($maxScore - $minScore) * $plotHeight;

            $points[] = ['x' => $x, 'y' => $y];
        }

        // Linie zeichnen
        for ($i = 0; $i < count($points) - 1; $i++) {
            $p1 = $points[$i];
            $p2 = $points[$i + 1];
            imageline(
                $img,
                (int)$p1['x'],
                (int)$p1['y'],
                (int)$p2['x'],
                (int)$p2['y'],
                $lineColor
            );
        }

        // Optional: Punkte markieren
        foreach ($points as $p) {
            imagefilledellipse($img, (int)$p['x'], (int)$p['y'], 4, 4, $lineColor);
        }

        // Bild in einen String schreiben
        ob_start();
        imagepng($img);
        $imageData = ob_get_clean();

        imagedestroy($img);

        if (!$imageData) {
            return null;
        }

        $base64 = base64_encode($imageData);

        return 'data:image/png;base64,' . $base64;
    }
}
