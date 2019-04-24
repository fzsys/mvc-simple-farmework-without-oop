<?php

namespace app\controllers;

use app\core\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        echo 'main page';
    }

    public function contactsAction()
    {
        echo 'contacts page';
    }

}