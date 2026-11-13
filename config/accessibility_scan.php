<?php

return [
    /*
     * Diese Werte dienen als zentrale Defaults für die spätere
     * Scan-Entscheidung. Die konkrete Logik soll nur hierüber lesen
     * und nicht mehr in den Commands verstreut werden.
     */
    'fingerprint' => [
        'scan_date_field' => 'fingerprint_scan_date',
        'scan_window_minutes' => 60,
        'stale_after_minutes' => 10080,
        'missing_fingerprint_action' => 'scan',
        'undeterminable_fingerprint_action' => 'scan',
        'unknown_fingerprint_action' => 'scan',
        'unchanged_fingerprint_action' => 'skip',
        'changed_fingerprint_action' => 'scan',
    ],

    /*
     * Regelbasis für die Scan-Entscheidung.
     * Reihenfolge ist wichtig: die erste passende Regel gewinnt.
     */
    'decision_matrix' => [
        [
            'name' => 'missing-or-undeterminable-fingerprint',
            'conditions' => [
                ['field' => 'fingerprint_state', 'operator' => 'in', 'value' => ['missing', 'undeterminable', null, '']],
            ],
            'decision' => [
                'action' => 'scan',
                'reason' => 'fingerprint_unavailable',
            ],
        ],
        [
            'name' => 'recent-unchanged-fingerprint',
            'conditions' => [
                ['field' => 'fingerprint_state', 'operator' => 'eq', 'value' => 'unchanged'],
                ['field' => 'within_scan_window', 'operator' => 'eq', 'value' => true],
            ],
            'decision' => [
                'action' => 'skip',
                'reason' => 'fingerprint_unchanged_recent',
            ],
        ],
        [
            'name' => 'stale-fingerprint',
            'conditions' => [
                ['field' => 'fingerprint_age_minutes', 'operator' => 'gte', 'value' => 10080],
            ],
            'decision' => [
                'action' => 'scan',
                'reason' => 'fingerprint_stale',
            ],
        ],
    ],

    'default_decision' => [
        'action' => 'scan',
        'reason' => 'no_rule_matched',
    ],

    'determine_scan' => [
        'lock_key' => 'determine:scan:lock',
        'lock_ttl_seconds' => 14400,
        'lock_behavior' => 'skip',
        'wait_seconds' => 0,
    ],

    // Unset paths keep the existing local/global Node installation usable.
    'runtime' => [
        'node_modules_path' => env('A11Y_NODE_MODULES_PATH'),
        'pa11y_binary' => env('A11Y_PA11Y_BINARY', 'pa11y'),
    ],

    'browser' => [
        // Puppeteer >= 23 uses acceptInsecureCerts; older versions use ignoreHTTPSErrors.
        'tls_option' => env('A11Y_BROWSER_TLS_OPTION', 'ignoreHTTPSErrors'),
        'path' => env('A11Y_BROWSER_PATH'),
        'preference' => env('A11Y_BROWSER_PREFERENCE', 'auto'),
        'use_temp_profile' => env('A11Y_BROWSER_TEMP_PROFILE', true),
        'args' => [
            '--no-sandbox',
            '--disable-setuid-sandbox',
            '--disable-dev-shm-usage',
            '--disable-crash-reporter',
            '--disable-crashpad',
            '--disable-breakpad',
        ],
    ],
];
