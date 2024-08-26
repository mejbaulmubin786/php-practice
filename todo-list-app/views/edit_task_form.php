<h2>Edit Task</h2>
<form action="edit_task.php" method="POST">
    <input type="hidden" name="id" value="<?=$taskData['id']?>">
    <input type="text" name="title" value="<?=htmlspecialchars($taskData['title'])?>" required>
    <button type="submit">Update Task</button>
</form>
