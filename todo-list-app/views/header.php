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
        <input type="text" name="title" placeholder="Enter task" required>
        <select name="category">
            <option value="Education">Study</option>
            <option value="Work">Work</option>
            <option value="Personal">Personal</option>
            <!-- Add more categories as needed -->
        </select>
        <button type="submit">Add Task</button>
    </form>
    <form action="index.php" method="GET">
        <select name="category" onchange="this.form.submit()">
            <option value="All" <?=$category === 'All' ? 'selected' : ''?>>All</option>
            <option value="Education" <?=$category === 'Education' ? 'selected' : ''?>>Study</option>
            <option value="Work" <?=$category === 'Work' ? 'selected' : ''?>>Work</option>
            <option value="Personal" <?=$category === 'Personal' ? 'selected' : ''?>>Personal</option>
            <!-- Add more categories as needed -->
        </select>
    </form>
    <ul>
