<?php

include('../model/db.php');

$sql = "SELECT firstname, lastname, avatar FROM users WHERE firstname LIKE '%".$_POST['name']."%'";
$array = $connection->query($sql);

foreach($array as $key) {

    
?>
    <div id="user"><img src="<?php echo $key['avatar'] ?>" id="pic" />&nbsp;<span><?php echo $key['firstname'] . "\n"?><?php echo $key['lastname']?></span></div>
<?php

}

?>