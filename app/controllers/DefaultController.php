<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $vars = [
            'id' => "some id",
            'name' => "some name"
        ];
        $this->view->render('Main page', $vars);
    }

    public function contactsAction()
    {
        //for example - //$this->view->redirect('https://google.com');
        $this->view->render('Contacts page');
    }

}