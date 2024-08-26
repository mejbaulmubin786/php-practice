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

    public function getTaskById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM tasks WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function addTask($title, $parent_id = null) {
        $stmt = $this->pdo->prepare('INSERT INTO tasks (title, parent_id) VALUES (?, ?)');
        $stmt->execute([$title, $parent_id]);
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
?>
