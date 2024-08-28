<?php

namespace App\Helpers;

class FontHelper
{
    /**
     * Listet alle Schriftarten in einem Verzeichnis auf.
     *
     * @param string $directory
     * @return array
     */
    public static function listFonts($directory)
    {
        $fonts = [];

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory)
        );

        foreach ($iterator as $file)
        {
            if ($file->isFile() && preg_match('/\.(ttf|otf)$/', $file->getFilename()))
            {
                $fontName = pathinfo($file->getFilename(), PATHINFO_FILENAME);
                $fonts[$fontName] = $fontName;
            }
        }

        ksort($fonts); // Alphabetisch sortieren

        return $fonts;
    }

    /**
     * Gibt den Pfad einer Schriftart basierend auf ihrem Namen zurück.
     *
     * @param string $directory
     * @param string $fontName
     * @return string|null
     */
    public static function getFontPath($directory, $fontName)
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory)
        );

        foreach ($iterator as $file)
        {
            if ($file->isFile() && preg_match('/\.(ttf|otf)$/', $file->getFilename()))
            {
                if (pathinfo($file->getFilename(), PATHINFO_FILENAME) === $fontName)
                {

                    return basename($directory).'/' . str_replace($directory . '/', '', $file->getPathname());
                }
            }
        }

        return null;
    }
}
