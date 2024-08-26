<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>
    <form action="add_task.php" method="POST">
        <input type="text" name="title" placeholder="Enter task" required>
        <button type="submit">Add Task</button>
    </form>
    <ul>
