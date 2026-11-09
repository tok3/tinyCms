<?php

namespace App\Services;

class WidgetScriptProfileResolver
{
    /** @param array<string, bool> $features Request-local set of active feature slugs. */
    public function fixstern(string $ulid, array $features): string
    {
        $override = [
            '01JRT7ABK98TYXEXM62N11NHGR' => 'tts_eztext_ezspeak',
            '01JRSPY9VYFFM60FCSXX52BP8T' => 'tts_eztext_ezspeak',
            '01JWXJ42G8GZVCMEN1CQMPSD49' => 'futtermedicus',
        ][$ulid] ?? null;

        if ($override !== null) {
            return $override;
        }

        if (isset($features['leichte-sprache'])) {
            return 'tts_eztext_ezspeak';
        }

        $combination = (isset($features['eztext']) ? 4 : 0)
            | (isset($features['ezspeak']) ? 2 : 0)
            | (isset($features['screen-reader']) ? 1 : 0);

        if ($combination !== 0) {
            return [
                1 => 'tts',
                2 => 'ezspeak',
                3 => 'tts_ezspeak',
                4 => 'eztext',
                5 => 'tts_eztext',
                6 => 'eztext_ezspeak',
                7 => 'tts_eztext_ezspeak',
            ][$combination];
        }

        // These fallbacks follow all regular combinations in the original chain.
        foreach (['eztext-only' => 'eztext_only', 'ezspeak-only' => 'ezspeak_only', 'eztext-ezspeak-only' => 'eztext_ezspeak_only'] as $feature => $script) {
            if (isset($features[$feature])) {
                return $script;
            }
        }

        return 'standard';
    }
}
