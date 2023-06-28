<?php
require("dbconn.php");
session_start();
if (!isset($_SESSION['role']))
    header("Location: ../index.php")
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/prescription.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Prescription</title>
    <!-- <style>
        th,td {
            border:1px solid black;
            text-align:center;
        }
    </style> -->
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li class="logo"><a href="#">
                        <span class="nav-item">Dashboard</span>
                    </a></li>
                <li><a href="dashboard.php">
                        <i class="fa fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a></li>
                <li><a href="patient.php">
                        <i class="fa fa-user-o"></i>
                        <span class="nav-item">Patient</span>
                    </a></li>
                <li><a href="prescription.php">
                        <i class="fa fa-paper-plane-o"></i>
                        <span class="nav-item">Prescription</span>
                    </a></li>
                <li><a href="complaint.php">
                        <i class="fa fa-book"></i>
                        <span class="nav-item">Complain</span>
                    </a></li>
                <li><a href="logout.php" class="logout">
                        <i class="fa fa-sign-out"></i>
                        <span class="nav-item">Logout</span>
                    </a></li>
            </ul>
        </nav>


        <section class="main">
            <div class="main-top">
                <h1>Hi, <?php echo $_SESSION['name']; ?></h1>
                <i class="fa fa-user"></i>
            </div>

            <!-- please i need to put a condition here so only doctor can prescribe -->
            <?php
            if ($_SESSION['role'] === "Doctor") {
                echo '<div class="prescribe">
                <button onclick="openPopup()"><a href="newprescription.php">New Prescription</a></button>
            </div>';
            }
            ?>

            <!--Table for patient-->
            <!-- <table width="100%">
    <tr>
        <th>ID</th>
        <th>Patient Name</th>
        <th>Patient Email</th>
        <th>Drug Name</th>
        <th>Dosage</th>
        <th>Taken When</th>
        <th>Days</th>
    </tr>
    
 -->
            <div class="table-box">
                <div class="table-row table-head">
                    <div class="table-cell">
                        <p>ID</p>
                    </div>

                    <div class="table-cell">
                        <p>Patient Name</p>
                    </div>

                    <div class="table-cell">
                        <p>Patient Email</p>
                    </div>

                    <div class="table-cell">
                        <p>Drug Name</p>
                    </div>

                    <div class="table-cell">
                        <p>Dosage</p>
                    </div>

                    <div class="table-cell">
                        <p>Taken When</p>
                    </div>

                    <div class="table-cell">
                        <p>Days</p>
                    </div>
                    <div class="table-cell last-cell">
                        <p>Action</p>
                    </div>



                </div>
            </div>


            <?php
            $query = "SELECT * FROM `prescription`";
            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $patientname = $row['PatientName'];
                $patientemail = $row['PatientEmail'];
                $drugname = $row['DrugName'];
                $dosage = $row['Dosage'];
                $takewhen = $row['TakeWhen'];
                $days = $row['Days'];
                $alerted = $row['Alerted']
            ?>
                <!-- <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $patientname ?></td>
        <td><?php echo $patientemail ?></td>
        <td><?php echo $drugname ?></td>
        <td><?php echo $dosage ?></td>
        <td><?php echo $takewhen ?></td>
        <td><?php echo $days ?></td>
    </tr>
</table> -->
                <div class="tale-box">
                    <div class="table-row">
                        <div class="table-cell">
                            <p><?php echo $id ?></p>
                        </div>

                        <div class="table-cell">
                            <p><?php echo $patientname ?></p>
                        </div>

                        <div class="table-cell">
                            <p><?php echo $patientemail ?></p>
                        </div>
                        <div class="table-cell">
                            <p><?php echo $drugname ?></p>
                        </div>
                        <div class="table-cell">
                            <p><?php echo $dosage ?></p>
                        </div>
                        <div class="table-cell">
                            <p><?php echo $takewhen ?></p>
                        </div>

                        <?php
                        if($_SESSION['role'] === 'Doctor'){
                            ?>
                            <div class="table-cell last-cell">
                            <p><?php echo $days ?></p>
                            </div>
                        <?php
                        }else {
                            ?>
                            <div class="table-cell">
                            <p><?php echo $days ?></p>
                        </div>
                        <div class="table-cell last-cell">
                            <?php
                            if($alerted == '') {
                                echo '<button style="border:1px solid gray; border-radius:7px; box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);"><a style="width:auto" href="alert.php?email='.$patientemail.'&id='.$id.'">Alert</a></button>';
                            }else {
                               echo'<p>Alert</p>';
                            }
                            ?>
                            
                        </div>
                        <?php
                        }
                        ?>
                        

                    </div>
                </div>

            <?php
            }
            ?>
        </section>
    </div>




    <!--<script>
        let popup = document.getElementById("popup");
        function openPopup(){
            popup.classList.add("open-popup");
        }

        function closePopup(){
            popup.classList.remove("open-popup");
        }
    
    </script>-->
</body>

</html>