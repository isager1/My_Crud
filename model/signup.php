<?php 

if(isset($_POST['fullname']) && 
   isset($_POST['mail']) &&  
   isset($_POST['password'])){

require_once("db.php");

    $fullname = $_POST['fullname'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $data = "fullname=".$fullname."&mail=".$mail;
    
    if (empty($fullname)) {
    	$em = "Le fullname est requis";
    	header("Location: ../view/register.php?error=$em&$data");
	    exit;
    }else if(empty($mail)){
    	$em = "Email est requis";
    	header("Location: ../view/register.php?error=$em&$data");
	    exit;
    }else if(empty($password)){
    	$em = "Mot de passe est requis";
    	header("Location: ../view/register.php?error=$em&$data");
	    exit;
    }else {
      $password = password_hash($password, PASSWORD_DEFAULT);

      if (isset($_FILES['avatar']['name']) AND !empty($_FILES['avatar']['name'])) {
         
         
         $img_name = $_FILES['avatar']['name'];
         $tmp_name = $_FILES['avatar']['tmp_name'];
         $error = $_FILES['avatar']['error'];
         
         if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid($mail, true).'.'.$img_ex_to_lc;
               $img_upload_path = '../upload/'.$new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);

               $sql = "INSERT INTO users(fullname, email, password, avatar) 
                 VALUES(?,?,?,?)";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$fullname, $mail, $password, $new_img_name]);

               header("Location: ../view/register.php?success=Your account has been created successfully");
                exit;
            }else {
               $em = "Vous ne pouvez pas télécharger de fichiers de ce type";
               header("Location: ../view/register.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "Une erreur inconnue !";
            header("Location: ../view/register.php?error=$em&$data");
            exit;
         }

        
      }else {
       	$sql = "INSERT INTO users(fullname, email, password) 
       	        VALUES(?,?,?)";
       	$stmt = $conn->prepare($sql);
       	$stmt->execute([$fullname, $mail, $password]);

       	header("Location: ../view/register.php?success=Your account has been created successfully");
   	    exit;
      }
    }


}else {
	header("Location: ../view/register.php?error=error");
	exit;
}
