<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/auth.css">
	<script src="https://use.fontawesome.com/55a00392d5.js"></script>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" action="../model/login.php" method="post">

    		<h4 class="display-4  fs-1">Se connecter</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		  <div class="mb-3">
		    <label class="form-label">Email</label>
		    <input type="email" class="form-control" name="mail" value="<?php echo (isset($_GET['mail']))?$_GET['mail']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="password" class="form-control" name="pass">
		  </div>
		  
		 
		  <div class="btns-auth">
			<button type="submit" class="btn btn-primary">Se connecter</button>
			<a href="register.php">S'inscrire</a>
			<a href="index.php" class="home-btn">Home</a>
		  </div>
		</form>
    </div>
</body>
</html>