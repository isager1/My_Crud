<?php
session_start();

require_once('../model/message.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/message.css">


    <title>Create message</title>
</head>

<body>

    <div class="storys">
        <form method="POST">
            <textarea name="content" class="content"></textarea>
            <button class="btn" name="new_post">Ajouter</button>
        </form>
    </div>
</body>

</html>