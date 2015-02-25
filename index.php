<?php
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
	}
	
	ul li:hover {
	background:#E74C3C;
	}	
	
	a {
	text-decoration:none;
	}
	
	#butt {
		background:#2C3E50;
		color:white;
	}
	#butt:hover {
		background:#34495E;
		color:white;
	}	
</style>
</head>
<body>
<!-- ----------------------------- BACKGROUND IMAGE --------------------------------------------------- -->
<img src='pics/bg.jpg' width='100%' height='100%' style='position:absolute;top:0px;left:0px;'>
<!-- -------------------------------------------------------------------------------------------------- -->

<!-- ----------------------------- HEADER DIV --------------------------------------------------- -->
<div style='position:absolute;top:0px;left:0px;background:#34495E;width:100%;height:18%;'></div>
<!-- -------------------------------------------------------------------------------------------------- -->

<!-- ----------------------------- LOGO --------------------------------------------------- -->
<img src='pics/kwiz.png' width='7%' height='14%' style='position:absolute;top:2%;left:20%;'>
<!-- -------------------------------------------------------------------------------------------------- -->

<!-- ----------------------------- HEAD LINE --------------------------------------------------- -->
<font style='font-family:calibri;position:absolute;top:2%;right:30%;font-size:60px;font-weight:bold;color:white;'>Welcome To Kwiz
</font>
<!-- -------------------------------------------------------------------------------------------------- -->

<!-- ----------------------------- NAV --------------------------------------------------- -->
	<ul style='position:absolute;top:4%;right:5%;'>
	<a href='http://www.jaxon.gq'><li>About Me</li></a>
	</ul>
<!-- -------------------------------------------------------------------------------------------------- -->

<!-- ----------------------------- FOOTER DIV --------------------------------------------------- -->
<div style='position:absolute;bottom:9px;left:0px;background:#ECF0F1;width:100%;height:5%;'>
<font style='font-family:calibri;font-size:25px;font-weight:bold;color:#2C3E50;float:right;'>Made with Love and coffee By Jackson.N &#160 &#160 &#160 &#160 
</font>
</div>
<!-- -------------------------------------------------------------------------------------------------- -->


<!-- ----------------------------- LOGIN DIV --------------------------------------------------- -->
<img src='pics/loginpc.png' width='40%' height='60%' style='position:absolute;bottom:43px;right:10%;'>
<form action='logproc.php' method='post'>
<input type='text' name='usr' style='position:absolute;bottom:350px;right:18%;font-size:20px;width:250px;' autofocus tabindex='1' placeholder='Player NAme'>
<input type='text' name='pass' style='position:absolute;bottom:300px;right:18%;font-size:20px;width:250px;' tabindex='2' placeholder='Game Password'>
<input id='butt' type='submit' style='position:absolute;bottom:230px;right:18%;font-size:20px;width:250px;height:40px;border:none;' value='Lets Begin'>
</form>
<!-- -------------------------------------------------------------------------------------------------- -->
</body>
</html>
";

?>