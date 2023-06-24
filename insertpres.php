<?php
session_start();

if (isset($_POST['submit'])) {

	require("dbconn.php");

	$patientname = $_POST['patientname'];
	$patientemail = $_POST['patientemail'];
	$drugname = $_POST['drugname'];
	$dosage = $_POST['dosage'];
	$takewhen = $_POST['takewhen'];
	$days = $_POST['days'];
	

	mysqli_query($con, "INSERT INTO `prescription`(`PatientName`, `PatientEmail`, `DrugName`, `Dosage`, `TakeWhen`, `Days`) VALUES ('$patientname','$patientemail','$drugname','$dosage','$takewhen','$days')");
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
