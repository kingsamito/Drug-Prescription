<?php
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
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
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

            <!--<div class="main-skills">
                <div class="card">
                    <i class="fa fa-user-o"></i>
                    <h3>Patient</h3>
                    <p>check patient section for records</p>
                    <button><a href="patient.html">View</a></button>
                </div>-->
            <br /><br /><br />
            <div class="body">
                <div class="box">
                    <div class="text">
                        <p>New Prescription</p>
                    </div>

                    <form action="insertpres.php" method="POST">
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="patientname" required>
                                <div class="underline"></div>
                                <label for="">Patient Name</label>
                            </div>
                            <div class="input-data">
                                <input type="text" name="patientemail" required>
                                <div class="underline"></div>
                                <label for="">Patient Email</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="drugname" required>
                                <div class="underline"></div>
                                <label for="">Drug Name</label>
                            </div>
                            <div class="input-data">
                                <select name="dosage" id="" required>
                                    <option hidden>Dosage</option>
                                    <option value="1 - 1 - 1">1 - 1 - 1</option>
                                    <option value="1 - 0 - 1">1 - 0 - 1</option>
                                    <option value="0 - 1 - 0">0 - 1 - 0</option>
                                    <option value="0 - 0 - 1">0 - 0 - 1</option>
                                    <option value="2 - 0 - 2">2 - 0 - 2</option>
                                    <option value="0 - 0 - 2">0 - 0 - 2</option>
                                    <option value="2 - 2 - 2">2 - 2 - 2</option>
                                </select>
                                <div class="underline"></div>
                            </div>
                            <div class="input-data select">
                                <select name="takewhen" id="" required>
                                    <option value="Before Meal">Before Meal</option>
                                    <option value="After Meal">After Meal</option>
                                    <option value="Full Meal">Full Meal</option>
                                    <option value="Before 30 minutes on meal">Before 30 minutes on meal</option>
                                    <option value="After 30 minutes on meal">After 30 minutes on meal</option>
                                </select>
                                <div class="underline"></div>
                            </div>

                            <div class="input-data">
                                <input type="text" name="days" required>
                                <div class="underline"></div>
                                <label for="">Days</label>
                            </div>
                        </div>
                        <!--<div class="form-row">
                    <div class="input-data textarea">
                       <textarea rows="8" cols="80" required></textarea>
                       <br />
                       <div class="underline"></div>
                       <label for="">Write your message</label>
                       <br />-->
                        <div class="form-row submit-btn">
                            <div class="input-data">
                                <div class="inner"></div>
                                <input type="submit" name="submit" value="Prescribe">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>
    </div>
</body>

</html>