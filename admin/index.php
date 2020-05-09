<?php

	if (!isset($_SESSION["admin"])){
		header('refresh:0; login.php');
	}

?>