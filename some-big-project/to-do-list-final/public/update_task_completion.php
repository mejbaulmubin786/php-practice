<?php
require '../config/database.php';
require '../models/Task.php';

$taskModel = new Task($pdo);

if (isset($_POST['task_id']) && isset($_POST['completed'])) {
    $task_id = $_POST['task_id'];
    $completed = $_POST['completed'] ? 1 : 0;

    // Update the task completion status
    $taskModel->updateTaskCompletion($task_id, $completed);

    // Check if the task has a parent
    $task = $taskModel->getTaskById($task_id);
    if ($task['parent_id'] !== null) {
        // If it's a sub-task, check if all sub-tasks are completed
        $allSubTasksCompleted = $taskModel->areAllSubTasksCompleted($task['parent_id']);
        if ($allSubTasksCompleted) {
            // If all sub-tasks are completed, mark the parent task as complete
            $taskModel->updateTaskCompletion($task['parent_id'], 1);
        } else {
            // If not all sub-tasks are completed, ensure the parent task is incomplete
            $taskModel->updateTaskCompletion($task['parent_id'], 0);
        }
    }
}
