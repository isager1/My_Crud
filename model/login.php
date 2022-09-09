<?php 
session_start();

if(isset($_POST['mail']) && 
   isset($_POST['pass'])){

      require_once("../model/db.php");

    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    $data = "mail=".$mail;
    
    if(empty($mail)){
    	$em = "Email est requis";
    	header("Location: ../view/login.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Password est requis";
    	header("Location: ../view/login.php?error=$em&$data");
	    exit;
    }else {

    	$sql = "SELECT * FROM users WHERE email = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$mail]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $email =  $user['email'];
          $password =  $user['password'];
          $fullname =  $user['fullname'];
          $id =  $user['id'];
          $avatar =  $user['avatar'];

          if($email === $mail){
             if(password_verify($pass, $password)){
                 $_SESSION['id'] = $id;
                 $_SESSION['fullname'] = $fullname;
                 $_SESSION['avatar'] = $avatar;

                 header("Location: ../view/home.php");
                 exit;
             }else {
               $em = "Identifiant ou mot de passe incorrect";
               header("Location: ../view/login.php?error=$em&$data");
               exit;
            }

          }else {
            $em = "Identifiant ou mot de passe incorrect";
            header("Location: ../view/login.php?error=$em&$data");
            exit;
         }

      }else {
         $em = "Identifiant ou mot de passe incorrect";
         header("Location: ../view/login.php?error=$em&$data");
         exit;
      }
    }


}else {
	header("Location: ../view/login.php?error=error");
	exit;
}


