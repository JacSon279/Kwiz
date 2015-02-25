<?php
echo "
<html>
<head>
<style>
table {
	font-size:20px;
}
</style>
</head>
<body>
<a href='adminhome.php' style='float:right;'><< Back To Main Settings</a>
";
$usrCount = file_get_contents('users/userCount.txt');
$qnCount = file_get_contents('questions/qnCount.txt');
$correctAns = 0;
for($x=1; $x<=$usrCount; $x++)
{
	
	$pname = file_get_contents("users/$x/playerName.txt");
	echo "
	<table border='1' cellspacing='0'>
	<tr>
	<td colspan='$qnCount'>Player Name : $pname
	</td>
	</tr>
	<tr>
	";
	for($y=1; $y<=$qnCount; $y++)
	{
		echo "
		<td>
		Qn. $y
		</td>
		";
	}
	
	echo "</tr><tr>";


	for($z=1; $z<=$qnCount; $z++)
	{
		$nowAns = file_get_contents("questions/$z/ANSWER.txt");
		$menuFile = file("users/$x/marks.txt");
		$line_count = count($menuFile);
		for($s = 0; $s<=$line_count; $s++)
		{
			$ticket = $menuFile[$s];
			$ticket = explode("-->","$ticket");
			//echo "$ticket[1]<br>";
			if($ticket[0] == $z)
			{
				$givenAns = $ticket[1];
				$givenAns = trim($givenAns);
				if(strcmp($givenAns,$nowAns) == 0)
				{
					$correctAns = $correctAns + 1;
					echo "<td><img src='pics/right.png' style='width:20px;height:20px;'></td>";
				}
				else
				{
					echo "<td><img src='pics/wrong.png' style='width:20px;height:20px;'></td>";
				}
			}
		}	
	}
	
	echo "
	</tr>
	<tr>
	<td colspan='$qnCount'>
	<font style='font-weight:bold;color:blue;'>Number of Correct Answers : $correctAns </font>
	</td>
	</tr>
	</table>
	<br>
	<br>
	";
	$correctAns = 0;
	

}
	echo "
	</body>
	</html>
	";
?>