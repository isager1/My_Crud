<?php
session_start();

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

        header('Location: allusers.php');
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
        header('Location: allusers.php');
    }
} else {
    $_SESSION['erreur'] = "URL invalide";
    header('Location: allusers.php');
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un username</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
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
                <h1>Modifier un username</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?= $username['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?= $username['email'] ?>">

                    </div>

                    <input type="hidden" value="<?= $username['id'] ?>" name="id">
                    <button class="btn btn-primary">Envoyer</button>
                </form>
            </section>
        </div>
    </main>
</body>

</html>