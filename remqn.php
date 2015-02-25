<?php
$torem = $_POST['torem'];
if($torem != NULL)
{
	$curQn = $torem;
	@unlink("questions/$curQn/QUESTION.txt");
	@unlink("questions/$curQn/OPTIONA.txt");
	@unlink("questions/$curQn/OPTIONB.txt");
	@unlink("questions/$curQn/OPTIONC.txt");
	@unlink("questions/$curQn/OPTIOND.txt");
	@unlink("questions/$curQn/ANSWER.txt");
	@unlink("questions/$curQn/QUESTION.jpg");
	@rmdir("questions/$curQn/");
	$qnnos = file_get_contents('questions/qnCount.txt');
	$qnnos = $qnnos - 1;
	file_put_contents('questions/qnCount.txt',"$qnnos");
}


$qnCount = file_get_contents('questions/qnCount.txt');
echo "
<h1>Select Question No. to delete</h1>
<form action='remqn.php' method='post'>
<select name='torem'>";
for($x=1; $x<=$qnCount; $x++)
{
	echo "<option>$x</option>";
}
echo "
</select>
<input type='submit'>
</form>
<br>
<a href='adminhome.php'>Back To Main Page</a>
";


?>