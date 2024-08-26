<?php
// public/update_task.php

require_once '../config/database.php';
require_once '../models/Task.php';

if (isset($_GET['id'])) {
    $task = new Task($pdo);
    $task->updateTask($_GET['id'], $_GET['is_completed']);
}

header('Location: index.php');
