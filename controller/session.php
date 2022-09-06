<?php

session_start();

require_once('../model/user.php');

$id = isset($_POST['id']) ? $_POST['id'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$avatar = isset($_POST['avatar']) ? $_POST['avatar'] : '';


$_SESSION['id'] = $id;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['email'] = $email;
$_SESSION['avatar'] = $avatar;


