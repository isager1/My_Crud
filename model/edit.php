<?php  
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fullname'])) {



if(isset($_POST['fullname']) && 
   isset($_POST['mail'])){

      require_once("db.php");

    $fullname = $_POST['fullname'];
    $mail = $_POST['mail'];
    $old_avatar = $_POST['old_avatar'];
    $id = $_SESSION['id'];

    if (empty($fullname)) {
    	$em = "Fullname est requis";
    	header("Location: ../view/edit.php?error=$em");
	    exit;
    }else if(empty($mail)){
    	$em = "Email est requis";
    	header("Location: ../view/edit.php?error=$em");
	    exit;
    }else {

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
               $old_avatar_des = "../upload/$old_avatar";
               if(unlink($old_avatar_des)){
               	  move_uploaded_file($tmp_name, $img_upload_path);
               }else {
               	  move_uploaded_file($tmp_name, $img_upload_path);
               }
               
               $sql = "UPDATE users SET fullname=?, email=?, avatar=? WHERE id=?";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$fullname, $mail, $new_img_name, $id]);
               $_SESSION['fullname'] = $fullname;
               header("Location: ../view/edit.php?success=Your account has been updated successfully");
                exit;
            }else {
               $em = "Vous ne pouvez pas télécharger de fichiers de ce type";
               header("Location: ../view/edit.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "Une erreur inconnue !";
            header("Location: ../view/edit.php?error=$em&$data");
            exit;
         }

        
      }else {
       	$sql = "UPDATE users SET fullname=?, email=? WHERE id=?";
       	$stmt = $conn->prepare($sql);
       	$stmt->execute([$fullname, $mail, $id]);

       	header("Location: ../view/edit.php?success=Your account has been updated successfully");
   	    exit;
      }
    }


}else {
	header("Location: ../view/edit.php?error=error");
	exit;
}


}else {
	header("Location: login.php");
	exit;
} 






