<?php 

namespace APP\Controllers;

session_start();

use APP\Core\Controller;
use APP\Models\UserModel;

class UserController extends Controller{
    public array $message = [];

    public function register()
    {
        if ( $this->method == 'get') {
            $this->render('register');
        
        } elseif ($this->method == 'post' && isset($_POST['register'])) {
            if (empty($_POST)) {
           
                echo 'Please provide some data.';
           
            } else {
                $data = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'password' => $_POST['password'],
                ];
                
                $model = new UserModel();
                
                $inserted =  $model->insertData('users', $data);

                if ($inserted) {
                    $_SESSION['reg_success'] = "Your registration is successful!";
                } else {
                    $_SESSION['reg_failed'] = "Your registration is successful!";
                }

                header('Location: login');
                exit;
            }
        }
    }

    public function login()
    {
        if ( $this->method == 'get' ){
            //Log Out
            if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                session_destroy();
                $this->render('login');
                exit;
            }

            //Force redirect to admin page if logged in
            if (isset( $_SESSION['name'])) {
                header('Location: admin');
                exit;
            }

            $this->render('login');
        }

        if ($this->method == 'post' && isset($_POST['login'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $model = new UserModel();
            
            $data = $model->getData('users', "email='$email'");
            $allData = $model->getAllData('users');

            if (empty($allData)){
                header('Location: register');
                exit;
            }

            if(count($data) !== 1){
                die("Something went wrong! Please try again later.");
            }

            $params = [];

            if($email !== $data[0]['email']){   
                $params['email_err'] = "Email doesn't match!..." . $data[0]['email'];
            }
            
            if( ! password_verify( $password, $data[0]['password'])){
                $params['pass_err'] = "Password doesn't match";
            }

            if(isset($params['email_err']) || isset($params['pass_err'])){
                $this->render('login', $params );
                return;
            }

            $_SESSION['user_id'] = $data[0]['id'];
            $_SESSION['name'] = $data[0]['name'];
            $_SESSION['email'] = $data[0]['email'];

            header('Location: admin');
            exit;
        }
    }
}