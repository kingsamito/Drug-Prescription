<?php
session_start();
	if($_SESSION['email'] !== "doc@gmail.com") {
		session_destroy();
	header("location: index.php");
	}else {
		unset($_SESSION["who"]);
		header("location: ../complaint.php");
	}
	
?>