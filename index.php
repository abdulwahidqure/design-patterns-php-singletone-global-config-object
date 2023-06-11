<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Configuration;


// Usage:
$config = Configuration::getInstance();

// Get a configuration setting
$dbHost = $config->getSetting('db_host');
echo "Database Host: " . $dbHost . "\n";

// Set a configuration setting
$config->setSetting('db_user', 'new_user');

// Get the updated setting
$dbUser = $config->getSetting('db_user');
echo "Database User: " . $dbUser . "\n";
die('index');
