<?php
session_start();
require_once("../controller/details.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Détails du user</title>
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
                <p><a href="allusers.php">Retour</a> <a href="edit.php?id=<?= $user['id'] ?>">Modifier</a></p>
            </section>
        </div>
    </main>
</body>
</html>