<?php
session_start();

if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('db.php');

    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `users` WHERE `id` = :id;';

    $query = $conn->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $produit = $query->fetch();

    if(!$produit){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: ../view/edit.php');
        die();
    }

    $sql = 'DELETE FROM `users` WHERE `id` = :id;';

    $query = $conn->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $_SESSION['message'] = "User supprimé";
    header('Location: ../view/edit.php');


}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: ../view/edit.php');
}