<?php
$izadmin = $_COOKIE['admin'];
if($izadmin == 1)
{

	$adminPin = file_get_contents('settings/admin.txt');
	$gamePin = file_get_contents('settings/gamePass.txt');
	$maxTym = file_get_contents('settings/maxPlayTime.txt');
	$insCon = file_get_contents('rules.html');
	echo "
	<html>
	<head>
	<style>
			ul li{
			float:left;
			padding:10px 20px 10px 20px;
			background:#95A5A6;
			color:white;
			font-family:sans-serif;
			font-weight:bold;
			border:solid 1px white;
			}	
		
			ul li:hover {
			background:#E74C3C;
			}			
			a {
			text-decoration:none;
			}
	</style>
	</head>
	<body style='font-family:sans-serif;'>
	<img src='pics/kwiz.png' style='width:8%;height:15%;position:absolute;top:3%;left:4%;' id='up'>
	<ul style='position:absolute;top:10px;right:30px;'>
		<a href='#ops'><li>Settings
		</li></a>	
		<a href='#rulez'><li>Game Rules
		</li></a>			
		<a href='#qns'><li>Questions
		</li></a>		
		<a href='results.php'><li>Results
		</li></a>	
		<a href='logout.php'><li>Logout
		</li></a>
	</ul>
	
	<div id='ops' style='width:50%;height:40%;border:solid 4px #2ECC71;border-radius:15px;position:absolute;top:20%;left:25%;'>
	<center>
	<br>
	<form action='chad.php' method='post'>
	<h3>Administrator Password </h3><input type='text' name='admin' value='$adminPin'>
	<input type='submit' VALUE='Change Admin Password'><br>
	</form>
	<form action='gad.php' method='post'>
	<h3>Game Password </h3><input type='text' name='gamepin' value='$gamePin'>
	<input type='submit' VALUE='Change Game Password'><br>
	</form>
	<form action='tad.php' method='post'>
	<h3>Maximum Game Time Limit ( In Minutes )</h3><input type='number' name='timex' value='$maxTym'>
	<input type='submit' VALUE='Update Play Time'><br>	
	</form>
	</center>
	</div>
	
	<div id='rulez' style='width:50%;height:120%;border:solid 4px #2ECC71;border-radius:15px;position:absolute;top:65%;left:25%;'>
	<center>
	<h1>
	Edit Game Rules ( HTML document )
	</h1>
	<h2>
	Please Use HTML tags
	</h2>	
	<form action='ruleup.php' method='post'>
	<textarea style='width:95%;height:75%;resize:none;' name='ruz'>$insCon</textarea><br><br>
	<input type='submit' VALUE='Update Rules Html Document'><br>
	</form>
	</center>
	</div>	
	
	<div id='qns' style='width:50%;border:solid 4px #2ECC71;border-radius:15px;position:absolute;top:190%;left:25%;'>
	<center>
	<h1>
		Questions Available
	</h1><br>";
	
	$qnCount = file_get_contents('questions/qnCount.txt');
	for($x = 1;$x <= $qnCount; $x++)
	{
		$curQn = $x;
		@$qnContent = file_get_contents("questions/$curQn/QUESTION.txt");
		$opta = file_get_contents("questions/$curQn/OPTIONA.txt");
		$optb = file_get_contents("questions/$curQn/OPTIONB.txt");
		$optc = file_get_contents("questions/$curQn/OPTIONC.txt");
		$optd = file_get_contents("questions/$curQn/OPTIOND.txt");	
		
		echo "
		<table style='width:90%;text-align:center;font-family:sans-serif;font-size:20px;color:#2C3E50;border:solid 2px #2ECC71;' border='1' cellspacing='0'>
		<tr>
			<td colspan='2' >Question $x
			</td>		
		</tr>
		<tr>
		";	
		if(file_exists("questions/$curQn/QUESTION.txt"))
		{
			echo "
			<td colspan='2' >
			$qnContent";
		}
		else
		{
			echo "
			<td colspan='2' style='height:250px;'>
			<img src='questions/$curQn/QUESTION.jpg' style='position:relative;top:0px;left:0px;width:100%;height:250px;'>";
		}
		echo "
		</td>
		</tr>
		<tr>
		<td style='width:50%;'>$opta
		</td>
		<td style='width:50%;'>$optb
		</td>
		</tr>
		<tr>
		<td style='width:50%;'>$optc
		</td>
		<td style='width:50%;'>$optd
		</td>
		</tr>
		</table>
		<br>
		";
	}
	echo "
	<table style='width:90%;text-align:center;font-family:sans-serif;font-size:20px;color:#2C3E50;border:solid 2px #2ECC71;' border='1' cellspacing='0'>
	<tr>
	<td>
	<a href='addqnform.php'><button style='width:100%;font-size:25px;color:white;background:#2C3E50'>Add a Question +</button></a>
	<a href='remqn.php'><button style='width:100%;font-size:25px;color:white;background:#2C3E50'>Remove a Question -</button></a>
	
	</td>
	</tr>
	</table>
	<br><br><br>
	</center>
	</div>
	
	
	<a href='#up'><img src='pics/upbutton.png' style='position:fixed;bottom:30px;right:30px;width:50px;height:50px;'></a>
	</body>
	</html>
	";
}
else
{
	header('location:index.php');
}

?>