<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    $container['db'] = function ($c) {
        $settings = $c->get('settings')['db'];
        $host = $settings['host'];
        $user = $settings['user'];
        $password = $settings['password'];
        $dbname = $settings['dbname'];
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    $container['TasksController'] = new \ToDo\Factories\TaskControllerFactory();
    $container['TasksModel'] = new \ToDo\Factories\TasksModelFactory();
    $container['AddTasksController'] = new \ToDo\Factories\AddTaskControllerFactory();
    $container['MoveCompletedTaskController'] = new \ToDo\Factories\MoveCompletedTasksControllerFactory();
};
