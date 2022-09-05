<?php
session_start();

if ($_POST) {
    if (
        isset($_POST['username']) && !empty($_POST['username'])
        && isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['password']) && !empty($_POST['password'])
        && isset($_POST['avatar']) && !empty($_POST['avatar'])
    ) {
        require_once('../model/connect.php');

        $username = strip_tags($_POST['username']);
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $avatar = strip_tags($_POST['avatar']);

        $sql = 'INSERT INTO `users` (`username`, `email`, `password`, `avatar`) VALUES (:username, :email, :password, :avatar);';

        $query = $db->prepare($sql);

        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_INT);
        $query->bindValue(':avatar', $avatar, PDO::PARAM_INT);

        $query->execute();

        $_SESSION['message'] = "User ajouté";
        header('Location: home.php');
    } else {
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

?>