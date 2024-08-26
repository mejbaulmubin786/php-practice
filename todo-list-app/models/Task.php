<?php
// models/Task.php

class Task {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllTasks() {
        $stmt = $this->pdo->query("SELECT * FROM tasks");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTasksByCategory($category) {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE category = :category");
        $stmt->execute(['category' => $category]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($title) {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title) VALUES (:title)");
        $stmt->execute(['title' => $title]);
    }

    public function updateTask($id, $is_completed) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET is_completed = :is_completed WHERE id = :id");
        $stmt->execute([
            'is_completed' => $is_completed,
            'id' => $id,
        ]);
    }

    public function deleteTask($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public function getSubtopicsByTaskId($taskId) {
        $stmt = $this->pdo->prepare("SELECT * FROM subtopics WHERE task_id = :task_id");
        $stmt->execute(['task_id' => $taskId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addSubtopic($taskId, $subtopicTitle) {
        $stmt = $this->pdo->prepare("INSERT INTO subtopics (task_id, title, created_at) VALUES (:task_id, :title, NOW())");
        $stmt->execute([
            'task_id' => $taskId,
            'title' => $subtopicTitle,
        ]);
    }

    public function updateSubtopic($id, $is_completed) {
        $stmt = $this->pdo->prepare("UPDATE subtopics SET is_completed = :is_completed WHERE id = :id");
        $stmt->execute([
            'is_completed' => $is_completed,
            'id' => $id,
        ]);
    }

    public function deleteSubtopic($id) {
        $stmt = $this->pdo->prepare("DELETE FROM subtopics WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
