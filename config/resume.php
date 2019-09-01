<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Seeded user credentials
    |
    | NOTE: Must syncronize with:
    |   .env
    |   database/seeds/UsersTableSeeder.php
    |--------------------------------------------------------------------------
     */

    'credentials' => [
        'admin' => [
            'email'     => env('ADMIN_EMAIL'),
            'password'  => env('ADMIN_PASS')
        ]
    ]
];
