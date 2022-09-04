<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/public/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>

<body>
    <div id="logForm">
        <div class="logFormStyl">
        <i class="fa fa-xmark"></i>
            <h2>Se connecter</h2>
            <form id="login_form">
                <input type="text" name="username" id="username" placeholder="Your username" autocomplete="off">
                <input type="password" name="password" id="password" placeholder="Enter your password">
                <button type="submit" id="btn-log">Se connecter</button>
            </form>
            <span id="infoMdp">Informations de compte oubliées ?</span>
            <p>Vous n'avez pas de compte ?</p>
            <div id="regBorder"></div>
            <a href="/view/register.php">S'inscrire</a>
            <div id="msg-warning">
                
            </div>
        </div>
    </div>
    <script src="/view/scripts/log.js"></script>
</body>

</html>