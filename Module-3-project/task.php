<?php
$tasksFile = 'tasks.json';
$tasks = json_decode(file_get_contents($tasksFile), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'add') {
        $newTask = htmlspecialchars(trim($_POST['task']));
        if (!empty($newTask)) {
            $tasks[] = ['task' => $newTask, 'done' => false];
        }
    } elseif ($action === 'delete') {
        $index = intval($_POST['index']);
        unset($tasks[$index]);
        $tasks = array_values($tasks); // Reindex array
    } elseif ($action === 'toggle') {
        $index = intval($_POST['index']);
        $tasks[$index]['done'] = !$tasks[$index]['done'];
    }

    file_put_contents($tasksFile, json_encode($tasks, JSON_PRETTY_PRINT));
    header('Location: index.php');
    exit;
}


?>

