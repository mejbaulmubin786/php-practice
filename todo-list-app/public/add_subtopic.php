<?php
// public/add_subtopic.php

require_once '../config/database.php';
require_once '../models/Task.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = new Task($pdo);
    $task->addSubtopic($_POST['task_id'], $_POST['subtopic_title']);
}

header('Location: index.php');
