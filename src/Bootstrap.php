<?php

namespace Skeleton;

use Dotenv\Dotenv;

class Bootstrap
{
    private static function setEnv()
    {
        $dotEnv = new Dotenv(__DIR__ . '/../');
        $dotEnv->load();
    }

    private static function getConfig(): array
    {
        $config = require __DIR__ . '/../config/app.php';
        return $config;
    }

    public static function getApp(): App
    {
        self::setEnv();

        $app = new App(self::getConfig());

        return $app;
    }

    public static function runApp()
    {
        self::getApp()->run();
    }
}
