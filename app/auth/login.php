<?php

use App\Facades\Config;

// object is available here from index.php
echo $config->getSetting('app.db_password');

//second option using facade
echo Config::getSetting('app.db_password');
