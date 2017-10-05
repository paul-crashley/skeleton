<?php

return [
    'providers' => [
        \Skeleton\SkeletonServiceProvider::class,
        \App\AppServiceProvider::class,
    ],
    'middleware' => [
        \App\Http\Middleware\Cors::class,
    ]
];
