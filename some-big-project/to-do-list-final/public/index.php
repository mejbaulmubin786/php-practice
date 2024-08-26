<?php
require '../config/database.php';
require '../models/Task.php';

$taskModel = new Task($pdo);

// Handle adding a new task
if (isset($_POST['new_task'])) {
    $taskTitle = $_POST['task_title'];
    $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : null;
    $taskModel->addTask($taskTitle, $parent_id);
    header('Location: index.php');
    exit();
}

// Handle editing a task
if (isset($_POST['edit_task'])) {
    $task_id = $_POST['task_id'];
    $taskTitle = $_POST['task_title'];
    $taskModel->updateTask($task_id, $taskTitle);
    header('Location: index.php');
    exit();
}

// Handle deleting a task
if (isset($_GET['delete_task'])) {
    $task_id = $_GET['delete_task'];
    $taskModel->deleteTask($task_id);
    header('Location: index.php');
    exit();
}

// Fetch all main tasks
$tasks = $taskModel->getAllTasks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>To-Do List</h1>
    
    <form action="index.php" method="post">
        <input type="text" name="task_title" placeholder="Enter a new task" required>
        <select name="parent_id">
            <option value="">No Parent</option>
            <?php foreach ($tasks as $task) : ?>
                <option value="<?= $task['id'] ?>"><?= $task['title'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="new_task">Add Task</button>
    </form>

    <h2>Tasks</h2>
    <ul>
        <?php foreach ($tasks as $task) : ?>
            <li>
                <input type="checkbox" class="task-complete-checkbox" data-task-id="<?= $task['id'] ?>" <?= $task['completed'] ? 'checked' : '' ?>>
                <?= $task['title'] ?> (Created on <?= $task['created_at'] ?>)
                <a href="edit_task.php?task_id=<?= $task['id'] ?>">Edit</a>
                <a href="index.php?delete_task=<?= $task['id'] ?>" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                
                <?php
                // Fetch sub-tasks for the current task
                $subTasks = $taskModel->getAllTasks($task['id']);
                if (!empty($subTasks)) :
                ?>
                    <ul>
                        <?php foreach ($subTasks as $subTask) : ?>
                            <li>
                                <input type="checkbox" class="task-complete-checkbox" data-task-id="<?= $subTask['id'] ?>" <?= $subTask['completed'] ? 'checked' : '' ?>>
                                <?= $subTask['title'] ?> (Created on <?= $subTask['created_at'] ?>)
                                <a href="edit_task.php?task_id=<?= $subTask['id'] ?>">Edit</a>
                                <a href="index.php?delete_task=<?= $subTask['id'] ?>" onclick="return confirm('Are you sure you want to delete this sub-task?')">Delete</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <script>
        $(document).ready(function() {
            $('.task-complete-checkbox').on('change', function() {
                var taskId = $(this).data('task-id');
                var completed = $(this).is(':checked') ? 1 : 0;
                
                $.ajax({
                    url: 'update_task_completion.php',
                    method: 'POST',
                    data: { task_id: taskId, completed: completed },
                    success: function(response) {
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>
