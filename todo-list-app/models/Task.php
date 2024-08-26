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

    public function addTask($title, $category = 'General') {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title, category) VALUES (:title, :category)");
        return $stmt->execute(['title' => $title, 'category' => $category]);
    }

    public function deleteTask($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function updateTask($id, $is_completed) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET is_completed = :is_completed WHERE id = :id");
        return $stmt->execute(['id' => $id, 'is_completed' => $is_completed]);
    }

    public function getTaskById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editTask($id, $title) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET title = :title WHERE id = :id");
        return $stmt->execute(['id' => $id, 'title' => $title]);
    }

    public function getTasksByCategory($category) {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE category = :category ORDER BY created_at DESC");
        $stmt->execute(['category' => $category]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Subtopics related functions
    public function addSubtopic($task_id, $title) {
        $stmt = $this->pdo->prepare("INSERT INTO subtopics (task_id, title) VALUES (:task_id, :title)");
        return $stmt->execute(['task_id' => $task_id, 'title' => $title]);
    }

    public function getSubtopicsByTaskId($task_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM subtopics WHERE task_id = :task_id ORDER BY created_at DESC");
        $stmt->execute(['task_id' => $task_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteSubtopic($id) {
        $stmt = $this->pdo->prepare("DELETE FROM subtopics WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function updateSubtopic($id, $is_completed) {
        $stmt = $this->pdo->prepare("UPDATE subtopics SET is_completed = :is_completed WHERE id = :id");
        return $stmt->execute(['id' => $id, 'is_completed' => $is_completed]);
    }
}
