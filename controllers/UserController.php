<?php

namespace controllers;

use core\Application;
use core\base\WebController;
use models\User;

class UserController extends WebController
{
    public function actionIndex()
    {
        echo '/** class user action index */<br>';
    }

    public function actionLogin()
    {
        $app = Application::getInstance();
        $app->session->set('id', null);
        $app->session->set('email', null);
        if($app->request->isPost){
            if(isset($_POST['email'])){
                $result = $app->db->one(User::findByEmail($_POST['email']));
                if(!empty($result)){
                    if($_POST['password'] == $result['password']){
                        $app->session->set('id', $result['id']);
                        $app->session->set('email', $result['email']);
                        $app->request->redirectTo('/');
                    } else{
                        $message = "email or password not correct";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                }
            }
        }

        $this->view->render('user/login', ["title" => "Login ToDo List",/*some value*/]);
    }

    public function actionLogout()
    {
        $app = Application::getInstance();

        $app->request->redirectTo('/user/login');
    }

    public function actionRegistration()
    {
        $app = Application::getInstance();

        if($app->request->isPost) {
            $app->db->setSql(User::insetSQL($_POST['email'], $_POST['password'], date('Y-m-d h:m:s')))->exec();
            $result = $app->db->one(User::findByEmail($_POST['email']));
            $app->session->set('id', $result['id']);
            $app->session->set('email', $result['email']);
            $app->request->redirectTo('/');
        }

        $this->view->render('user/register', ["title" => "Register ToDo List",/*some value*/]);
    }
}