<?php
class Task {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Fetch all tasks, optionally filtered by parent_id
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

    // Fetch a single task by its id
    public function getTaskById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM tasks WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Add a new task with an optional parent_id
    public function addTask($title, $parent_id = null) {
    $stmt = $this->pdo->prepare('INSERT INTO tasks (title, parent_id) VALUES (?, ?)');
    $stmt->execute([$title, $parent_id]);

    // If the task is a sub-task, mark the parent task as incomplete
    if ($parent_id !== null) {
        $this->updateTaskCompletion($parent_id, 0); // Uncheck the parent task
    }
}


    // Update a task's title by its id
    public function updateTask($id, $title) {
        $stmt = $this->pdo->prepare('UPDATE tasks SET title = ? WHERE id = ?');
        $stmt->execute([$title, $id]);
    }

    // Delete a task by its id
    public function deleteTask($id) {
        $stmt = $this->pdo->prepare('DELETE FROM tasks WHERE id = ?');
        $stmt->execute([$id]);
    }

    // Update the completion status of a task
    public function updateTaskCompletion($id, $completed) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET completed = ? WHERE id = ?");
        $stmt->execute([$completed, $id]);
    }

    // Check if all sub-tasks of a task are completed
    public function areAllSubTasksCompleted($parent_id) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM tasks WHERE parent_id = ? AND completed = 0");
        $stmt->execute([$parent_id]);
        return $stmt->fetchColumn() == 0;
    }
}
?>
