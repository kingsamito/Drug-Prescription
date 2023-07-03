<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'sendmail/phpmailer/src/Exception.php';
require 'sendmail/phpmailer/src/PHPMailer.php';
require 'sendmail/phpmailer/src/SMTP.php';

session_start();

if (isset($_POST['submit'])) {

	require("dbconn.php");

	$patientname = $_POST['patientname'];
	$patientemail = $_POST['patientemail'];
	$drugname = $_POST['drugname'];
	$patientcomplaint = $_POST['patientcomplaint'];
	$dosage = $_POST['dosage'];
	$takewhen = $_POST['takewhen'];
	$days = $_POST['days'];
	

	mysqli_query($con, "INSERT INTO `prescription`(`PatientName`, `PatientEmail`, `DrugName`, `PatientComplaint`, `Dosage`, `TakeWhen`, `Days`, `Alerted`) VALUES ('$patientname','$patientemail','$drugname','$patientcomplaint','$dosage','$takewhen','$days', '')");

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
    $mail->Body    = 'Dear, ' . $patientname .'<br><br>'. 'Kindly note that your prescription has been sent to the pharmacy. The pharmacist will reach out to you soon.'.'<br><br>'.'Best regards';
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
	
}else if (isset($_POST['edit'])) {

	require("dbconn.php");
    $id = $_POST['id'];
	$patientname = $_POST['patientname'];
	$patientemail = $_POST['patientemail'];
	$drugname = $_POST['drugname'];
	$patientcomplaint = $_POST['patientcomplaint'];
	$dosage = $_POST['dosage'];
	$takewhen = $_POST['takewhen'];
	$days = $_POST['days'];
	

	mysqli_query($con, "UPDATE `prescription` SET `PatientName`='$patientname',`PatientEmail`='$patientemail',`DrugName`='$drugname',`PatientComplaint`='$patientcomplaint',`Dosage`='$dosage',`TakeWhen`='$takewhen',`Days`, `Alerted`='$days', '' WHERE `id` = '$id'");

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
    $mail->Body    = 'Dear, ' . $patientname .'<br><br>'. 'Kindly note that your prescription has been sent to the pharmacy. The pharmacist will reach out to you soon.'.'<br><br>'.'Best regards';
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
