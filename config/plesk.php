<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Plesk API Configuration
    |--------------------------------------------------------------------------
    |
    | Configure your Plesk API connection settings here.
    |
    */

    'url' => env('PLESK_URL', 'https://localhost:8443'),

    'username' => env('PLESK_USERNAME', ''),

    'password' => env('PLESK_PASSWORD', ''),

    'api_key' => env('PLESK_API_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | SSL Verification
    |--------------------------------------------------------------------------
    |
    | Set to false to disable SSL certificate verification (not recommended
    | for production).
    |
    */

    'verify_ssl' => env('PLESK_VERIFY_SSL', true),

    /*
    |--------------------------------------------------------------------------
    | Timeout
    |--------------------------------------------------------------------------
    |
    | Request timeout in seconds.
    |
    */

    'timeout' => env('PLESK_TIMEOUT', 30),

    /*
    |--------------------------------------------------------------------------
    | Retry
    |--------------------------------------------------------------------------
    |
    | Number of retries for failed requests.
    |
    */

    'retry' => [
        'times' => env('PLESK_RETRY_TIMES', 3),
        'sleep' => env('PLESK_RETRY_SLEEP', 100),
    ],
];
