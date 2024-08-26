<?php foreach ($tasks as $task): ?>
    <li>
        <input type="checkbox" onclick="window.location.href='update_task.php?id=<?=$task['id']?>&is_completed=<?=$task['is_completed'] ? 0 : 1?>'" <?=$task['is_completed'] ? 'checked' : ''?>>
        <?=htmlspecialchars($task['title'])?>
        <a href="delete_task.php?id=<?=$task['id']?>">Delete</a>
    </li>
<?php endforeach;?>
