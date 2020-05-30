<?php

$error = "";

$mysqli = new mysqli('localhost', 'root', '', 'todoapp');

if (isset($_POST['submit'])) {
    $task = $_POST['task'];
    if (empty($task)) 
    {
        $error = 'You must fill in the task';
    }
    else
    {
        $mysqli->query('INSERT INTO tasks(task) VALUES ("' .$task .'")');
        header('location: index.php');
    }
}

if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
    $mysqli->query('DELETE FROM tasks WHERE id = ' .$id. ' ');
    header('location: index.php');
}

$tasks = $mysqli->query('SELECT * FROM tasks');

?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <title>ToDo App</title>
    <link rel="stylesheet" href="style.css" type="text/css" >
</head>
<body>

    <div class="heading">
        <h2>ToDo App</h2>
    </div>

    <form method="post" action="index.php">
        <?php if (isset($error)) { ?>
            <p><?php echo $error; ?></p>
        <?php } ?>
        <input type="text" name="task" class="task_input">
        <button type="submit" class="add_btn" name="submit">Add task</button>
    </form>

    <table>
        <thead>
            <tr>
            <th>N</th>
            <th>Tasks</th>
            <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1; while ($row = $tasks->fetch_array()) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td class="task"><?php echo $row['task']; ?></td>
                    <td class="delete">
                        <a href="index.php?del_task=<?php echo $row['id']; ?>">x</a>
                    </td>
                </tr>

            <?php $i++; } ?>

        </tbody>
    </table>

</body>
</html>