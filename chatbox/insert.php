<?php
session_start();

$username = $_SESSION['user'];
$email = $_SESSION['email'];
$msg = $_REQUEST['msg'];
$who = $_SESSION['who'];


require("../dbconn.php");

mysqli_query($con, "INSERT INTO logs(username, email, to_whom, msg) VALUES('$username','$email','$who', '$msg')");

if ($email == 'phar@gmail.com') {
	$result = mysqli_query($con, "SELECT * FROM logs where (email = '$who' and (to_whom='Pharmacy' or to_whom='$email')) or (email = '$email' and to_whom='$who') ORDER BY id DESC LIMIT 0, 10");
	while ($row = mysqli_fetch_array($result)) {
		echo "<span class='uname'>" . $row['username'] . "</span>: <span class='msg'>" . $row['msg'] . "</span></br></br>";
	}
	mysqli_close($con);
} elseif ($email == 'doc@gmail.com') {
	$result = mysqli_query($con, "SELECT * FROM logs where (email = '$who' and (to_whom='Doctor' or to_whom='$email')) or (email = '$email' and to_whom='$who') ORDER BY id DESC LIMIT 0, 10");
	while ($row = mysqli_fetch_array($result)) {

		echo "<span class='uname'>" . $row['username'] . "</span>: <span class='msg'>" . $row['msg'] . "</span></br></br>";
	}
	mysqli_close($con);
} else {
	$result = mysqli_query($con, "SELECT * FROM logs where email = '$email' or to_whom = '$email' ORDER BY id DESC LIMIT 0, 10");
	while ($row = mysqli_fetch_array($result)) {

		echo "<span class='uname'>" . $row['username'] . "</span>: <span class='msg'>" . $row['msg'] . "</span></br></br>";
	}
	mysqli_close($con);
}
