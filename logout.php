<?php

setcookie("username","", time()+3600, "/","", 0);
			header("Location: index.php");

?>