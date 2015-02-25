<?php
$x = $_POST['timex'];
file_put_contents('settings/maxPlayTime.txt',"$x");
header('location:adminhome.php');
?>	