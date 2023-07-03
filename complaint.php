<?php
require("dbconn.php");
session_start();
if (!isset($_SESSION['role'])) {
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
    <title>Complaint</title>
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

            <!--Table for patient-->
            <div style="overflow-x:auto;">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Patient Name</th>
                        <th>Patient Email</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $me = $_SESSION['role'];
                    $email = $_SESSION['email'];
                    $query = "SELECT * FROM `logs` WHERE to_whom = '$me' GROUP BY email";
                    $result = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['username'];
                        $email = $row['email'];
                    ?>

                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $email ?></td>
                            <td> <button style="padding:8px;border:1px solid gray; border-radius:7px; box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);"><a style="width:auto" href="./chatbox/index.php?patient=<?php echo $email; ?>">View</a></button>
                            </td>

                        </tr>
                    <?php
                    }
                    ?>
                </table>
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