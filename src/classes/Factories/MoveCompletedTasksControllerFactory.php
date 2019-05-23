<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-10
 * Time: 20:26
 */

namespace ToDo\Factories;



use ToDo\Controllers\MoveCompletedTaskController;

class MoveCompletedTasksControllerFactory
{
    public function __invoke($dic)
    {
        $tasksModel = $dic->get('TasksModel');

        return new MoveCompletedTaskController($tasksModel);
    }

}
