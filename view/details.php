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
        header('Location: allusers.php');
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: allusers.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du user</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Détails du <?= $user['username'] ?></h1>
                <p>ID : <?= $user['id'] ?></p>
                <p>User : <?= $user['username'] ?></p>
                <p>Email : <?= $user['email'] ?></p>
                <p>Avatar : <?= $user['avatar'] ?></p>
                <p><a href="index.php">Retour</a> <a href="edit.php?id=<?= $user['id'] ?>">Modifier</a></p>
            </section>
        </div>
    </main>
</body>
</html>