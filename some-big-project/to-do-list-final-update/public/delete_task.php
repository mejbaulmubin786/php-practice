<?php
require '../config/database.php';
require '../models/Task.php';

$taskModel = new Task($pdo);

if (isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];

    // Get the task before deleting
    $task = $taskModel->getTaskById($task_id);

    // Delete the task
    $taskModel->deleteTask($task_id);

    // Check if the parent task needs to be updated
    if ($task['parent_id']) {
        $parent_id = $task['parent_id'];

        // Update parent task completion status
        if ($taskModel->areAllSubTasksCompleted($parent_id)) {
            $taskModel->updateTaskCompletion($parent_id, 1);
        } else {
            $taskModel->updateTaskCompletion($parent_id, 0);
        }
    }
}
