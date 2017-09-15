<?php

require __DIR__ .'/../vendor/autoload.php';


$app = new \DI\Bridge\Slim\App;

$providers = [

];

$bootstrap = new \Skeleton\Bootstrap($providers);
$bootstrap->addProvider(new \Skeleton\ServiceProvider());
$bootstrap->addProviders($providers);
$bootstrap->build($app);

$app->run();
