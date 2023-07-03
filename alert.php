<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'sendmail/phpmailer/src/Exception.php';
require 'sendmail/phpmailer/src/PHPMailer.php';
require 'sendmail/phpmailer/src/SMTP.php';

session_start();

if ($_GET['id'] && $_GET['email']) {

	require("dbconn.php");

	$id = $_GET['id'];
	$patientemail = $_GET['email'];

    $sql = "SELECT `PatientName` from prescription where `id`='$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $patientname = $row['PatientName'];

	mysqli_query($con, "UPDATE `prescription` SET `Alerted`='Yes' WHERE `id`='$id'");

    $mail = new PHPMailer(true);

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'robitolitolito@gmail.com';                     //SMTP username
    $mail->Password   = 'cuwpeglwaxikpvwc';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465; 
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);

    $mail->addAddress($patientemail);
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Drug Prescription';
    $mail->Body    = 'Dear, ' . $patientname .'<br><br>'. 'Kindly note that your prescription is ready.'.'<br><br>'.'Best regards';
    $mail->send();

    echo 
    "
    <script>
    alert('Sent Successfully');
    </script>";
    
    ?>
    <script>
    alert('Prescription added successfully');
    window.location.href = "prescription.php";
    </script>
	<?php
	
}
else {
    header("Location: prescription.php");
}
