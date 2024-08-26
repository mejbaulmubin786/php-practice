<?php
// public/index.php

require_once '../config/database.php';
require_once '../models/Task.php';

$task = new Task($pdo);
$tasks = $task->getAllTasks();

include '../views/header.php';
include '../views/tasks.php';
include '../views/footer.php';
