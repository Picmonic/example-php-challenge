<?php

/*
 * This file is part of Laravel GitHub.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | GitHub Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like. Note that the 3 supported authentication methods are:
    | "application", "password", and "token".
    |
    */

    'connections' => [

        'main' => [
            'token'   => env('GITHUB_TOKEN', 'enter-github-token'),
            'method'  => env('GITHUB_METHOD', 'token'),
            'baseUrl' => env('GITHUB_BASEURL', 'https://api.github.com/'),
            'version' => env('GITHUB_VERSION', 'v3'),
            'clientId' => env('GITHUB_CLIENTID', null),
            'clientSecret' => env('GITHUB_CLIENT_SECRET', null),
            'username' => env('GITHUB_USERNAME', null),
            'password' => env('GITHUB_PASSWORD', null)
        ],

    ],

];
