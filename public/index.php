<?php

require __DIR__ .'/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ .'/../');
$dotenv->load();

$app = new \Skeleton\App();

\Skeleton\Bootstrap::build($app);

$app->run();
