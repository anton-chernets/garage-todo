<?php

namespace controllers;

use core\Application;
use core\base\WebController;
use models\Project;
use models\Tasks;

class ProjectController extends WebController
{
    public function actionAdd()
    {
        $app = Application::getInstance();
        if(isset($_POST['name'])) {
            if($app->db->setSql(Project::insetSQL($_POST['name'], date('Y-m-d H:m:s'), $_SESSION['id']))->exec())
                echo "project saved";
            else
                echo "project not saved";
        } else
            echo "Enter data not correct";
    }

    public function actionRem()
    {
        $app = Application::getInstance();
        if(isset($_POST['id'])) {
            $tasks = $app->db->all(Tasks::findAllByProjectId($_POST['id']));
            foreach ($tasks as $task)
                $app->db->setSql(Tasks::removeTask($task['id']))->exec();
            if($app->db->setSql(Project::removeProject($_POST['id']))->exec())
                echo "the project and its tasks have been deleted";
            else
                echo "project not removed";

        } else
            echo "Enter not correct";
    }

    public function actionUpdate()
    {
        $app = Application::getInstance();
        if(isset($_POST['id']) && isset($_POST['name'])) {
            if($app->db->setSql(Project::updateProject($_POST['id'], $_POST['name'], date('Y-m-d H:m:s')))->exec())
                echo "project edited";
            else
                echo "project not edited";
        } else
            echo "Enter not correct";
    }

    public function actionAddDeadline()
    {
        $app = Application::getInstance();
        if(isset($_POST['id']) && isset($_POST['date'])) {
            if($app->db->setSql(Project::insetDate($_POST['id'], $_POST['date'], date('Y-m-d H:m:s')))->exec())
                echo "deadline add";
            else
                echo "deadline not add";
        } else
            echo "Enter not correct";
    }

    public function actionGetAllByUser()
    {
        $app = Application::getInstance();
        $result = $app->db->all(Project::findByUserId($_SESSION['id']));
        echo json_encode($result);
    }
}