<?php
    include 'db_connect.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];
        $email = $_POST['email'];

        $execQuery = $pdo->prepare("UPDATE employee SET name = ?, position = ?, salary = ?, email = ? WHERE id = ?");
        $execQuery->execute([$name, $position, $salary, $email, $id]);

        header("Location: index.php");
        exit();
    } else {
        $id = $_GET['id'];
        $execQuery = $pdo->prepare("SELECT * FROM employee WHERE id = ?");
        $execQuery->execute([$id]);
        $employees = $execQuery->fetch();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <h1>Update Employee</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $employees['id'] ?>">
        <input type="text" name="name" value="<?= $employees['name']?>" required>
        <input type="text" name="position" value="<?= $employees['position']?>" required>
        <input type="text" name="salary" value="<?= $employees['salary']?>" required>
        <input type="email" name="email" value="<?= $employees['email']?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>