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
        header('Location: allusers.php');
    } else {
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un username</title>

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
                <h1>Ajouter un user</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Aavatar</label>
                        <input type="file" name="avatar" id="avatar">
                    </div>
                    <button class="btn btn-primary">Envoyer</button>
                </form>
            </section>
        </div>
    </main>
</body>

</html>