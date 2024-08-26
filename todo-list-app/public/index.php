<?php
// public/index.php

require_once '../config/database.php';
require_once '../models/Task.php';

$taskModel = new Task($pdo);

$category = $_GET['category'] ?? 'All';
$tasks = $category === 'All' ? $taskModel->getAllTasks() : $taskModel->getTasksByCategory($category);

foreach ($tasks as &$task) {
    $task['subtopics'] = $taskModel->getSubtopicsByTaskId($task['id']);
}

include '../views/header.php';
include '../views/tasks.php';
include '../views/footer.php';
