<?php

namespace App\Facades;

use App\Configuration;

class Config
{
    protected static $configuration;

    public static function __callStatic($method, $arguments)
    {
        if (!self::$configuration) {
            self::$configuration = Configuration::getInstance();
        }

        if ($method === 'getSetting') {
            return self::$configuration->getSetting($arguments[0]);
        }

        throw new \BadMethodCallException("Method $method does not exist.");
    }
}
