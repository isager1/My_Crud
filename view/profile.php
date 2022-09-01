<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/public/style.css">
    <script src="https://use.fontawesome.com/55a00392d5.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../view/scripts/home.js"></script>
    <title>Profile</title>
</head>
<body>

<div id="login_content" style="display:none" class="grandCont">
        <div class="firstCont">
            <a href="home.php"><img src="/img/log.png" alt="log"></a>
            <h3><i class="fa fa-home"></i><a href="home.php">Accueil</a></h3>
            <h3><i class="fa fa-hashtag"></i><a href="#">Explorer</a></h3>
            <h3><i class="fa fa-bell"></i><a href="#">Notifications</a></h3>
            <h3><i class="fa fa-envelope"></i><a href="#">Messages</a></h3>
            <h3 id="profile"><i class="fa fa-user"></i><a href="/view/profile.php">Profil</a></h3>
            <div class="popTweet">Tweeter</div>
            <div id="logout_button" class="logOut">
                <p>logout</p>
            </div>            
        </div>
        
    <div class="profil">
    <a href="home.php"><i class="fa fa-arrow-left"></i></a><div id="name"></div>
    <p>0 Tweet</p>
        <div class="profStyle">
            <div id="avatar"><img src="#"></div>
            <div id="nameTwo"></div>
            <div id="email"></div><hr>
            <div class="navProf">
                <a href="#">Tweets</a>
                <a href="#">Tweets et reponses</a>
                <a href="#">Medias</a>
                <a href="#">J'aime</a>
            </div>

        </div>
    </div>
    <div class="thirdCont">
                 <form action="s" method="POST">
                    <input type="search" name="search" id="search" placeholder="SEARCH" autocomplete="off" />
                </form>
                <div id="back_result"></div>
        </div>
</div>
</body>
</html>
