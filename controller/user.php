<?php
session_start();
require_once("../model/user.php");

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "register":
            User::Register();
            break;
        case "login":
            User::login();
            break;
        case "verify":
            User::verify();
            break;
        default:
            break;
    }
}

