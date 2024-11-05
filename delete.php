<?php
    include 'db_connect.php';

    $id = $_GET['id'];

    $execQuery = $pdo->prepare("DELETE FROM employee WHERE id = ?");
    $execQuery->execute([$id]);

    header("Location: index.php");
    exit();
?>