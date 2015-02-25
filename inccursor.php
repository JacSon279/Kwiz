<?php
$curQn = $_COOKIE['cursor'];
$qnCount = file_get_contents("questions/qnCount.txt");
if($curQn < $qnCount)
{
	$curQn = $curQn + 1;
	setcookie("cursor", "$curQn", time()+3600*12);
	header('location:arena.php');
}
else
{
	$curQn = $qnCount;
	setcookie("cursor", "$curQn", time()+3600*12);
	header('location:arena.php');

}

?>