<?php
$pas = file_get_contents('settings/gamePass.txt');
$usrName = $_POST['usr'];
$usrPas = $_POST['pass'];
$dirty = $_COOKIE['validity'];
if($dirty != '1')
{
	if(($usrName != '') and ($usrPas != ''))
	{
		$usrPas = strtoupper($usrPas);
		$pas = strtoupper($pas);
		if($pas == $usrPas)
		{
			$usrCount = file_get_contents('users/userCount.txt');
			$maxPlayTime = file_get_contents('settings/maxPlayTime.txt');
			$usrCount = $usrCount + 1;
			file_put_contents('users/userCount.txt',$usrCount);
			mkdir("users/$usrCount");
			file_put_contents("users/$usrCount/playerName.txt",$usrName);
			file_put_contents("users/$usrCount/marks.txt","");
			setcookie("user", "$usrCount", time()+60*$maxPlayTime);
			setcookie("validity", "1", time()+3600*12);
			echo "
			<html>
			<head>
			</head>
			<body>
			<div style='width:100%;height:5%;background:#34495E;'>
			<center>
				<h1 style='color:white;'>Even if the world ends ... Do not refresh this page !!!
				</h1>
			</center>
			</div>
			<br>
			<br>
			</body>
			</html>
			";
			include 'rules.html';
			echo "
			<html>
			<head>
			</head>
			<body>
			<br>
			<br>
			<a href='arena.php'>
			<div style='width:100%;height:5%;background:#E74C3C;'>
			<center>
				<h1 style='color:white;'>After understanding the rules Click here to continue !!!
				</h1>
			</center>
			</div>
			</a>
			<br>
			</body>
			</html>
			";			
		}
	}
}
else
{
	echo "
	<img src='pics/gover.jpg' style='position:absolute;top:0px;left:0px;width:100%;height:100%;'>
	";
}
?>