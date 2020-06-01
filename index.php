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
    <title>Stuff ToDo</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css" >
</head>
<body>

    <header>
        <div class="title">
            <h2>Stuff<br>ToDo</h2>
        </div>
    </header>

    <main>
        <form class="task-form" method="post" action="index.php">
            <?php if (isset($error)) { ?>
            <input type="text" name="task" class="task-input" placeholder="Add new task" />

            <button type="submit" name="submit" class="add-btn" >+</button>
            <p class="error"><?php echo $error; ?></p>
            <?php } ?>
        </form>

    
        <div class="todo-list">
            <p class="task-count">3 tasks remaining</p>

            <div class="tasks">

                <div class="task">
                    <?php $i = 1; while ($row = $tasks->fetch_array()) { ?>
                        <?php echo $i; ?>
                        
                    <input type="checkbox" id="task" />
                    <label for="task">
                        <span class="custom-checkbox"></span><?php echo $row['task']; ?>
                    </label>
                    <a class="delete" href="index.php?del_task=<?php echo $row['id']; ?>">x</a>
                    <?php $i++; } ?>
                </div>
            </div>

        </div>

    </main>

<footer></footer>
</body>
</html>