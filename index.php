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
        <input type="text" name="task" class="task_input">
        <button type="submit" class="add_btn" name="submit">Add task</button>
    </form>

    <table>
        <thead>
            <tr>
            <th>N</th>
            <th>Task</th>
            <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td class="task">First task placeholder</td>
                <td class="delete">
                    <a href="">x</a>
                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>