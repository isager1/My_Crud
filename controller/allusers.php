<?php
session_start();

require_once('../model/connect.php');

$sql = 'SELECT * FROM `users`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);


?>