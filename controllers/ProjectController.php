<?php

namespace controllers;

use core\Application;
use core\base\WebController;
use models\Project;

class ProjectController extends WebController
{
    public function actionAdd()
    {
        $app = Application::getInstance();
        $result = $app->db->setSql(Project::insetSQL($_POST['name'], date('Y-m-d h:m:s'), $_POST['user_id']))->exec();
    }

    public function actionAddDate()
    {
        $app = Application::getInstance();
        $result = $app->db->setSql(Project::insetDate($_POST['date']))->exec();
    }

    public function actionGetAll()
    {
        $app = Application::getInstance();
        $result = $app->db->all(Project::findByUserId($_SESSION['id']));
        echo(json_encode($result));
    }
}