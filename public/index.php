<?php

require_once '../config/config.php';
require_once '../app/models/Task.php';
require_once '../app/controllers/TaskController.php';

$config = require '../config/config.php';
$task = new Task($config);
$controller = new TaskController($task);

$controller->handleForm();

?>