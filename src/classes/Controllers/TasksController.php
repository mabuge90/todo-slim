<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 2019-05-10
 * Time: 11:05
 */

namespace ToDo\Controllers;

use Slim\Http\Response;
use Slim\Http\Request;

use ToDo\Models\TasksModel;
use Slim\Views\PhpRenderer;
class TasksController
{
    private $taskModel;
    private $phpRenderer;

    public function __construct(PhpRenderer $phpRenderer, TasksModel $taskModel)
    {
        $this->taskModel=$taskModel;
        $this->phpRenderer = $phpRenderer;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $uncompletedTasks = $this->taskModel->getUncompletedTasks();
        $completedTasks = $this->taskModel->getCompletedTasks();
        return $this->phpRenderer->render($response, 'index.phtml', ['uncompletedTasks' => $uncompletedTasks, 'completedTasks' => $completedTasks ]);
    }

}
