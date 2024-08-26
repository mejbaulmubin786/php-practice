<?php
require '../config/database.php';
require '../models/Task.php';

$taskModel = new Task($pdo);

// Handle form submission for adding a new task
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    $parent_id = $_POST['parent_id'] ?? null;
    $taskModel->addTask($_POST['title'], $parent_id);
    header('Location: index.php');
    exit;
}

// Handle task completion toggle
if (isset($_GET['complete']) && isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
    $completed = $_GET['complete'] ? 0 : 1; // Toggle between 0 and 1
    $taskModel->updateTaskCompletion($task_id, $completed);

    // If it's a sub-task, check if all sub-tasks are complete
    $task = $taskModel->getTaskById($task_id);
    if ($task['parent_id'] !== null) {
        if ($taskModel->areAllSubTasksCompleted($task['parent_id'])) {
            $taskModel->updateTaskCompletion($task['parent_id'], 1); // Complete the parent task
        } else {
            $taskModel->updateTaskCompletion($task['parent_id'], 0); // Uncomplete the parent task if any sub-task is incomplete
        }
    }
    header('Location: index.php');
    exit;
}

// Fetch only parent tasks
$tasks = $taskModel->getAllTasks();

// Recursive function to render tasks and their sub-tasks
function renderTasks($tasks, $taskModel) {
    foreach ($tasks as $task) {
        $isCompleted = $task['completed'] ? 'checked' : '';
        echo '<div style="margin-left: ' . ($task['parent_id'] ? '20px' : '0') . ';">';
        echo '<input type="checkbox" onclick="window.location.href=\'index.php?complete=' . $task['completed'] . '&task_id=' . $task['id'] . '\'" ' . $isCompleted . '>';
        echo $task['title'] . ' (Created on ' . $task['created_at'] . ')';
        echo ' <a href="edit_task.php?id=' . $task['id'] . '">Edit</a>';
        echo ' <a href="delete_task.php?id=' . $task['id'] . '">Delete</a>';

        // Fetch and display sub-tasks recursively
        $subTasks = $taskModel->getAllTasks($task['id']);
        if ($subTasks) {
            echo '<div>';
            renderTasks($subTasks, $taskModel);
            echo '</div>';
        }
        echo '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>To-Do List</h1>

    <form action="add_task.php" method="POST">
        <input type="text" name="title" placeholder="Enter a new task">
        <select name="parent_id">
            <option value="">No Parent</option>
            <?php foreach ($tasks as $task): ?>
                <option value="<?=$task['id'];?>"><?=$task['title'];?></option>
            <?php endforeach;?>
        </select>
        <button type="submit">Add Task</button>
    </form>

    <h2>Your Tasks</h2>
	<ul>
		<?php renderTasks($tasks, $taskModel);?>
	</ul>

</body>
</html>
