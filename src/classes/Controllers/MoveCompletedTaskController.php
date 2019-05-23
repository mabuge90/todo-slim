<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-10
 * Time: 20:24
 */

namespace ToDo\Controllers;
use ToDo\Models\TasksModel;
use Slim\Http\Response;
use Slim\Http\Request;


class MoveCompletedTaskController
{
    private $taskModel;

    public function __construct(TasksModel $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $moveTask = $request->getParsedBody();
        var_dump($moveTask);
        if(!empty($moveTask['completedTask'])){

            $this->taskModel->moveTaskComplete($moveTask['completedTask']);
            return $response->withRedirect('/');
        }
        return $response->withRedirect('/');

    }

}
