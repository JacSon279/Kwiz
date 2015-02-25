<?php
$validity = $_COOKIE['validity'];
if($validity != '')
{
	$x = $_POST['ans'];
	$curQn = $_COOKIE['cursor'];
	$user = $_COOKIE['user'];
	$answered = $_COOKIE['answered'];
	$ansd = $answered . $curQn . ",";
	setcookie("answered", "$ansd", time()+3600*12);
	$y = file_get_contents("users/$user/marks.txt");
	$content = "$curQn-->$x\r\n";
	$y = $y . $content;
	file_put_contents("users/$user/marks.txt",$y);
	header('location:arena.php');
}
else
{
	echo "
	game over
	";
}
?>