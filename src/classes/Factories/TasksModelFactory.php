<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-10
 * Time: 14:27
 */

namespace ToDo\Factories;


use ToDo\Models\TasksModel;

class TasksModelFactory
{
    public function __invoke($dic)
    {
        $db = $dic->get('db');
        return new TasksModel($db);
    }
}
