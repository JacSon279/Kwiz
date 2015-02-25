<?php
	setcookie("admin", "", time()+3600*1);
	header('location:index.php');
?>