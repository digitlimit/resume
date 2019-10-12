<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Google Captcha settings
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for Google Captcha
    |
    */

    'v3' => [
        'key' => env('RECAPTCHA_SITE_KEY'),
        'secret' => env('RECAPTCHA_SECRET'),
        'api' => env('RECAPTCHA_API_URL'),
        'field' => env('RECAPTCHA_FIELD', 'captcha')
    ],

    'v2' => [
        'key' => env('RECAPTCHA_V2_SITE_KEY'),
        'secret' => env('RECAPTCHA_V2_SECRET'),
        'api' => env('RECAPTCHA_V2_API_URL'),
        'field' => env('RECAPTCHA_V2_FIELD', 'recaptcha')
    ]
];