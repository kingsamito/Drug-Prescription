<?php
	session_start();
	
	session_destroy();
	$user = $_SESSION['email'];
	header("location: index.php");
?>