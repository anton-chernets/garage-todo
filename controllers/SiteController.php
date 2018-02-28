<?php

namespace controllers;

use core\base\WebController;

class SiteController extends WebController
{
    public function actionIndex()
    {
        if(isset($_SESSION['id']))
            return $this->render("index", ["title" => "ToDo List", "user_id" => $_SESSION['id'], "email" => $_SESSION['email']]);
        else
            return $this->render("../user/login", ["title" => "Login ToDo List"/*some value*/]);
    }

    public function actionError()
    {
        echo 'You have error<br>';
    }
}