<?php
    include 'db_connect.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];
        $email = $_POST['email'];

        $execQuery = $pdo->prepare("INSERT INTO employee (name, position, salary, email) VALUES (?, ?, ?, ?)");
        $execQuery->execute([$name, $position, $salary, $email]);

        header("Location: index.php");
        exit();
    }
?>