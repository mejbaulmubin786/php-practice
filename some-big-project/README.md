### To-Do List Project Documentation

This documentation will guide you through the setup, configuration, and code structure of the "To-Do List" application, including the database setup, file structure, and detailed explanations of each part of the code.

---

## Table of Contents

1. [Project Overview](#1-project-overview)
2. [Project Structure](#2-project-structure)
3. [Database Setup](#3-database-setup)
4. [Configuration](#4-configuration)
5. [Model: Task.php](#5-model-taskphp)
6. [Views](#6-views)
   - [Header.php](#headerphp)
   - [Footer.php](#footerphp)
   - [Tasks.php](#tasksphp)
   - [Edit_task_form.php](#edit_task_formphp)
7. [Public Files](#7-public-files)
   - [index.php](#indexphp)
   - [add_task.php](#add_taskphp)
   - [delete_task.php](#delete_taskphp)
   - [update_task.php](#update_taskphp)
   - [edit_task.php](#edit_taskphp)
   - [assets/style.css](#assetsstylecss)
8. [Additional Notes](#8-additional-notes)
9. [Troubleshooting](#9-troubleshooting)

---

## 1. Project Overview

The "To-Do List" application allows users to create, manage, and delete tasks and sub-tasks. The application is built using PHP, and data is stored in a MySQL database. Each task has a title, creation date, and time, and can have multiple nested sub-tasks.

---

## 2. Project Structure

The project follows a standard MVC (Model-View-Controller) architecture. The following is the directory structure of the project:

```
todo-list-app/
│
├── config/
│   └── database.php
│
├── public/
│   ├── index.php
│   ├── add_task.php
│   ├── delete_task.php
│   ├── update_task.php
│   ├── edit_task.php
│   └── assets/
│       └── style.css
│
├── views/
│   ├── header.php
│   ├── footer.php
│   ├── tasks.php
│   └── edit_task_form.php
│
├── models/
│   └── Task.php
│
└── .htaccess
```

### Description of Folders:

- **config/**: Contains configuration files, such as the database connection.
- **public/**: Contains public-facing PHP files, CSS files, and the main entry point of the application.
- **views/**: Contains the view files, which are responsible for the presentation of data.
- **models/**: Contains the model files that interact with the database.

---

## 3. Database Setup

### Database Configuration

1. **Create the Database:**

   ```sql
   CREATE DATABASE todo_list;
   ```

2. **Create the `tasks` Table:**

   ```sql
   CREATE TABLE tasks (
       id INT AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(255) NOT NULL,
       parent_id INT DEFAULT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       FOREIGN KEY (parent_id) REFERENCES tasks(id) ON DELETE CASCADE
   );
   ```

   - **`id`**: Primary key for each task.
   - **`title`**: The title of the task.
   - **`parent_id`**: References the parent task for sub-tasks.
   - **`created_at`**: The date and time when the task was created.

---

## 4. Configuration

**config/database.php**

```php
<?php
$host = 'localhost';
$db = 'todo_list';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
```

- **Database Configuration:** This file establishes a connection to the MySQL database using PDO.

---

## 5. Model: Task.php

**models/Task.php**

```php
<?php

class Task {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllTasks($parent_id = null) {
        if ($parent_id === null) {
            $stmt = $this->pdo->prepare('SELECT * FROM tasks WHERE parent_id IS NULL ORDER BY created_at DESC');
            $stmt->execute();
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM tasks WHERE parent_id = ? ORDER BY created_at DESC');
            $stmt->execute([$parent_id]);
        }
        return $stmt->fetchAll();
    }

    public function addTask($title, $parent_id = null) {
        $stmt = $this->pdo->prepare('INSERT INTO tasks (title, parent_id) VALUES (?, ?)');
        $stmt->execute([$title, $parent_id]);
    }

    public function getTaskById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM tasks WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateTask($id, $title) {
        $stmt = $this->pdo->prepare('UPDATE tasks SET title = ? WHERE id = ?');
        $stmt->execute([$title, $id]);
    }

    public function deleteTask($id) {
        $stmt = $this->pdo->prepare('DELETE FROM tasks WHERE id = ?');
        $stmt->execute([$id]);
    }
}
```

### Explanation:

- **`getAllTasks()`**: Fetches all tasks and sub-tasks based on `parent_id`. If `parent_id` is `null`, it fetches parent tasks; otherwise, it fetches sub-tasks.
- **`addTask()`**: Adds a new task to the database.
- **`getTaskById()`**: Retrieves a task by its ID.
- **`updateTask()`**: Updates the title of a task.
- **`deleteTask()`**: Deletes a task from the database.

---

## 6. Views

### Header.php

This file contains the header section of the HTML, including the `DOCTYPE`, opening HTML tags, and the `<head>` section.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>To-Do List</h1>
```

### Footer.php

This file closes the `body` and `html` tags, and can be used to include any footer content.

```php
</body>
</html>
```

### Tasks.php

This file renders the list of tasks and the form to add a new task.

```php
<form action="add_task.php" method="post">
    <input type="text" name="title" placeholder="Enter a new task" required>
    <select name="parent_id">
        <option value="">No Parent</option>
        <?php foreach ($tasks as $task): ?>
            <option value="<?= $task['id'] ?>"><?= $task['title'] ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Add Task</button>
</form>

<h2>Your Tasks:</h2>
<ul>
    <?php renderTasks($tasks, $taskModel); ?>
</ul>
```

### Edit_task_form.php

This file contains the form used to edit an existing task.

```php
<form action="update_task.php" method="post">
    <input type="hidden" name="id" value="<?= $task['id'] ?>">
    <input type="text" name="title" value="<?= $task['title'] ?>" required>
    <button type="submit">Update Task</button>
</form>
```

---

## 7. Public Files

### index.php

This file is the main entry point for the application. It displays all tasks and sub-tasks.

```php
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

```

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
                <option value="<?= $task['id'] ?>"><?= $task['title'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Add Task</button>
    </form>

    <h2>Your Tasks:</h2>
    <ul>
        <?php renderTasks($tasks, $taskModel); ?>
    </ul>

</body>
</html>
```

### add_task.php

Handles the form submission for adding a new task.

```php
<?php
require '../config/database.php';
require '../models/Task.php';

$taskModel = new Task($pdo);

$title = $_POST['title'];
$parent_id = $_POST['parent_id'] ?? null;

$taskModel->addTask($title, $parent_id);

header('Location: index.php');
exit;
?>
```

### delete_task.php

Handles the deletion of tasks.

```php
<?php
require '../config/database.php';
require '../models/Task.php';

$taskModel = new Task($pdo);

$id = $_GET['id'];

$taskModel->deleteTask($id);

header('Location: index.php');
exit;
?>
```

### update_task.php

Handles updating a task's title.

```php
<?php
require '../config/database.php';
require '../models/Task.php';

$taskModel = new Task($pdo);

$id = $_POST['id'];
$title = $_POST['title'];

$taskModel->updateTask($id, $title);

header('Location: index.php');
exit;
?>
```

### edit_task.php

Displays the form for editing a task.

```php
<?php
require '../config/database.php';
require '../models/Task.php';

$taskModel = new Task($pdo);

$id = $_GET['id'];
$task = $taskModel->getTaskById($id);

require '../views/header.php';
require '../views/edit_task_form.php';
require '../views/footer.php';
?>
```

### assets/style.css

Basic styling for the to-do list.

```css
body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  padding: 20px;
}

h1 {
  color: #333;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  background-color: #fff;
  margin: 10px 0;
  padding: 10px;
  border: 1px solid #ddd;
}

a {
  margin-left: 10px;
  color: #007bff;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
```

---

## 8. Additional Notes

- **Security Considerations**: Ensure that inputs are sanitized and validated to prevent SQL injection attacks.
- **Error Handling**: Implement error handling mechanisms to gracefully handle any potential issues.

---

## 9. Troubleshooting

### Common Errors:

1. **Database Connection Issues**: Verify that the database credentials in `config/database.php` are correct and that the database server is running.
2. **Undefined Function Errors**: Ensure that all required functions are defined and included in the script where they are being used.
3. **SQL Syntax Errors**: Double-check the SQL queries for any syntax issues, especially when using prepared statements.

---

This documentation should provide you with a clear understanding of the entire to-do list project, from setup to execution. If you encounter any issues, refer back to the relevant sections for guidance.

### Continuation of To-Do List Project Documentation

Let's pick up from where we left off and ensure the documentation is complete.

---

## 9. Troubleshooting (Continued)

### 3. **File Not Found Errors**:

- Ensure that the file paths are correct, especially when including files. Double-check the directory structure and confirm that the file names are spelled correctly.
- Use relative paths where necessary to avoid discrepancies when moving files across different environments.

### 4. **Missing Styles**:

- If the CSS styles aren't being applied, verify the path to the `style.css` file in the `<link>` tag.
- Clear the browser cache to ensure that the latest version of the CSS file is being loaded.

### 5. **Uncaught PDOException**:

- This error typically occurs if there is an issue with the database connection or if a database query fails.
- To debug, wrap your database connection and queries in `try-catch` blocks and print the error message to understand the cause.

---

## 10. Future Enhancements

### 1. **User Authentication**:

- Implement user authentication to allow multiple users to manage their own to-do lists. Each user would have their own set of tasks, separate from others.

### 2. **Task Prioritization**:

- Add a feature to prioritize tasks by setting a priority level (e.g., High, Medium, Low) and sort tasks based on their priority.

### 3. **Task Reminders**:

- Implement a feature to set reminders for tasks. This could involve sending an email or a notification when a task is due.

### 4. **Task Search**:

- Include a search functionality that allows users to search for tasks by title or date.

### 5. **Task Sharing**:

- Add a feature to share tasks or sub-tasks with other users, making it a collaborative to-do list application.

---

## 11. Final Review Checklist

Before deploying the project, ensure that you have completed the following:

- [ ] **Database Setup**: Confirm that the database and tables are correctly set up and populated with sample data for testing.
- [ ] **File Permissions**: Check file permissions, especially for files that need to be writable (e.g., logs).
- [ ] **Error Logging**: Set up error logging in production to catch and troubleshoot any issues that arise.
- [ ] **Security Measures**: Ensure that all forms of input are sanitized and validated to prevent SQL injection and other security vulnerabilities.
- [ ] **Cross-Browser Testing**: Test the application on different browsers to ensure compatibility.

---

This concludes the detailed documentation for the To-Do List application. The project is now fully documented, providing clear guidance on its setup, structure, functionality, and potential areas for future enhancement. This documentation should serve as a comprehensive guide for anyone working on or reviewing the project.
