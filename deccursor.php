<?php
$curQn = $_COOKIE['cursor'];
if($curQn > 1)
{
	$curQn = $curQn - 1;
	setcookie("cursor", "$curQn", time()+3600*12);
	header('location:arena.php');
}
else
{
	$curQn = 1;
	setcookie("cursor", "$curQn", time()+3600*12);
	header('location:arena.php');

}

?>