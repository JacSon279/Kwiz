<?php
$curUsr = $_COOKIE['user'];
$curQn = $_COOKIE['cursor'];
$answered = $_COOKIE['answered'];

if($curUsr != '')
{
	if($answered == '')
	{
		$answered = ',';
		setcookie("answered", "$answered", time()+3600*12);
	}
	if($curQn == '')
	{
		$curQn = 1;
		setcookie("cursor", "$curQn", time()+3600*12);		
	}	
		
	@$qnContent = file_get_contents("questions/$curQn/QUESTION.txt");
	$opta = file_get_contents("questions/$curQn/OPTIONA.txt");
	$optb = file_get_contents("questions/$curQn/OPTIONB.txt");
	$optc = file_get_contents("questions/$curQn/OPTIONC.txt");
	$optd = file_get_contents("questions/$curQn/OPTIOND.txt");
	$qnCount = file_get_contents("questions/qnCount.txt");
	
	$nosAns = 0;
	$commaRay = explode(",","$answered");
	foreach($commaRay as $item)
	{
		if($item != '')
		{
			$nosAns = $nosAns + 1;
		}
	}
	
	$remainQn = $qnCount - $nosAns;
	
	echo "
	<html>
	<head>
	<style>
		body {
			font-family:sans-serif;
		}
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
	</style>
	<script>
		function jac1(){
			var x = document.getElementById('jac1').checked='true';
		}
		function jac2(){
			var x = document.getElementById('jac2').checked='true';
		}
		function jac3(){
			var x = document.getElementById('jac3').checked='true';
		}
		function jac4(){
			var x = document.getElementById('jac4').checked='true';
		}	
	</script>
	</head>
	<body>
<!-- ----------------------------- HEADER DIV --------------------------------------------------- -->
<div style='position:absolute;top:0px;left:0px;background:#34495E;width:100%;height:10%;'>
<h2 style='color:white;float:left;'>&#160 &#160 &#160 &#160 You have $remainQn Questions remaining to be answered !!!</h2>
<h2 style='color:white;float:right;'>Qn. $curQn &#160 &#160 &#160 &#160 </h2>
</div>
<!-- -------------------------------------------------------------------------------------------------- -->
";

if(stristr($answered,$curQn))
{
	echo "
	<!-- ----------------------------- MAIN DIV --------------------------------------------------- -->
	<div style='position:absolute;top:15%;left:10%;background:#E74C3C;width:80%;height:60%;opacity:1;'>

	<table style='width:100%;height:100%;text-align:center;font-family:sans-serif;font-size:20px;color:#2C3E50;border:solid 2px #2ECC71;' border='1' cellspacing='0'>
	<tr>
	<td colspan='4' style='height:70%;'>";	
	if(file_exists("questions/$curQn/QUESTION.txt"))
	{
		echo "$qnContent";
	}
	else
	{
		echo "<img src='questions/$curQn/QUESTION.jpg' style='position:absolute;top:0px;left:0px;width:100%;height:70%;'>";
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
	<table style='width:100%;text-align:center;background:#E74C3C;border:solid 2px #2ECC71;'>
	<tr>
	<td style='width:30%;'>
	<a href='deccursor.php' style='text-decoration:none'><font type='submit' style='background:#3498DB;border:none;font-size:20px;padding:8px;color:white;'>Previous Question<font/></a>
	</td>
	<td style='width:30%;'>
	<br><br><br>
	</td>
	<td style='width:30%;'>
	<a href='inccursor.php' style='text-decoration:none;'><font type='submit' style='background:#3498DB;border:none;font-size:20px;padding:8px;color:white;'>Next Question<font/></a>
	</td>
	</tr>
	</table>

	</div>
	<!-- -------------------------------------------------------------------------------------------------- -->
	";
}
else
{
	echo "
	<!-- ----------------------------- MAIN DIV --------------------------------------------------- -->
	<div style='position:absolute;top:15%;left:10%;background:#E74C3C;width:80%;height:60%;opacity:1;'>
	<form action='saver.php' method='post'>
	<table style='width:100%;height:100%;text-align:center;font-family:sans-serif;font-size:20px;color:white;border:solid 2px #2ECC71;' border='1' cellspacing='0'>
	<tr>
	<td colspan='4' style='height:70%;'>";	
	if(file_exists("questions/$curQn/QUESTION.txt"))
	{
		echo "$qnContent";
	}
	else
	{
		echo "<img src='questions/$curQn/QUESTION.jpg' style='position:absolute;top:0px;left:0px;width:100%;height:70%;'>";
	}
	echo "
	</td>
	</tr>
	<tr>
	<td style='width:5%;background:#3498DB;'><input type='radio' name='ans' value='A' required id='jac1'>
	</td>
	<td style='width:45%;' onclick='jac1();'>$opta
	</td>
	<td style='width:45%;' onclick='jac2();'>$optb
	</td>
	<td style='width:5%;background:#3498DB;'><input type='radio' name='ans' value='B' required id='jac2'>
	</td>
	</tr>
	<tr>
	<td style='width:5%;background:#3498DB;'><input type='radio' name='ans' value='C' required id='jac3'>
	</td>
	<td style='width:45%;' onclick='jac3();'>$optc
	</td>
	<td style='width:45%;' onclick='jac4();'>$optd
	</td>
	<td style='width:5%;background:#3498DB;'><input type='radio' name='ans' value='D' required id='jac4'>
	</td>
	</tr>
	</table>
	<table style='width:100%;text-align:center;background:#E74C3C;border:solid 2px #2ECC71;'>
	<tr>
	<td style='width:30%;'>
	<a href='deccursor.php' style='text-decoration:none'><font style='background:#3498DB;border:none;font-size:20px;padding:8px;color:white;'>Previous Question<font/></a>
	</td>
	<td style='width:30%;'>
	<input type='submit' style='background:#3498DB;border:none;font-size:20px;padding:8px;color:white;border-radius:3px;' value='Confirm Answer'>
	</td>
	<td style='width:30%;'>
	<a href='inccursor.php' style='text-decoration:none;'><font style='background:#3498DB;border:none;font-size:20px;padding:8px;color:white;'>Next Question<font/></a>
	</td>
	</tr>
	</table>
	</form>
	</div>
	<!-- -------------------------------------------------------------------------------------------------- -->
	";
}

echo "
<!-- ----------------------------- NAV --------------------------------------------------- -->
<ul style='position:absolute;position:absolute;top:90%;'>";

for($x=1;$x<=$qnCount;$x++)
{
	$temp = "," . $x .",";
	if(stristr($answered,$temp) == FALSE)
	{
		$listOptions = $listOptions . "<li style='background:#2ECC71;'>$x</li>";
	}
	else
	{
		$listOptions = $listOptions . "<li style='background:#E74C3C;'>$x</li>";
	}	
}
echo "
$listOptions
<br>
<li style='background:#2ECC71'>
<form action='jumper.php' method='post'>
<input name='targ' type='number' max='$qnCount' min='1' required>
<input type='submit' style='background:#3498DB;color:white;border:none;font-size:18px;' value='Go To Question'>
</form>
</li>
</ul>
<!-- -------------------------------------------------------------------------------------------------- -->
	</body>
	</html>
	";
}
else
{
	echo "
		<img src='pics/gover.jpg' style='position:absolute;top:0px;left:0px;width:100%;height:100%;'>
	";
}
?>