<?php
$x = $_POST['gamepin'];
file_put_contents('settings/gamePass.txt',"$x");
header('location:adminhome.php');
?>