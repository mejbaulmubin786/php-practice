To create a to-do list application in PHP, I'll guide you through setting up the necessary files, database connection, and folder structure.

### Folder Structure

```plaintext
todo-list-app/
│
├── config/
│   └── database.php
│
├── public/
│   ├── index.php
│   ├── add_task.php
│   ├── delete_task.php
│   └── update_task.php
│
├── views/
│   ├── header.php
│   ├── footer.php
│   └── tasks.php
│
├── models/
│   └── Task.php
│
└── .htaccess
```

### 1. Database Setup

First, create a MySQL database. Here's an SQL script to create the required table:

```sql
CREATE DATABASE todo_list;

USE todo_list;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    is_completed BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 2. Configuring Database Connection

Create a `database.php` file in the `config/` directory:

```php
<?php
// config/database.php

$host = 'localhost';
$db   = 'todo_list';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
```

### 3. Task Model

Create a `Task.php` file in the `models/` directory:

```php
<?php
// models/Task.php

class Task {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllTasks() {
        $stmt = $this->pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($title) {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title) VALUES (:title)");
        return $stmt->execute(['title' => $title]);
    }

    public function deleteTask($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function updateTask($id, $is_completed) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET is_completed = :is_completed WHERE id = :id");
        return $stmt->execute(['id' => $id, 'is_completed' => $is_completed]);
    }
}
```

### 4. Public Files

**index.php:**

```php
<?php
// public/index.php

require_once '../config/database.php';
require_once '../models/Task.php';

$task = new Task($pdo);
$tasks = $task->getAllTasks();

include '../views/header.php';
include '../views/tasks.php';
include '../views/footer.php';
```

**add_task.php:**

```php
<?php
// public/add_task.php

require_once '../config/database.php';
require_once '../models/Task.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = new Task($pdo);
    $task->addTask($_POST['title']);
}

header('Location: index.php');
```

**delete_task.php:**

```php
<?php
// public/delete_task.php

require_once '../config/database.php';
require_once '../models/Task.php';

if (isset($_GET['id'])) {
    $task = new Task($pdo);
    $task->deleteTask($_GET['id']);
}

header('Location: index.php');
```

**update_task.php:**

```php
<?php
// public/update_task.php

require_once '../config/database.php';
require_once '../models/Task.php';

if (isset($_GET['id'])) {
    $task = new Task($pdo);
    $task->updateTask($_GET['id'], $_GET['is_completed']);
}

header('Location: index.php');
```

### 5. View Files

**header.php:**

```php
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
```

**tasks.php:**

```php
<?php foreach ($tasks as $task): ?>
    <li>
        <input type="checkbox" onclick="window.location.href='update_task.php?id=<?= $task['id'] ?>&is_completed=<?= $task['is_completed'] ? 0 : 1 ?>'" <?= $task['is_completed'] ? 'checked' : '' ?>>
        <?= htmlspecialchars($task['title']) ?>
        <a href="delete_task.php?id=<?= $task['id'] ?>">Delete</a>
    </li>
<?php endforeach; ?>
```

**footer.php:**

```php
    </ul>
</body>
</html>
```

### 6. .htaccess File

If you're using Apache, you can add an `.htaccess` file in the root directory to ensure clean URLs:

```plaintext
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?/$1 [L]
```

### 7. Running the Application

Place the `todo-list-app/` directory in your web server's root folder. Open `http://localhost/todo-list-app/public/` in your browser to start using the application.

This basic setup provides a simple yet functional to-do list application with a database connection in PHP. You can extend it with features like user authentication, task priorities, deadlines, etc., as needed.
