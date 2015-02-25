<?php
$targ = $_POST['targ'];
setcookie("cursor", "$targ", time()+3600*12);
header('location:arena.php');
?>