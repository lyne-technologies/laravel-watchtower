<?php
return [
    'notifications' =>  [
        'email' =>  [
            'active' => env('WATCHTOWER_EMAIL_ACTIVE', false),
            'recipients' => env('WATCHTOWER_EMAIL_RECIPIENTS', ''), // Comma delimited list
        ],
        'sms' =>  [
            'active' => env('WATCHTOWER_SMS_ACTIVE', false),
            'recipients' => env('WATCHTOWER_SMS_RECIPIENTS', ''), // Comma delimited list
        ],
        'slack' =>  [
            'active' => env('WATCHTOWER_SLACK_ACTIVE', false),
            'hook' => env('WATCHTOWER_SLACK_HOOK'),
            'channel' => env('WATCHTOWER_SLACK_CHANNEL'),
        ],
        'teams' =>  [
            'active' => env('WATCHTOWER_TEAMS_ACTIVE', false),
        ],
        'local' =>  [
            'active' => env('WATCHTOWER_LOCAL_ACTIVE', false),
            'prune' => env('WATCHTOWER_LOCAL_PRUNE', 0),
            'routes' => [
                'index' => [
                    'url' => '/watchtower',
                    'name' => 'watchtower.index',
                    'view' => 'laravel-watchtower::index',
                    'middleware' => ['web'],
                ],
                'show' => [
                    'url' => '/watchtower/{error}',
                    'name' => 'watchtower.show',
                    'view' => 'laravel-watchtower::show',
                    'middleware' => ['web'],
                ],
                'solve' => [
                    'url' => '/watchtower/{error}/solve',
                    'name' => 'watchtower.solve',
                    'middleware' => ['web'],
                ],
            ]
        ],
    ],
];
