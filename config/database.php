<?php
    return [
        'default' => 'mongodb',
        'connections' => [
            'mongodb' => [ 
                'driver' => 'mongodb',
                'host' => env('MONGO_HOST', 'localhost'),
                'port' => env('MONGO_PORT', 27017),
                'database' => env('MONGO_DATABASE'),
                'username' => env('MONGO_USERNAME'),
                'password' => env('MONGO_PASSWORD'),
                'options' => [
                    'database' => 'admin' // sets the authentication database required by mongo 3
                ]
            ],
        ],
        'migrations' => 'migrations',

        // /* REDIS DATABASE */
        // 'redis' => [
        //     'cluster' => false,
        //     'default' => [
        //         'host' => '127.0.0.1',
        //         'port' => '6379',
        //         'database' => 0,
        //     ]
        // ],
    ];