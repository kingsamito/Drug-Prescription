<?php
session_start();
if ($_SESSION['email'] == "doc@gmail.com") {
	unset($_SESSION["who"]);
	header("location: ../complaint.php");
} elseif ($_SESSION['email'] == "phar@gmail.com") {
	unset($_SESSION["who"]);
	header("location: ../complaint.php");
} else {
	session_destroy();
	header("location: index.php");
}
