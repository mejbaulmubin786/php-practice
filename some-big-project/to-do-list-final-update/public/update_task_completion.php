<?php
require '../config/database.php';
require '../models/Task.php';

$taskModel = new Task($pdo);

if (isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];
    $completed = $_POST['completed'];

    // Update the completion status of the task
    $taskModel->updateTaskCompletion($task_id, $completed);

    // Check if this task has a parent task
    $task = $taskModel->getTaskById($task_id);
    if ($task['parent_id']) {
        // Check all sibling tasks of the same parent
        $siblingTasks = $taskModel->getAllTasks($task['parent_id']);
        $allCompleted = true;
        foreach ($siblingTasks as $siblingTask) {
            if (!$siblingTask['completed']) {
                $allCompleted = false;
                break;
            }
        }

        // If all sibling tasks are completed, mark the parent task as completed
        if ($allCompleted) {
            $taskModel->updateTaskCompletion($task['parent_id'], 1);
        } else {
            $taskModel->updateTaskCompletion($task['parent_id'], 0);
        }
    }
}
