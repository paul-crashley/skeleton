<?php

require __DIR__ .'/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ .'/../');
$dotenv->load();

$providers = [
    \Skeleton\ServiceProvider::class,
];

$app = new \Skeleton\App($providers);

$app->run();
