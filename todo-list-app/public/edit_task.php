<?php
// public/edit_task.php

require_once '../config/database.php';
require_once '../models/Task.php';

$task = new Task($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task->editTask($_POST['id'], $_POST['title']);
    header('Location: index.php');
} else {
    $taskData = $task->getTaskById($_GET['id']);
    include '../views/header.php';
    include '../views/edit_task_form.php';
    include '../views/footer.php';
}
