<?php

namespace models;


class Tasks
{
    public $id;

    public $name;

    public $status;

    public $project_id;

    public $priority;

    public $deadline_date;

    public $created_at;

    public $updated_at;

    public static function insetSQL($name, $created_at, $project_id)
    {
        return "INSERT INTO `tasks` (`name`, `created_at`, `project_id`) VALUES ('".$name."', '".$created_at."', '".$project_id."');";
    }

    public static function findById($id)
    {
        return "SELECT * from tasks where id = '" . $id . "'";
    }

    public static function findByProjectId($project_id)
    {
        return "SELECT * from tasks where project_id = '" . $project_id . "'";
    }
}