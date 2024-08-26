<?php
// public/delete_subtopic.php

require_once '../config/database.php';
require_once '../models/Task.php';

if (isset($_GET['id'])) {
    $task = new Task($pdo);
    $task->deleteSubtopic($_GET['id']);
}

header('Location: index.php');
