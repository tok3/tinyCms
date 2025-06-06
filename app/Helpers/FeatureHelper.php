<?php

namespace App\Helpers;

class FeatureHelper
{
    /**
     * Prüft, ob ein Feature sichtbar sein soll.
     *
     * @param  int|string    $featureId          Die ID des aktuellen Features
     * @param  array<int|string>  $excludedIds    Array mit ausgeschlossenem IDs
     * @return bool                             True, wenn nicht ausgeschlossen (also sichtbar), sonst false
     */
    public static function isVisible($featureId, array $excludedIds): bool
    {
        // Wenn $featureId NICHT in $excludedIds liegt, geben wir true zurück
        return ! in_array($featureId, $excludedIds);
    }
}
