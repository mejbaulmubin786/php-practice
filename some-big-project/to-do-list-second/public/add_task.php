<?php
require '../config/database.php';
require '../models/Task.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $parent_id = $_POST['parent_id'] ? $_POST['parent_id'] : null;

    $task = new Task($pdo);
    $task->addTask($title, $parent_id);
}

header('Location: index.php');
exit();
?>
