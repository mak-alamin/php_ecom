<?php 

namespace APP\Controllers\Admin;

use APP\Core\Controller;
use APP\Models\Admin\UsersModel;

class UsersController extends Controller{

    public $model;
    public $data;

    public function __construct()
    {
        $this->model = new UsersModel();

        $this->data = $this->model->getAllData('users');
    }
}