<?php
require '../config/database.php';
require '../models/Task.php';

$taskModel = new Task($pdo);
$tasks = $taskModel->getAllTasks(); // Fetch only parent tasks

function renderTasks($tasks, $taskModel) {
    foreach ($tasks as $task) {
        echo '<li>';
        echo $task['title'] . ' (Created on ' . $task['created_at'] . ')';
        echo ' <a href="edit_task.php?id=' . $task['id'] . '">Edit</a>';
        echo ' <a href="delete_task.php?id=' . $task['id'] . '">Delete</a>';

        // Fetch and display sub-tasks recursively
        $subTasks = $taskModel->getAllTasks($task['id']);
        if ($subTasks) {
            echo '<ul>';
            renderTasks($subTasks, $taskModel);
            echo '</ul>';
        }

        echo '</li>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>To-Do List</h1>
    <form action="add_task.php" method="post">
        <input type="text" name="title" placeholder="Enter a new task" required>
        <select name="parent_id">
            <option value="">No Parent</option>
            <?php foreach ($tasks as $task): ?>
                <option value="<?=$task['id']?>"><?=$task['title']?></option>
            <?php endforeach;?>
        </select>
        <button type="submit">Add Task</button>
    </form>

    <h2>Your Tasks:</h2>
    <ul>
        <?php renderTasks($tasks, $taskModel);?>
    </ul>
</body>
</html>
