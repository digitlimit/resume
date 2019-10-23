<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Places Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default options for places. You may change these defaults
    | as required.
    |
    */

    'defaults' => [
        'driver' => 'google'
    ],

    /*
    |--------------------------------------------------------------------------
    | Place Providers
    |--------------------------------------------------------------------------
    |
    | This defines various providers configurations for place
    | The following providers are currently supported
    |
    | Supported: "google"
    */

    'providers' => [
        'google' => [
            'client_id' => env('GOOGLE_PLACE_API_KEY')
        ],
    ]
];