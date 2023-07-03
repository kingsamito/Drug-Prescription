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
        <div id="menucontainer" style="background: white;height: 100%;position: fixed;padding: 20px;margin-right: 20px;">
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </div>
        <nav id="nav">
            <ul>
                <li class="logo"><a href="#" class="dash">
                        <span class="nav-item">Dashboard</span>
                        <i style="" class="fa fa-bars" onclick="closeMenu()"></i>
                    </a></li>
                <li><a href="dashboard.php" class="dash">
                        <i class="fa fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a></li>
                <li><a href="patient.php" class="dash">
                        <i class="fa fa-user-o"></i>
                        <span class="nav-item">Patient</span>
                    </a></li>
                <li><a href="prescription.php" class="dash">
                        <i class="fa fa-paper-plane-o"></i>
                        <span class="nav-item">Prescription</span>
                    </a></li>
                <li><a href="complaint.php" class="dash">
                        <i class="fa fa-book"></i>
                        <span class="nav-item">Complain</span>
                    </a></li>
                <li><a href="logout.php" class="logout">
                        <i class="fa fa-sign-out"></i>
                        <span class="nav-item">Logout</span>
                    </a></li>
            </ul>
        </nav>


        <section class="main" id="main">
            <div class="main-top">
                <h1>Hi, <?php echo $_SESSION['name']; ?></h1>

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
            <div style="overflow-x:auto;">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Patient Name</th>
                        <th>Patient Email</th>
                        <th>Drug Name</th>
                        <th>Patient Complaint</th>
                        <th>Dosage</th>
                        <th>Taken When</th>
                        <th>Days</th>
                        <th>Action</th>
                    </tr>


                    <?php
                    $query = "SELECT * FROM `prescription`";
                    $result = mysqli_query($con, $query);
                    $pre = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `prescription`"));
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $patientname = $row['PatientName'];
                        $patientemail = $row['PatientEmail'];
                        $drugname = $row['DrugName'];
                        $patientcomplaint = $row['PatientComplaint'];
                        $dosage = $row['Dosage'];
                        $takewhen = $row['TakeWhen'];
                        $days = $row['Days'];
                        $alerted = $row['Alerted']
                    ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $patientname ?></td>
                            <td><?php echo $patientemail ?></td>
                            <td><?php echo $drugname ?></td>
                            <td><?php echo $patientcomplaint ?></td>
                            <td><?php echo $dosage ?></td>
                            <td><?php echo $takewhen ?></td>
                            <td><?php echo $days ?></td>
                            <td style="display: flex;gap:10px">
                                <button style="padding:8px;border:none; border-radius:7px; box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);background-color:green;"><a href="editprescription.php?from=prescription&id=<?php echo $id ?>" style="width: auto;color:white">Edit</a></button>
                                <button style="padding:8px;border:none; border-radius:7px; box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);background-color:red;"><a href="delete.php?from=prescription&id=<?php echo $id ?>" style="width: auto;color:white">Delete</a></button>
                                <?php
                                if ($_SESSION['role'] !== 'Doctor') {
                                ?>
                                    <?php
                                    if ($alerted == '') {
                                        echo '<button style="padding:8px;border:none; border-radius:7px; box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);background-color:yellowgreen;"><a style="width: auto;color:white" href="alert.php?email=' . $patientemail . '&id=' . $id . '">Alert</a></button>';
                                    } else {
                                        echo '<button style="padding:8px;border:none; border-radius:7px; box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);background-color:#ccc;">Alerted</button>';
                                    }
                                    ?>
                            </td>

            </div>
        <?php
                                }
        ?>

        </tr>
    <?php
                    }
    ?>
    </table>
    </div>


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

    <script>
        function showMenu() {
            document.getElementById("nav").style.display = "block";
            document.getElementById("nav").style.position = "absolute";
            document.getElementById("nav").style.zIndex = "100";
            document.getElementById("menucontainer").style.display = "none";
            document.getElementById("main").style.marginLeft = "-20px";
        }

        function closeMenu() {
            document.getElementById("nav").style.display = "none";
            document.getElementById("menucontainer").style.display = "block";
            document.getElementById("main").style.marginLeft = "40px";
        }
    </script>
</body>

</html>