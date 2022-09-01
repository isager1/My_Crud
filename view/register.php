<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/public/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Register</title>
</head>

<body>
    <form id="regForm">
        <div class="regFormStyl">
        <i class="fa fa-xmark"></i>
            <h2>S'inscrire</h2>
            <input type="text" name="username" id="username" placeholder="Your username" autocomplete="off">
            <input type="email" name="email" id="email" placeholder="Enter your email" autocomplete="off">
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <input type="file" name="avatar" id="avatar">
            <button type="submit" id="btn-reg">S'inscrire</button>
            <p>Vous avez déjà un compte?</p>
            <div id="regBorder"></div>
            <a href="/view/login.php">Se connecter</a>
            <div id="msg-warning"></div>
        </div>
    </form>
    <script src="/view/scripts/reg.js"></script>
</body>

</html>