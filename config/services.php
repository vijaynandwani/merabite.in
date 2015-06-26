<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key' => '',
        'secret' => '',
    ],

    'google' => [
        'client_id' => '653148111358-4v98rdvvbqpb2rehpqv9fqdm0o1ja1f7.apps.googleusercontent.com',
        'client_secret' => 'RshKN9wxxzg2MD1GwbeDv7JU',
        'redirect' => 'http://localhost/laravel/merabite/public/auth/google',
    ],

];
