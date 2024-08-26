<?php
require '../config/database.php';
require '../models/Task.php';

$taskModel = new Task($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_title = $_POST['task_title'];
    $parent_id = $_POST['parent_id'] ?? null;

    if ($task_title) {
        $taskModel->addTask($task_title, $parent_id);
    }
    header('Location: index.php');
    exit;
}

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

    <form action="" method="POST">
        <input type="text" name="task_title" placeholder="Enter a new task">
        <select name="parent_id">
            <option value="">No Parent</option>
            <?php foreach ($tasks as $task): ?>
                <option value="<?= $task['id'] ?>"><?= htmlspecialchars($task['title']) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Add Task</button>
    </form>

    <h2>Tasks</h2>
    <ul>
        <?php function renderTasks($tasks, $taskModel) { ?>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <input type="checkbox" class="task-checkbox" data-task-id="<?= $task['id'] ?>" <?= $task['completed'] ? 'checked' : '' ?>>
                    <?= htmlspecialchars($task['title']) ?> (Created on <?= $task['created_at'] ?>)
                    <a href="edit_task.php?id=<?= $task['id'] ?>">Edit</a>
                    <a href="#" class="delete-task" data-task-id="<?= $task['id'] ?>">Delete</a>
                    <?php
                    $subTasks = $taskModel->getAllTasks($task['id']);
                    if ($subTasks) {
                        echo '<ul>';
                        renderTasks($subTasks, $taskModel);
                        echo '</ul>';
                    }
                    ?>
                </li>
            <?php endforeach; ?>
        <?php } ?>

        <?php renderTasks($tasks, $taskModel); ?>
    </ul>

    <script>
        $(document).ready(function() {
            // Handle task completion
            $('.task-checkbox').change(function() {
                const taskId = $(this).data('task-id');
                const completed = $(this).is(':checked') ? 1 : 0;

                $.post('update_task_completion.php', {
                    task_id: taskId,
                    completed: completed
                }, function() {
                    location.reload(); // Reload the page to reflect changes
                });
            });

            // Handle task deletion
            $('.delete-task').click(function(e) {
                e.preventDefault();
                const taskId = $(this).data('task-id');
                
                if (confirm('Are you sure you want to delete this task?')) {
                    $.post('delete_task.php', {
                        task_id: taskId
                    }, function() {
                        location.reload(); // Reload the page to reflect changes
                    });
                }
            });
        });
    </script>
</body>
</html>
