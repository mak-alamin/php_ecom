<?php 

 namespace APP\Core;

 use APP\Core\Application;
 
 class Controller{
    
    public $method;

    public function __construct()
    {
       $this->method = strtolower($_SERVER['REQUEST_METHOD']);   
    }

    public function render($view, $params = [])
    {
        // echo $view;
        // die();
        return Application::$app->router->render_view($view, $params);
    }
 }