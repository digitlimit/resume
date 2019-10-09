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
    ],

    'assets' => [
        'images' => [
            'profile' => [
                'photo' => [
                    'disk' => 'public',
                    'path' => 'images/profile',
                    'default' => 'assets/images/profile-photo-default.jpg'
                ]
            ]
        ]
    ]
];