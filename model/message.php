<?php

$connect = new mysqli("localhost","adlan","adlan","my_crud");


$sql = "SELECT * FROM message";
$query = mysqli_query($connect, $sql);

if (isset($_REQUEST['new_post'])) {
    $content = $_REQUEST['content'];

    $sql = "INSERT INTO message(content) VALUES('$content')";
    mysqli_query($connect, $sql);

    echo $sql;

    header("Location: ../view/home.php?info=added");
    exit();
}

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM message WHERE id = $id";
    $query = mysqli_query($connect, $sql);
}

if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM message WHERE id = $id";
    mysqli_query($connect, $sql);

    header("Location: ../view/home.php");
    exit();
}



