<?php

if ($_POST) {
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['username']) && !empty($_POST['username'])
        && isset($_POST['email']) && !empty($_POST['email'])
    ) {
        require_once('../model/connect.php');

        $id = strip_tags($_POST['id']);
        $username = strip_tags($_POST['username']);
        $email = strip_tags($_POST['email']);

        $sql = 'UPDATE `users` SET `username`=:username, `email`=:email WHERE `id`=:id;';

        $query = $db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['message'] = "username modifié";

        header('Location: home.php');
    } else {
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('../model/connect.php');

    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `users` WHERE `id` = :id;';

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();

    $username = $query->fetch();

    if (!$username) {
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: home.php');
    }
} else {
    $_SESSION['erreur'] = "URL invalide";
    header('Location: home.php');
}
