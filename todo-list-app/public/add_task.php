<?php
// public/add_task.php

require_once '../config/database.php';
require_once '../models/Task.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = new Task($pdo);
    $task->addTask($_POST['title']);
}

header('Location: index.php');
