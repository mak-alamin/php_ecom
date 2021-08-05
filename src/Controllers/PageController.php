<?php 

namespace APP\Controllers;

use APP\Core\Controller;

class PageController extends Controller{

    public function about()
    {
        $params = [
            'title' => 'About Us',
            'author' => 'Mosharof',
            'menu' => '1'
        ];

        $this->render('about', $params);
    }

    public function service()
    {
        $params = [
            'title' => 'Our Services',
            'author' => 'Mak'
        ];

        $this->render('service', $params);

    }

    public function contact()
    {
        echo "This is Contact Page";
    }

    public function handleContact()
    {
        echo "Handling Contact data";
    }
}
