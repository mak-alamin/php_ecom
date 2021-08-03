<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use APP\Core\Application;
use APP\Controllers\PageController;
use APP\Controllers\AdminController;
use APP\Controllers\UserController;

$protocol = isset( $_SERVER['HTTPS']) ? 'https://' : 'http://';

//Define Constants
const PROJECT_DIR = 'php_ecom';
define('ROOT_DIR', dirname(__DIR__) );
define('ROOT_URI', $protocol . $_SERVER['HTTP_HOST'] . '/' . PROJECT_DIR );
const APP_ASSETS = ROOT_URI . '/public/assets';


//Config
$db_config = [
    'host' => "localhost",
    'dbname' => "php_ecom",
    'username' => "root",
    'password' => ""
];

//Initialize the Application Class
$app = new Application($db_config, ROOT_DIR);

//Router Instance
$route = $app->router;


//Your Routes
$route->get('/', 'home');
$route->get('/about', [PageController::class, 'about']);

$route->get('/services', [PageController::class, 'service']);

$route->get('/contact', [PageController::class, 'contact']);
$route->post('/contact', [PageController::class, 'handleContact']);

$route->get('/register', [UserController::class, 'register']);
$route->post('/register', [UserController::class, 'register']);

$route->get('/login', [UserController::class, 'login']);
$route->post('/login', [UserController::class, 'login']);

$route->get('/admin', [AdminController::class, 'index']);


//Kick Off
$app->run();