<?php
session_start();
require("../dbconn.php");

$email = $_SESSION['email'];
$who = $_SESSION['who'];

if ($email !== 'doc@gmail.com') {
	$result = mysqli_query($con, "SELECT * FROM logs where email = '$email' or to_whom = '$email' ORDER BY id DESC LIMIT 0, 10");
	while ($row = mysqli_fetch_array($result)) {

		echo "<span class='uname'>" . $row['username'] . "</span>: <span class='msg'>" . $row['msg'] . "</span></br></br>";
	}
	mysqli_close($con);
} else {
	$result = mysqli_query($con, "SELECT * FROM logs where (email = '$who' and to_whom='Doctor') or (email = '$email' and to_whom='$who') ORDER BY id DESC LIMIT 0, 10");
	while ($row = mysqli_fetch_array($result)) {

		echo "<span class='uname'>" . $row['username'] . "</span>: <span class='msg'>" . $row['msg'] . "</span></br></br>";
	}
	mysqli_close($con);
}
