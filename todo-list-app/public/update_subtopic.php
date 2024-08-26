<?php
// update_subtopic.php

require_once '../config/database.php';
require_once '../models/Task.php';

$taskModel = new Task($pdo);

if (isset($_GET['id']) && isset($_GET['is_completed'])) {
    $id = $_GET['id'];
    $is_completed = $_GET['is_completed'];

    $taskModel->updateSubtopic($id, $is_completed);
}

header('Location: index.php');
?>
