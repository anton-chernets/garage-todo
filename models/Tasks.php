<?php

namespace models;

class Tasks
{

    /**
     *
     * @param string $name
     * @param string $created_at
     * @param int $project_id
     * @param int $priority
     *
     * @return string
     */
    public static function insetSQL($name, $created_at, $project_id, $priority)
    {
        return "INSERT INTO `tasks` (`name`, `created_at`, `project_id`, `priority`) VALUES ('".$name."', '".$created_at."', '".$project_id."', '".$priority."');";
    }

    /**
     *
     * @param int $id
     *
     * @return string
     */
    public static function removeTask($id)
    {
        return "DELETE from tasks where id = '" . $id . "'";
    }

    /**
     *
     * @param int $id
     * @param string $name
     * @param string $updated_at
     *
     * @return string
     */
    public static function updateTaskName($id, $name, $updated_at)
    {
        return "UPDATE tasks SET name = '" . $name . "' , updated_at = '" . $updated_at . "' where id = '" . $id . "'";
    }

    /**
     *
     * @param int $id
     * @param int $new_priority
     * @param string $updated_at
     *
     * @return string
     */
    public static function updateTaskPriority($id, $new_priority, $updated_at)
    {
        return "UPDATE tasks SET priority = '" . $new_priority . "' , updated_at = '" . $updated_at . "' where id = '" . $id . "'";
    }

    /**
     *
     * @param int $id
     * @param string $value
     * @param string $updated_at
     *
     * @return string
     */
    public static function completeTask($id, $value, $updated_at)
    {
        return "UPDATE tasks SET status = '" . $value . "' , updated_at = '" . $updated_at . "' where id = '" . $id . "'";
    }

    /**
     * @return string
     */
    public static function findAll()
    {
        return "SELECT * from tasks";
    }

    /**
     *
     * @param int $id
     *
     * @return string
     */
    public static function findAllByProjectId($id)
    {
        return "SELECT id from tasks WHERE project_id = '" . $id . "'";
    }

    /**
     *
     * @param int $id
     *
     * @return string
     */
    public static function findMaxPriorityByProjectId($id)
    {
        return "SELECT * from tasks where priority=(SELECT MAX(priority) FROM tasks WHERE project_id = '" . $id . "')";
    }

    /**
     *
     * @param int $project_id
     * @param int $current_priority
     *
     * @return string
     */
    public static function findBeforePriorityByProjectId($project_id,  $current_priority)
    {
        return "SELECT * from tasks where priority < '" . $current_priority . "' AND project_id = '" . $project_id . "'";
    }

    /**
     *
     * @param int $project_id
     * @param int $current_priority
     *
     * @return string
     */
    public static function findAfterPriorityByProjectId($project_id, $current_priority)
    {
        return "SELECT * from tasks where priority > '" . $current_priority . "' AND project_id = '" . $project_id . "'";
    }

    /**
     *
     * @param int $id
     *
     * @return string
     */
    public static function findById($id)
    {
        return "SELECT * from tasks where id = '" . $id . "'";
    }

}