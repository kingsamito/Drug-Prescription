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

    <!--Another Section-->

    <!--<section class="course">
        <h1>Services We Offer</h1>
        <p>We Offer wide range of services, from Consultation to Diagnosis, to Prescription, we are one stop shop tp helping you reach your best health</p>
    
        <div class="row">
            <div class="course-col">
                <h3>Consultation</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis explicabo nam
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis explicabo nam.</p>
            </div>

            <div class="course-col">
                <h3>Diagnosis</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis explicabo nam
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis explicabo nam.</p>
            </div>


            <div class="course-col">
                <h3>Prescription</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis explicabo nam
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis explicabo nam
                </p>
            </div>

        </div>
    
    </section>


        <section class="facilities">
            <h1>Our Branches</h1>
            <p>We are spread across various locations, find us now</p>
        

        <div class="row">
            <div class="facilities-col">
                <img src="img/war.jpg" alt="">
                <h3>World Class Pharmacy</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                    Sequi eligendi placeat asperiores, voluptas facilis modi.
                </p>
            </div>

            <div class="facilities-col">
                <img src="img/two.jpg" alt="">
                <h3>Best Doctors</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                    Sequi eligendi placeat asperiores, voluptas facilis modi.
                </p>
            </div>

            <div class="facilities-col">
                <img src="img/hand.jpg" alt="">
                <h3>All Prescriptions are available</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                    Sequi eligendi placeat asperiores, voluptas facilis modi.
                </p>
            </div>
        </div>
    </section>

        <section class="testimonials">
            <h1>What Our Customer Says</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Sequi eligendi placeat asperiores, voluptas facilis modi.
            </p>

            <div class="row">
                <div class="testimonial-col">
                    <img src="img/pic.jpg" alt="">
                    <div>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, quaerat!</p>
                        <h3>Oguntade Blessing</h3>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </div>

                <div class="testimonial-col">
                    <img src="img/picy.jpg" alt="">
                    <div>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, quaerat!</p>
                        <h3>David Jesutomi</h3>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                </div>


            </div>


        </section>-->

<!---Call to action-->
    <!--<section class="cta">
        <h1>Visit Our Branches All over the world</h1>
        <a href="contactpg.html" class="hero-btn">Contact us</a>
    </section>-->

<!---Footer-->
<!--<section class="footer">
    <h4>About us</h4>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et at ducimus magni amet molestiae <br/>aut harum natus magnam, minus assumenda!</p>   
    <div class="icons">
        <i class="fa fa-facebook"></i>
        <i class="fa fa-twitter"></i>
        <i class="fa fa-instagram"></i>
        <i class="fa fa-linkedin"></i>
    </div>
    <p>Made with <i class="fa fa-heart-o"></i> by ------</p>
</section>-->


    <!---javascript for the toggle part-->


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