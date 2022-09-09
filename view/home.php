<?php 
session_start();
require_once('../model/message.php');

if (isset($_SESSION['id']) && isset($_SESSION['fullname'])) {
require_once("../model/db.php");
require_once("../model/user.php");    
$user = getUserById($_SESSION['id'], $conn);

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="https://use.fontawesome.com/55a00392d5.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../view/scripts/index.js"></script>
</head>
<body>

    <div class="grandCont">
        <div class="panelCont">
            <h1>teptar<span>.</span></h1>
            <div class="iconsCont">
                <i class="fa fa-home" title="Accueil"></i>
                <i class="fa fa-envelope" title="Messages"></i>
                <i class="fa fa-gear" title="Parametres"></i>
            </div>
            <div class="rightIconBlock">
            <a href="logout.php" class="btn btn-logout">Logout</a>
            </div>

        </div>

        <div class="bodyCont">
            <div class="panelSearch">
                <form action="s" method="POST">
                    <input type="search" name="search2" id="search2" placeholder="Rechercher sur teptar">
                </form>
                <div id="back_result2"></div>
            </div>
            
            <div class="firstCont">
            <?php if ($user) { ?>
                <div class="userCont">
    		        <img src="../upload/<?=$user['avatar']?>">
                    <h3 class="display-4 "><?=$user['fullname']?></h3>
                    <a href="edit.php" class="btn btn-edit">Editer profil</a>
            </div>
            <?php }else { 
            header("Location: login.php");
            exit;
            } ?>

            </div>
            <div class="secondCont">
                <div class="secondContWrap">
                    <a href="create.php"><i class="fa fa-plus"></i></a>
                    <div class="storyInfo">
                        <h4>Creer une story</h4>
                        <p>Partagez une photo ou un message.</p>
                    </div>
                </div>
                <div class="messageCont">
                    <div class="backMessage">
                    <?php foreach ($query as $q) { ?>
                            <div class="card-body">
                                <p><?php echo substr($q['content'], 0, 50); ?>...</p>
                                <form method="POST">
                                    <input type="text" hidden value='<?php echo $q['id'] ?>' name="id">
                                    <button class="btn btn-delete" name="delete">x</button>
                                </form>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>


            <div class="thirdCont">
                <form action="s" method="POST">
                    <input type="search" name="search" id="search" placeholder="Rechercher sur teptar">
                </form>
                <div id="back_result"></div>
            </div>
        </div>

    </div>
    
    <div class="footer">
        <div class="footerPanel">
        <div class="footerCont">
            <h6>Copyright © 2022 All rights reserved</h6>
        </div>
        </div>
    </div>
    
</body>
</html>

<?php }else {
	header("Location: login.php");
	exit;
} ?>