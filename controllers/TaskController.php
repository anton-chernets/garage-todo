<?php

namespace controllers;

use core\base\WebController;
use core\Application;
use models\Tasks;

class TaskController extends WebController
{
    public function actionAdd()
    {
        $app = Application::getInstance();
        $result = $app->db->setSql(Tasks::insetSQL($_POST['name'], date('Y-m-d h:m:s'), $_POST['user_id']))->exec();
    }

    public function actionGetAll()
    {
        $app = Application::getInstance();
        $result = $app->db->all(Tasks::findByProjectId($_SESSION['id']));
        echo(json_encode($result));
    }
}