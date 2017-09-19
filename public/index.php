<?php

require __DIR__ .'/../vendor/autoload.php';

$app = new \Skeleton\App();

\Skeleton\Bootstrap::build($app);

$app->run();
