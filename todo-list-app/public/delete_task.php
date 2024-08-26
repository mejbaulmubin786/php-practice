<?php
// public/delete_task.php

require_once '../config/database.php';
require_once '../models/Task.php';

if (isset($_GET['id'])) {
    $task = new Task($pdo);
    $task->deleteTask($_GET['id']);
}

header('Location: index.php');
