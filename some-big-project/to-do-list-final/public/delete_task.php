<?php
require '../config/database.php';
require '../models/Task.php';

if (isset($_GET['id'])) {
    $task = new Task($pdo);
    $task->deleteTask($_GET['id']);
}

header('Location: index.php');
exit();
?>
