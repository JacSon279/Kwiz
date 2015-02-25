<?php
$qnCount = file_get_contents('questions/qnCount.txt');
if($qnCount =='')
{	
	$qnCount = 0;
}
$curQn = $qnCount + 1;

$a = $_POST['qn'];
$b = $_POST['opn1'];
$c = $_POST['opn2'];
$d = $_POST['opn3'];
$e = $_POST['opn4'];
$f = $_POST['ans'];

$typ = $_POST['typ'];
if($typ == 'txt')
{
	mkdir("questions/$curQn/");
	file_put_contents("questions/$curQn/QUESTION.txt","$a");
	file_put_contents("questions/$curQn/OPTIONA.txt","$b");
	file_put_contents("questions/$curQn/OPTIONB.txt","$c");
	file_put_contents("questions/$curQn/OPTIONC.txt","$d");
	file_put_contents("questions/$curQn/OPTIOND.txt","$e");
	file_put_contents("questions/$curQn/ANSWER.txt","$f");
	file_put_contents('questions/qnCount.txt',"$curQn");
	header('location:addqnform.php');
}
else
{
	mkdir("questions/$curQn/");
	$allowedExts = array("jpg");
	$temp = explode(".", $_FILES["IMGX"]["name"]);
	$extension = end($temp);
	if ((($_FILES["IMGX"]["type"] == "image/jpeg")
	|| ($_FILES["IMGX"]["type"] == "image/jpg"))
	&& ($_FILES["IMGX"]["size"] < 8000000)
	&& in_array($extension, $allowedExts))
	  {
			  if ($_FILES["IMGX"]["error"] > 0)
				{
						echo "Return Code: " . $_FILES["IMGX"]["error"] . "<br>";
						rmdir("questions/$curQn/");
				}
			  else
				{					
				  move_uploaded_file($_FILES["IMGX"]["tmp_name"],
				  "questions/$curQn/" . $_FILES["IMGX"]["name"]);
				  $tempa = "questions/$curQn/" . $_FILES["IMGX"]["name"];
				  $tempb = "questions/$curQn/QUESTION." . $extension;
				  rename($tempa,$tempb);  
					file_put_contents("questions/$curQn/OPTIONA.txt","$b");
					file_put_contents("questions/$curQn/OPTIONB.txt","$c");
					file_put_contents("questions/$curQn/OPTIONC.txt","$d");
					file_put_contents("questions/$curQn/OPTIOND.txt","$e");
					file_put_contents("questions/$curQn/ANSWER.txt","$f");				  
					file_put_contents('questions/qnCount.txt',"$curQn");
					header('location:addqnform.php');
				}
	  }
	else
	  {
	  rmdir("questions/$curQn/");
	  echo "Invalid file ";
	  }

}
?>