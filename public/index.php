<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use APP\Core\Application;
use APP\Controllers\PageController;
use APP\Controllers\AdminController;
use APP\Controllers\RegisterController;

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

$route->get('/register', [RegisterController::class, 'register']);
$route->post('/register', [RegisterController::class, 'register']);

$route->get('/login', [RegisterController::class, 'login']);
$route->post('/login', [RegisterController::class, 'login']);

$route->get('/admin', [AdminController::class, 'index']);


//Kick Off
$app->run();