<?php
// public/update_subtopic.php

require_once '../config/database.php';
require_once '../models/Task.php';

if (isset($_GET['id'])) {
    $task = new Task($pdo);
    $task->updateSubtopic($_GET['id'], $_GET['is_completed']);
}

header('Location: index.php');
