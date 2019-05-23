<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-10
 * Time: 15:23
 */

namespace ToDo\Controllers;
use Slim\Http\Response;
use Slim\Http\Request;

use ToDo\Models\TasksModel;

class AddTasksController
{
    private $taskModel;

    public function __construct(TasksModel $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $addedTask= $request->getParsedBody();
        if(!empty($addedTask['task'])){
            $this->taskModel->addTasks($addedTask['task']);
            return $response->withRedirect('/');
        }
         return $response->withRedirect('/');

    }

}
