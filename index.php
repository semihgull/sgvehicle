<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . '/vendor/autoload.php';

date_default_timezone_set (env_ ('TIMEZONE', 'Europe/Istanbul'));

$app = new \Core\Bootstrap();


require __DIR__ . './app/routes.php';

$app->run ();