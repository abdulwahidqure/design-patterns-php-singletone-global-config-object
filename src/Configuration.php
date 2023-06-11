<?php

namespace App;


class Configuration
{
    private static $instance;
    private $settings;

    private function __construct()
    {
        // Private constructor to prevent instantiation from outside
        $this->settings['app'] = require_once(__DIR__ . '/../app/config/app.php');
        $this->settings['session'] = require_once(__DIR__ . '/../app/config/session.php');
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getSetting($key)
    {
        $keys = explode('.', $key);
        $value = $this->settings;

        foreach ($keys as $nestedKey) {
            if (isset($value[$nestedKey])) {
                $value = $value[$nestedKey];
            } else {
                return null; // Key does not exist, return null
            }
        }

        return $value;
    }


    // public function setSetting($key, $value)
    // {
    //     $this->settings[$key] = $value;
    // }
}
