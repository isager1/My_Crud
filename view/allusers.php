<?php
session_start();

require_once('../model/connect.php');

$sql = 'SELECT * FROM `users`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="/view/public/style.css">
    <script src="https://use.fontawesome.com/55a00392d5.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/view/scripts/home.js"></script>

    <title>Teptar</title>
</head>

<body>

    <div id="login_content" class="grandCont">
    <div class="panelCont">
                <h1>teptar<span>.</span></h1>
            <div class="iconsCont">
                <i class="fa fa-home" title="Accueil"></i>
                <i class="fa fa-bell" title="Notifications"></i>
                <i class="fa fa-envelope" title="Messages"></i>
                <i class="fa fa-circle-user" title="Compte"></i>
            </div>
            <div class="rightIconBlock">
                <i class="fa fa-user-group" title="Users"></i>
                <i class="fa-solid fa-right-from-bracket" class="logOut" id="logout_button"></i>
            </div>

        </div>
    </div>

    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php
                if (!empty($_SESSION['erreur'])) {
                    echo '<div class="alert alert-danger" role="alert">
                                ' . $_SESSION['erreur'] . '
                            </div>';
                    $_SESSION['erreur'] = "";
                }
                ?>
                <?php
                if (!empty($_SESSION['message'])) {
                    echo '<div class="alert alert-success" role="alert">
                                ' . $_SESSION['message'] . '
                            </div>';
                    $_SESSION['message'] = "";
                }
                ?>
                <h2>Liste des users</h2>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $user) {
                        ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><a href="details.php?id=<?= $user['id'] ?>">Voir</a> <a href="edit.php?id=<?= $user['id'] ?>">Modifier</a> <a href="../model/delete.php?id=<?= $user['id'] ?>">Supprimer</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="add.php" class="btn btn-primary">Ajouter un user</a>
            </section>
        </div>
    </main>

</body>

</html>