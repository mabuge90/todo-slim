<?php

use Slim\App;

return function (App $app) {
    $app->getContainer();
    $app->get('/', 'TasksController');
    $app->post('/add-tasks', 'AddTasksController');
    $app->post('/move-tasks','MoveCompletedTaskController');

};
