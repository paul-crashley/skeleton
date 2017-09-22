<?php

return [
    'settings.displayErrorDetails' => \Skeleton\debug(),
    'settings.debug' => \Skeleton\env('APP_DEBUG'),
    'settings.environment' => \Skeleton\env('APP_ENV'),

    'providers' => [
        \Skeleton\ServiceProvider::class,
    ]
];
