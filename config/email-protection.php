<?php

return [
    'source_url' => env(
        'DISPOSABLE_EMAIL_BLOCKLIST_URL',
        'https://cdn.jsdelivr.net/gh/castle/disposable-email-domains/disposable-email-domains.txt',
    ),

    'blocklist_path' => env(
        'DISPOSABLE_EMAIL_BLOCKLIST_PATH',
        storage_path('app/security/disposable-email-domains.txt'),
    ),

    'fallback_path' => resource_path('email/disposable-email-domains.txt'),

    'minimum_domains' => 500,

    'reserved_domains' => [
        'example.com',
        'example.net',
        'example.org',
        'invalid',
        'localhost',
        'test',
    ],
];
