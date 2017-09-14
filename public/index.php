<?php

require __DIR__ .'/../vendor/autoload.php';

$app = new \DI\Bridge\Slim\App;

$providers = [

];

$bootstrap = new \Brash\Skeleton\Bootstrap($providers);
$bootstrap->build($app);

$app->run();
