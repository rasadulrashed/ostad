<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple To-Do App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Simple To-Do App</h1>
        <form action="task.php" method="POST">
            <input type="text" name="task" placeholder="Enter a new task" required>
            <button type="submit" name="action" value="add">Add Task</button>
        </form>
        <ul class="task-list">
            <?php
            $tasks = json_decode(file_get_contents('tasks.json'), true);
            foreach ($tasks as $index => $item) {
                $class = $item['done'] ? 'done' : '';
                echo "<li>
                        <form action='task.php' method='POST' style='display: inline;'>
                            <input type='hidden' name='index' value='{$index}'>
                            <button type='submit' name='action' value='toggle' class='toggle {$class}'>{$item['task']}</button>
                        </form>
                        <form action='task.php' method='POST' style='display: inline;'>
                            <input type='hidden' name='index' value='{$index}'>
                            <button type='submit' name='action' value='delete' class='delete'>Delete</button>
                        </form>
                    </li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
