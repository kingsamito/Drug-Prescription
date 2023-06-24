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
            </ul>
        </nav>


        <section class="main">
            <div class="main-top">
                <h1>Hi, <?php echo $_SESSION['user']; ?></h1>
                <i class="fa fa-user"></i>
            </div>

            <!--Table for patient-->

            <div class="tale-box">
                <div class="table-row table-head">
                    <div class="table-cell">
                        <p>ID</p>
                    </div>

                    <div class="table-cell">
                        <p>Patient Name</p>
                    </div>

                    <div class="table-cell">
                        <p>Email</p>
                    </div>

                </div>
            </div>

            <!--firstcoloumn--><!--firstcoloumn--><!--firstcoloumn-->

            <?php
            $query = "SELECT * FROM `patient`";
            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['Name'];
                $email = $row['Email'];
            ?>
                <div class="tale-box">
                    <div class="table-row">
                        <div class="table-cell">
                            <p><?php echo $id; ?></p>
                        </div>

                        <div class="table-cell">
                            <p><?php echo $name; ?></p>
                        </div>

                        <div class="table-cell">
                            <p><?php echo $email; ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            
        </section>
    </div>
</body>

</html>