<?php foreach ($tasks as $task): ?>
    <li>
        <input type="checkbox" onclick="window.location.href='update_task.php?id=<?=$task['id']?>&is_completed=<?=$task['is_completed'] ? 0 : 1?>'" <?=$task['is_completed'] ? 'checked' : ''?>>
        <?=htmlspecialchars($task['title'])?>
        <a href="edit_task.php?id=<?=$task['id']?>">Edit</a>
        <a href="delete_task.php?id=<?=$task['id']?>">Delete</a>

        <!-- Display Subtopics -->
        <ul>
            <?php foreach ($task['subtopics'] as $subtopic): ?>
                <li>
                    <input type="checkbox" onclick="window.location.href='update_subtopic.php?id=<?=$subtopic['id']?>&is_completed=<?=$subtopic['is_completed'] ? 0 : 1?>'" <?=$subtopic['is_completed'] ? 'checked' : ''?>>
                    <?=htmlspecialchars($subtopic['title'])?>
                    <a href="delete_subtopic.php?id=<?=$subtopic['id']?>">Delete</a>
                </li>
            <?php endforeach;?>
        </ul>

        <!-- Add Subtopic Form -->
        <form action="add_subtopic.php" method="POST">
            <input type="hidden" name="task_id" value="<?=$task['id']?>">
            <input type="text" name="subtopic_title" placeholder="Add a subtopic" required>
            <button type="submit">Add Subtopic</button>
        </form>
    </li>
<?php endforeach;?>
