<?php
    include 'db_connect.php';

    $execQuery = $pdo->prepare("SELECT * FROM employee");
    $execQuery->execute();
    $employees = $execQuery->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Employee Management</h1>

    <form action="insert.php" method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="position" placeholder="Position" required>
        <input type="text" name="salary" placeholder="Salary" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Add Employee</button>
    </form>

    <h2>Employee List</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= $employee['id'] ?></td>
                <td><?= $employee['name'] ?></td>
                <td><?= $employee['position'] ?></td>
                <td><?= $employee['salary'] ?></td>
                <td><?= $employee['email'] ?></td>
                <td>
                    <a href="update.php?id=<?= $employee['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $employee['id'] ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>