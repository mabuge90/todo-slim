<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-10
 * Time: 11:05
 */

namespace ToDo\Models;


class TasksModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUncompletedTasks()
    {
        $sql = "SELECT `name`, `id` FROM `tasks` WHERE `complete` = 0;";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getCompletedTasks()
    {
        $sql = "SELECT `name` FROM `tasks` WHERE `complete` = 1;";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function addTasks($addedTask)
    {

        $sql = "INSERT INTO  `tasks` (`name`) VALUES (:task)";

        $query = $this->db->prepare($sql);

        $query->execute([':task'=>$addedTask]);
    }

    public function moveTaskComplete($moveTask)
    {
        $sql = "UPDATE tasks SET complete = 1 WHERE `name` = (:completedTask);";
        $query = $this->db->prepare($sql);
        $query->execute([':completedTask' => $moveTask]);
        return $query->fetch();
    }
}
