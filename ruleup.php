<?php
$x = $_POST['ruz'];
file_put_contents('rules.html',"$x");
header('location:adminhome.php');
?>	