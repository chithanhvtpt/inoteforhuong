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
        'client_id' => '577642893093-8vbqdn6mjltbf8v99et5pashr5c40dj0.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
    ],

    'github' => [
        'client_id' => '909d961eb07bf3a71ba4',
        'client_secret' => 'a903ac40fe33f613cac25d7d9e80fa8aa3f96bb0',
        'redirect' => 'http://127.0.0.1:8000/callback/github',
    ],


];
