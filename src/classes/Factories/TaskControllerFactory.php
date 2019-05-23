<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-10
 * Time: 11:06
 */

namespace ToDo\Factories;
use ToDo\Controllers\TasksController;


class TaskControllerFactory
{
    public function __invoke($dic)
    {
        $tasksModel = $dic->get('TasksModel');
        $phpRender = $dic->get('renderer');
        return $name = new TasksController($phpRender, $tasksModel);
    }
}
