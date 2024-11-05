<?php

// config/accounting.php

return [

    // Allgemeine Abrechnungsinformationen
    'currency' => 'EUR',                     // Standardwährung für Rechnungen
    'invoice_prefix' => 'INV-',               // Präfix für Rechnungsnummern
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
            'email' => 'info@aktion-barrierefrei.de',
        ],
        'business_process' => 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0',  // Peppol-Prozess
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
