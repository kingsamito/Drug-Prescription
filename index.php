<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Prescription System</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="header">
        <nav>
            <a href="index.html"><img src="img/ma.png" alt=""></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times-circle" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php" class="a">HOME<i class="fa fa-home"></i></a></li>
                    <li><a href="signin.php" class="a">LOG IN<i class="fa fa-sign-in"></i></a></li>
                    <li><a href="contactpg.html" class="a">CONTACT US</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>

        <div class="text-box">
            <h1>DRUG PRESCRIPTION SYSTEM</h1>
            <p>Health is the greatest possession. Contentment is the greatest treasure. Confidence is the greatest friend.</p>
            <a href="" class="hero-btn">Visit Us TO Know More</a>
        </div>

    </section>

    

    <script>

        var navLinks = document.getElementById("navLinks");

        function showMenu(){
            navLinks.style.right = "0";
        }

        function hideMenu(){
            navLinks.style.right = "-200px";
        }
    </script>

    
</body>
</html>