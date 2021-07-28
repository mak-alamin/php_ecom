<?php

use APP\Core\Application;
require_once __DIR__ . '/vendor/autoload.php';

//Config
$db_config = [
    'host' => "localhost",
    'dbname' => "php_ecom",
    'username' => "root",
    'password' => ""
];

//Initialize the Application Class
$app = new Application($db_config,__DIR__);

$app->db->applyMigrations();