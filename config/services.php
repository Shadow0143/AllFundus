<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
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

    'google' => [
        'client_id' => '423669137501-22h8dpnb4ib627vl3nq6099kbt3tph30.apps.googleusercontent.com', //USE FROM Google DEVELOPER ACCOUNT
        'client_secret' => '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', //USE FROM Google DEVELOPER ACCOUNT
        'redirect' => 'http://127.0.0.1:8003/google/callback'
    ],


    'facebook' => [
        'client_id' => '2430696760416730', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => '3dbb592be013a9c74a8baa3423a077c0', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => 'http://127.0.0.1:8003/fb/callback'
    ],
    


];