<?php

use App\Facades\Config;

class DatabaseConnection
{
    private static $instance;
    private $connection;

    private function __construct()
    {
        // Private constructor to prevent instantiation from outside
        $this->connection = mysqli_connect(
            Config::getSetting('app.db_host'),
            Config::getSetting('app.db_user'),
            Config::getSetting('app.db_password'),
            Config::getSetting('app.db_name')
        );
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
