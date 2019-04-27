<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function registerAction()
    {
        if (!empty($_POST)) {
            $this->view->location('/account/register');
        }
        $this->view->render('Register page');
    }

    public function loginAction()
    {
        $this->view->render('Login page');
    }
}
