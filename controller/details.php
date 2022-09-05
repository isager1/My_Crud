<?php
session_start();

if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('../model/connect.php');

    $id = strip_tags($_GET['id']);
    $sql = 'SELECT * FROM `users` WHERE `id` = :id;';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $user = $query->fetch();

    if(!$user){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: home.php');
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: home.php');
}
