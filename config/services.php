<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
    'google' => [
        'client_id' => '76602959168-0k4sk9hmgcrfsecuock2nv02ej3jt6fk.apps.googleusercontent.com',
        'client_secret' => 'hEFMTPLOT2PoCmWRXQWYplpY',
        'redirect' => 'http://kobevietnam.com.vn/auth/google/callback/',
    ],
    'facebook' => [
        'client_id' => '2429092744034363',
        'client_secret' => '44f2f70a057be0c8c35d1e29a8f7442b',
        'redirect' => 'https://kobevietnam.com.vn/auth/facebook/callback/',
    ],
];
