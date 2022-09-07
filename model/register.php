<?php
session_start();
require_once('./db.php');

function register_user() {
    $password = $_POST['password'];
    global $connection;
    if (isset($_FILES["avatar"]) == false)
        return;
    $filename = $_FILES['avatar']['name'];
    $destination = "../uploads/" . $_POST["email"] . "/";
    $image_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $valid_extensions = array("jpg","jpeg","png");
    if (in_array($image_extension, $valid_extensions) == false)
        return;
    $sql = 'INSERT INTO users (id, username, email, password, avatar) VALUES (0, :username, :email, :password, :avatar)';
    $request = $connection->prepare($sql);
    $data = [
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "password" => $_POST['password'] = md5($password),
        "avatar" => "/uploads" . "/" . $_POST["email"]  . "/$filename"
    ];
    if ($request->execute($data) == true) {
        if (file_exists($destination) == false)
            mkdir($destination);
        move_uploaded_file($_FILES['avatar']['tmp_name'], $destination.$filename);
        echo json_encode($request->fetchAll());
    }

    
    
}

register_user();