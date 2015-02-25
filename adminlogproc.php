<?php
$x = file_get_contents('settings/admin.txt');
$y = $_POST['admin'];
if($x==$y)
{
	setcookie("admin", "1", time()+3600*1);
	header('location:adminhome.php');
}
else
{
	header('location:index.php');
}
?>