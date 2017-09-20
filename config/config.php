<?php

return [
    'settings.displayErrorDetails' => \Skeleton\debug(),

    'logger' => [
        'name' => \Skeleton\env('APP_NAME', 'skeleton'),
        'level' => Monolog\Logger::DEBUG,
        'path' => __DIR__ . '/../logs/app.log',
    ],

    'providers' => [
        \Skeleton\ServiceProvider::class,
    ]
];
