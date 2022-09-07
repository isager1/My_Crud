<?php

session_start();
require_once("allusers.php");


include('../model/db.php');

$sql = "SELECT username, email, avatar FROM users WHERE email LIKE '%" . $_POST['id'] . "%'";
$array = $connection->query($sql);

foreach ($array as $key) {


?>
    <div id="user"><img src="<?php echo $key['avatar'] ?>" id="pic" />&nbsp;<span><?php echo $key['username'] . "\n" ?><a href="../view/details.php?id=<?=$key['id'] ?>">Voire</a></span></div>
<?php

}

?>