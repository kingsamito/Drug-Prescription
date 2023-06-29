<?php
session_start();
if (isset($_POST['submit'])) {

	require("../dbconn.php");

	$username = $_POST['user'];
	$email = $_POST['email'];
	$who = $_POST['who'];
	$complaint = $_POST['complaint'];
	$msg = "Hello " . $who.'<br>'.$complaint;

	if ($email !== 'doc@gmail.com') {
		$_SESSION['user'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['who'] = $who;
	}

	mysqli_query($con, "INSERT INTO logs(username, email, to_whom, msg) VALUES('$username','$email','$who', '$msg')");
	header("location: index.php?username=$username");
}
