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
    <script src="/view/scripts/effets.js"></script>
    <script src="/view/scripts/home.js"></script>
    <title>Teptar</title>
</head>

<body>
    <div id="logout_global" class="globalCont" style="display:none;">
        <div class="logoCont">
            <h1>teptar<span>.</span></h1>
            <p>avec <span>teptar</span>, partagez et restez en <br> contact avec votre entourage.</p>
        </div>
        <div class="homeCont">
            <div id="logout_content" style="display:none" class="navBar">
                <div class="navInside">
                    <a href="/view/login.php">Se connecter</a>
                    <div id="regBorder"></div>
                    <a href="/view/register.php" style="background-color:rgb(33, 167, 21);">Creer nouveau compte</a>
                </div>
            </div>
        </div>
    </div>



    <div id="login_content" style="display:none" class="grandCont">
        <div class="panelCont">
            <a href="home.php">
                <h1>teptar<span>.</span></h1>
            </a>
            <div class="iconsCont">
                <i class="fa fa-home" title="Accueil"></i>
                <i class="fa fa-bell" title="Notifications"></i>
                <i class="fa fa-envelope" title="Messages"></i>
                <i class="fa fa-circle-user" title="Compte"></i>
            </div>
            <i class="fa-solid fa-right-from-bracket" class="logOut" id="logout_button"></i>
        </div>

        <div class="bodyCont">
            <div class="firstCont">
                <div class="personalCont">
                    <div id="avatar"><img src="#"></div>
                    <div class="nameMail">
                        <div id="nameTwo"></div>
                        <div id="email"></div>
                    </div>

                </div>

            </div>
            <div class="secondCont">
                <div class="secondContWrap">
                    <i class="fa fa-plus"></i>
                    <div class="storyInfo">
                        <h4>Creer une story</h4>
                        <p>Partagez une photo ou un message.</p>
                    </div>
                </div>
                <div class="messageCont">

                </div>
            </div>
            <div class="thirdCont">
                <form action="#">
                    <input type="search" placeholder="Rechercher sur teptar">
                </form>
            </div>
        </div>

    </div>
</body>

</html>