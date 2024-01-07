<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Admin Credentials
     |--------------------------------------------------------------------------
     |
     | This option controls the admin credentials.
     |
     */
    'credentials' => [
        'admin' => [
            'email'     => env('ADMIN_EMAIL'),
            'password'  => env('ADMIN_PASS')
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Assets
    |--------------------------------------------------------------------------
    |
    | This option controls the assets.
    |
    */
    'assets' => [
        'images' => [
            'profile' => [
                'photo' => [
                    'disk' => 'public',
                    'path' => 'images/profile',
                    'default' => 'img/profile-photo-default.jpg'
                ]
            ]
        ]
    ]
];
