<?php

namespace models;

class Project
{

    /**
     *
     * @param string $name
     * @param string $created_at
     * @param int $user_id
     *
     * @return string
     */
    public static function insetSQL($name, $created_at, $user_id)
    {
        return "INSERT INTO `projects` (`name`, `created_at`, `user_id`) VALUES ('".$name."', '".$created_at."', '".$user_id."');";
    }

    /**
     *
     * @param int $id
     *
     * @return string
     */
    public static function removeProject($id)
    {
        return "DELETE from projects where id = '" . $id . "'";
    }

    /**
     *
     * @param int $id
     * @param string $name
     * @param string $updated_at
     *
     * @return string
     */
    public static function updateProject($id, $name, $updated_at)
    {
        return "UPDATE projects SET name = '" . $name . "' , updated_at = '" . $updated_at . "' where id = '" . $id . "'";
    }

    /**
     *
     * @param int $id
     * @param string $deadline
     * @param string $updated_at
     *
     * @return string
     */
    public static function insetDate($id, $deadline, $updated_at)
    {
        return "UPDATE projects SET deadline_date = '" . $deadline . "' , updated_at = '" . $updated_at . "' where id = '" . $id . "'";
    }

    /**
     *
     * @param int $user_id
     *
     * @return string
     */
    public static function findByUserId($user_id)
    {
        return "SELECT * from projects where user_id = '" . $user_id . "'";
    }

    /**
     *
     * @param int $id
     *
     * @return string
     */
    public static function findById($id)
    {
        return "SELECT * from projects where id = '" . $id . "'";
    }

}