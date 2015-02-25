<?php
$x = $_POST['admin'];
file_put_contents('settings/admin.txt',"$x");
header('location:adminhome.php');
?>