<?php
			setcookie("user", "", time()+60*$maxPlayTime);
			setcookie("validity", "", time()+3600*12);
			setcookie("cursor", "", time()+3600*12);
			setcookie("answered", "", time()+3600*12);
?>