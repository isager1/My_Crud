<?php 
session_start();

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
	<title>Edit Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php if ($user) { ?>

    <div class="d-flex justify-content-center align-items-center vh-100">
        
        <form class="shadow w-450 p-3" action="../model/edit.php" method="post" enctype="multipart/form-data">

            <h4 class="display-4  fs-1">Editer profil</h4><br>
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
            
            <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
              <?php echo $_GET['success']; ?>
            </div>
            <?php } ?>
          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullname" value="<?php echo $user['fullname']?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="mail" value="<?php echo $user['email']?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Profile Picture</label>
            <input type="file" class="form-control" name="pp">
            <img src="../upload/<?=$user['avatar']?>" class="rounded-circle" style="width: 70px">
            <input type="text" hidden="hidden" name="old_avatar" value="<?=$user['avatar']?>" >
          </div>
          
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="../model/delete.php?id=<?= $user['id'] ?>" class="btn btn-danger">Delete</a>
          <a href="home.php" class="btn btn-success">Home</a>
        </form>
    </div>
    <?php }else{ 
        header("Location: home.php");
        exit;

    } ?>
</body>
</html>

<?php }else {
	header("Location: login.php");
	exit;
} ?>