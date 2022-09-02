<?php
// On démarre une session
session_start();

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `users` WHERE `id` = :id;';

    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $produit = $query->fetch();

    if(!$produit){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: ../view/allusers.php');
        die();
    }

    $sql = 'DELETE FROM `users` WHERE `id` = :id;';

    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $_SESSION['message'] = "User supprimé";
    header('Location: ../view/allusers.php');


}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: ../view/allusers.php');
}
