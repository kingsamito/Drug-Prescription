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
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <div id="menucontainer" style="background: white;height: 100%;position: fixed;padding: 20px;margin-right: 20px;">
            <i  class="fa fa-bars" onclick="showMenu()"></i>
        </div>
        <nav id="nav">
            <ul>
                <li class="logo"><a href="#" class="dash">
                        <span class="nav-item">Dashboard</span>
                        <i  style="" class="fa fa-bars" onclick="closeMenu()"></i>
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
                <li>
                    <?php
                    if($_SESSION['email'] == "doc@gmail.com"){
                        $contact = "phar@gmail.com";
                        $text = "Pharmacy";
                    }elseif($_SESSION['email'] == "phar@gmail.com"){
                        $contact = "doc@gmail.com";
                        $text = "Doctor";
                    }else {
                        $contact = "";
                    }
                    ?>
                    <a href="chatbox/index.php?contact=<?php echo $contact ?>" class="dash">
                        <i class="fa fa-comments"></i>
                        <span class="nav-item">Contact the <?php echo $text ?> </span>
                    </a></li>
                <li><a href="logout.php" class="logout">
                        <i class="fa fa-sign-out"></i>
                        <span class="nav-item">Logout</span>
                    </a></li>
            </ul>
        </nav>


        <section class="main" id="main">

            <?php
            $pat = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `patient`"));
            $pre = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `prescription`"));
            $com = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `complaints`"));
            ?>
            <div class="main-top">
                <h1>Hi, <?php echo $_SESSION['name']; ?></h1>

            </div>

            <div class="main-skills">
                <div class="card">
                    <i class="fa fa-user-o"></i>
                    <h3>Patient</h3>
                    <h3 style="width:280px;margin: auto;"><?php echo $pat ?></h3>
                </div>



                <div class="card">
                    <i class="fa fa-user-o"></i>
                    <h3>Prescription</h3>
                    <h3 style="width:280px;margin: auto;"><?php echo $pre ?></h3>
                </div>


                <div class="card">
                    <i class="fa fa-user-o"></i>
                    <h3>Complaint</h3>
                    <h3 style="width:280px;margin: auto;"><?php echo $com ?></h3>
                </div>
            </div>


        </section>
    </div>

    <script>
        function showMenu(){
            document.getElementById("nav").style.display="block";
            document.getElementById("nav").style.position="absolute";
            document.getElementById("nav").style.zIndex="100";
            document.getElementById("menucontainer").style.display="none";
            document.getElementById("main").style.marginLeft="-20px";
        }
        function closeMenu(){
            document.getElementById("nav").style.display="none";
            document.getElementById("menucontainer").style.display="block";
            document.getElementById("main").style.marginLeft="40px";
        }
    </script>
</body>

</html>