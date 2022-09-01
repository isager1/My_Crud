<?php

require_once('db.php');

class User {
    public static function register() {
        global $connection;
    
        if (isset($_FILES["avatar"]) == false)
            return;
        $filename = $_FILES['avatar']['name'];
        $destination = "../uploads/" . $_POST["email"] . "/";
        $image_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $valid_extensions = array("jpg","jpeg","png");
        if (in_array($image_extension, $valid_extensions) == false)
            return;
        $sql = 'INSERT INTO users (id, username, email, password, avatar) VALUES (0, :username, :email, :password, :avatar)';
        $request = $connection->prepare($sql);
        $data = [
            "username" => $_POST['username'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "avatar" => "/uploads" . "/" . $_POST["email"]  . "/$filename"

        ];
        if ($request->execute($data) == true) {
            if (file_exists($destination) == false)
                mkdir($destination);
            move_uploaded_file($_FILES['avatar']['tmp_name'], $destination.$filename);
            echo json_encode($request->fetchAll());
            
        }

    

    }



    public static function login() {
        global $connection;
        $data = [
            "username" => $_POST['username'],
            "password" => $_POST['password'],
         
        ];
        $sql = 'SELECT * FROM users WHERE username = :username AND password = :password';
        $request = $connection->prepare($sql);
        $request->execute($data);

        if ($request->rowCount() > 0) {
            echo json_encode([
                "status" => 200,
                "data" => $request->fetch()
                
            ]);
        } else {
            echo json_encode([
                "status" => 400,
                "data" => null
            ]);

        }

    }

    public static function verify() {
        global $connection;
        $data = [
            "username" => $_POST['username'],
            "password" => $_POST['password'],
         
        ];
        $sql = 'SELECT * FROM users WHERE username = :username AND password = :password';
        $request = $connection->prepare($sql);
        $request->execute($data);
        if ($request->rowCount() > 0)
            echo json_encode([
                "status" => 200,
                "data" => null
            ]);
        else
            echo json_encode([
                "status" => 400,
                "data" => null
            ]);


    }
    
}
