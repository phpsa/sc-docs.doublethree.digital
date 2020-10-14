<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Sites
    |--------------------------------------------------------------------------
    |
    | Each site should have root URL that is either relative or absolute. Sites
    | are typically used for localization (eg. English/French) but may also
    | be used for related content (eg. different franchise locations).
    |
    */

    'sites' => [

        'v2.0' => [
            'name' => config('app.name'),
            'locale' => 'en_US',
            'url' => '/v2.0/',
        ],

        'v2.1' => [
            'name' => config('app.name'),
            'locale' => 'en_US',
            'url' => '/v2.1/',
        ],

    ],
];
