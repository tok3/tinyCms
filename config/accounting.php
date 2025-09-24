<?php

// config/accounting.php

return [

    // Allgemeine Abrechnungsinformationen
    'currency' => 'EUR',                     // Standardwährung für Rechnungen
    'invoice_prefix' => 'INV-',              // Präfix für Rechnungsnummern
    'tax_rate' => 19,                         // Standard-Mehrwertsteuersatz in Prozent

    // Firmendetails für den Verkäufer (Seller)
    'company_details' => [
        'name' => 'camindu GmbH',
        'global_id' => [
            'id' => '341995818',
            'scheme' => '0060',              // D-U-N-S-Nummer
        ],
        'tax_registration' => [
            'vat_id' => 'DE275889289',       // Umsatzsteuer-ID
            'tax_number' => '20412300425',   // Steuernummer (FC)
        ],
        'address' => [
            'street' => 'Behringstr. 13',
            'postal_code' => '63814',
            'city' => 'Mainaschaff',
            'country' => 'DE',
        ],
        'contact' => [
            'email' => 'info@aktion-barrierefrei.org',
        ],
        'bank' => [
            'iban' => 'DE77 7952 0070 0045 0403 13',
            'bic' => 'HYVE DEMM 407',
        ],
        'business_process' => 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0',  // Peppol-Prozess
    ],
    'sepa' => [
        'gid' => 'DE70030000024889900', //gläubiger indentifikationsnummer
        // Eine oder mehrere E-Mail-Adressen
        'csv_recipients' => explode(',', env('SEPA_CSV_RECIPIENTS', 'buchhaltung@example.org')),
    ],
    // Zahlungsanbieter (Payment Provider)
    'payment_providers' => [
        'default' => env('PAYMENT_PROVIDER', 'mollie'),

        'mollie' => [
            'api_key' => env('MOLLIE_API_KEY', ''),
            'webhook_url' => env('MOLLIE_WEBHOOK_URL', 'https://yourapp.com/mollie-webhook'),
        ],

        'stripe' => [
            'api_key' => env('STRIPE_API_KEY', ''),
        ],
    ],
];
