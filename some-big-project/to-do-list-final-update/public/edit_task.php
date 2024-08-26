<?php
require '../config/database.php';
require '../models/Task.php';

$task = new Task($pdo);
$taskId = $_GET['id'];
$currentTask = $task->getTaskById($taskId);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $task->updateTask($taskId, $title);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form action="edit_task.php?id=<?= $taskId ?>" method="post">
        <input type="text" name="title" value="<?= $currentTask['title'] ?>" required>
        <button type="submit">Update Task</button>
    </form>
</body>
</html>
