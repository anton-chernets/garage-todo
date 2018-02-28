<?php

namespace models;


class Project
{
    public $id;

    public $name;

    public $created_at;

    public $updated_at;

    public $deadline_date;

    public $user_id;

    public static function insetSQL($name, $created_at, $user_id)
    {
        return "INSERT INTO `projects` (`name`, `created_at`, `user_id`) VALUES ('".$name."', '".$created_at."', '".$user_id."');";
    }

    public static function insetDate($date)
    {
        return "INSERT INTO `projects` (`deadline`) VALUES ('".$date."');";
    }

    public static function findById($id)
    {
        return "SELECT * from projects where id = '" . $id . "'";
    }

    public static function findByUserId($user_id)
    {
        return "SELECT * from projects where user_id = '" . $user_id . "'";
    }
}