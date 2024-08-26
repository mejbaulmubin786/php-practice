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
