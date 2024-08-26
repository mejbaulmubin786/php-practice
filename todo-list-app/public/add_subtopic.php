<?php
// add_subtopic.php

require_once '../config/database.php';
require_once '../models/Task.php';

$taskModel = new Task($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskId = $_POST['task_id'];
    $subtopicTitle = $_POST['subtopic_title'];

    $taskModel->addSubtopic($taskId, $subtopicTitle);
}

header('Location: index.php');
?>
