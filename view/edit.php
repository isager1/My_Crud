<?php
session_start();
require_once("../controller/edit.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Modifier un username</title>

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