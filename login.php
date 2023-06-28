<?php
session_start();
$user = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password'];

require("dbconn.php");


$result = mysqli_query($con, "SELECT * FROM `users` WHERE `Role` ='$user' and Email='$email' and Password='$password'");
if(mysqli_num_rows($result)){
	$res = mysqli_fetch_array($result);
	$_SESSION['user'] = $res['Role'];
	$_SESSION['role'] = $res['Role'];
	$_SESSION['name'] = $res['Name'];
	$_SESSION['email'] = $res['Email'];
	header("Location: dashboard.php");
}else{
	?>
	<script>
		alert("No username found !")
	</script>
	<?php
	header("location: index.php?message=$message");
	}
?>