<?php

require __DIR__ .'/../vendor/autoload.php';

$app = new \DI\Bridge\Slim\App();

\Skeleton\Bootstrap::build($app);

$app->run();
