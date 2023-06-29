<?php
require("dbconn.php");
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
}

$email = $_GET['email'];
$id = $_GET['id'];
$query = "SELECT * FROM `prescription` where `id` ='$id'";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($result);
$drugname = $row['DrugName'];
$patientcomplaint = $row['PatientComplaint'];
$dosage = $row['Dosage'];
$takewhen = $row['TakeWhen'];
$days = $row['Days'];
$alerted = $row['Alerted'];
$date = $row['Date']

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Patients</title>
    <style>
        .heading {
            margin-bottom: 70px;
        }

        i {
            opacity: 0;
        }

        .heading th {
            border: none;
            text-align: right;
            padding: 3px;
        }

        .heading td {
            border: none;
            text-align: left;
            padding: 3px;
        }

        .history-table-container {
            background-color: white;
            background: white;
            padding: 50px;
            position: absolute;
            top: 0;
            z-index: 100;
        }

        @media screen and (min-width:768px) {
            .history-table-container {
                top: 9%;
                right: 50px;
                z-index: 100;
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li class="logo"><a href="#">
                        <span class="nav-item"></span>
                    </a></li>
                <li>
                    <i class="fa fa-home"></i>
                    <h3 class="nav-items">Complaint</h3>
                    <p class="nav-items"><?php echo $patientcomplaint; ?></p>
                </li>
                <li>
                    <i class="fa fa-home"></i>
                    <h3 class="nav-items">Other Prescription</h3>
                    <?php
                    $query1 = "SELECT `DrugName` FROM `prescription` WHERE `Date` < '$date'";
                    $result1 = mysqli_query($con, $query1);
                    if (!$result1) {
                        echo '<p class="nav-items">Null</p>';
                    } else {
                        if (mysqli_num_rows($result1) < 1) {
                            echo '<p class="nav-items">Null</p>';
                        } else {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                $drug = $row1['DrugName'];
                                echo '<p class="nav-items">' . $drug . '</p>';
                            }
                        }
                    }
                    ?>

                </li>
                <li>
            </ul>
        </nav>


        <section class="main">

            <div style="overflow-x:auto;" class="heading">
                <table>

                    <!--firstcoloumn--><!--firstcoloumn--><!--firstcoloumn-->

                    <?php
                    $query = "SELECT * FROM `patient` where `email` = '$email'";
                    $result = mysqli_query($con, $query);
                    if (mysqli_num_rows($result) == 0) {
                        echo "<tr><td>No Patient Records Found</td></tr>";
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['Name'];
                        $email = $row['Email'];
                    ?>
                        <tr>
                            <th>ID:</th>
                            <td><?php echo $id ?></td>
                            <th>Patient Name:</th>
                            <td><?php echo $name ?></td>
                            <th>Patient Email:</th>
                            <td><?php echo $email ?></td>

                        <?php
                    }
                        ?>
                </table>
            </div>

            <div style="overflow-x:auto;">
                <table>
                    <tr>
                        <th>Drug Name</th>
                        <th>Patient Complaint</th>
                        <th>Dosage</th>
                        <th>Taken When</th>
                        <th>Days</th>
                    </tr>

                    <tr>

                        <td><?php echo $drugname ?></td>
                        <td><?php echo $patientcomplaint ?></td>
                        <td><?php echo $dosage ?></td>
                        <td><?php echo $takewhen ?></td>
                        <td><?php echo $days ?></td>

                    </tr>

                </table>
            </div>

        </section>


        <script>
            function display() {
                window.location.href = "patient.php";
            }
        </script>

</body>

</html>