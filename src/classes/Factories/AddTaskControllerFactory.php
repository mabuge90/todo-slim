<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-10
 * Time: 15:47
 */

namespace ToDo\Factories;


use ToDo\Controllers\AddTasksController;

class AddTaskControllerFactory
{
    public function __invoke($dic)
    {
        $tasksModel = $dic->get('TasksModel');

        return new AddTasksController($tasksModel);
    }
}
