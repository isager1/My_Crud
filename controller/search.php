<?php

session_start();
require_once('../model/user.php');

require_once('../model/db.php');

$sql = "SELECT fullname, email, avatar FROM users WHERE email LIKE '%" . $_POST['id'] . "%'";
$array = $conn->query($sql);

foreach ($array as $key) {


?>
    <div id="user"><img src="<?php echo $key['avatar'] ?>" id="pic" />&nbsp;<span><?php echo $key['fullname'] . "\n" ?></a></span></div>
<?php

}

?>