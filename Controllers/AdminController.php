<?php 

namespace APP\Controllers;

session_start();

use APP\Core\Controller;
use APP\Controllers\Admin\ProfileController;
use APP\Controllers\Admin\UsersController;

class AdminController extends Controller{
    
    public $controller;

    public function index()
    {
        if( ! isset($_SESSION['name']) ){
            session_destroy();
            header('Location: ' . ROOT_URI . '/login');
            exit;
        }

        $params = [
            'user_id'  =>  $_SESSION['user_id'],
            'name' => $_SESSION['name'],
            'email' => $_SESSION['email']
        ];

        if( isset($_GET['page']) ){
            $page = $_GET['page'];

            switch ($page) {
                case 'users':
                    $this->controller = new UsersController();
                    $params['users'] = $this->controller->data;
                    break;
               
                case 'profile':
                    $this->controller = new ProfileController();
                    break;
                
                default:
                    $this->render('admin/_404');
                    break;
            }

            $this->render("admin/$page", $params);
            return;
     
        } else {
            $this->render('admin/index', $params);
        }
    }
}