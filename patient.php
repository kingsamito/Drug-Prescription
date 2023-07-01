<?php
require("dbconn.php");
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
}

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
        .history-table tr:nth-child(even) {
            background: transparent;
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
        <div id="menucontainer" style="background: white;height: 100%;position: fixed;padding: 20px;margin-right: 20px;">
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </div>
        <nav id="nav">
            <ul>
                <li class="logo"><a href="#" class="dash">
                        <span class="nav-item">Dashboard</span>
                        <i style="" class="fa fa-bars" onclick="closeMenu()"></i>
                    </a></li>
                <li><a href="#" class="dash">
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
            <?php
            if (isset($_POST['view'])) {
            ?>
                <div class="history-table-container" id="history">
                    <div style="width: 100px;margin-left: auto; text-align:center">
                        <h3 style="background-color:lightblue; padding:10px" onclick="display()">Close</h3>
                    </div>
                    <table class="history-table">
                        <tr>
                            <th colspan="2" style="text-align: center;">
                                <h1>Date&Time</h1>
                            </th>
                        </tr>
                        <?php
                        $email = $_GET['email'];
                        $query = "SELECT `id`,`date` FROM `prescription` where `PatientEmail` ='$email'";
                        $result = mysqli_query($con, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $date = $row['date'];
                            $newid = $row['id'];

                        ?>


                            <tr>
                                <td>
                                    <button style="padding: 5px;background: transparent;">
                                        <a href="patientrecord.php?email=<?php echo $email; ?>&id=<?php echo $newid; ?>">
                                            <h2><?php echo $date; ?></h2>
                                        </a>
                                    </button>

                                </td>
                                <td>
                                    <button style="padding:8px;border:none; border-radius:7px; box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);background-color:red;"><a href="delete.php?from=prescription&location=patient&id=<?php echo $newid ?>" style="width: auto;color:white">Delete</a></button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </table>



                </div>
            <?php
            }
            ?>
            <div class="main-top">
                <h1>Hi, <?php echo $_SESSION['user']; ?></h1>

            </div>

            <?php
            if ($_SESSION['role'] === "Doctor") {
                echo '<div class="prescribe" style="padding-left:0;text-align:left">
                <button onclick="openPopup()"><a style="width:auto" href="add.php">New Patient</a></button>
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
                        <th>Action</th>

                    </tr>

                    <!--firstcoloumn--><!--firstcoloumn--><!--firstcoloumn-->

                    <?php
                    $query = "SELECT * FROM `patient`";
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
                            <td><?php echo $id ?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $email ?></td>
                            <td style="display: flex;gap:10px">
                                <form action="patient.php?email=<?php echo $email ?>" method="post"><button name="view" onclick="display()" style="padding:8px;border:none; border-radius:7px; box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);background-color:yellowgreen;color:white"><a onclick="display()" style="width: auto;color:white">View</a></button></form>
                                <button style="padding:8px;border:none; border-radius:7px; box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);background-color:green;"><a href="edit.php?from=patient&id=<?php echo $id ?>" style="width: auto;color:white">Edit</a></button>
                                <button style="padding:8px;border:none; border-radius:7px; box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);background-color:red;"><a href="delete.php?from=patient&id=<?php echo $id ?>" style="width: auto;color:white">Delete</a></button>
                            </td>

                        <?php
                    }
                        ?>

            </div>


        </section>

        <script>
            function display() {
                window.location.href = "patient.php";
            }
        </script>

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