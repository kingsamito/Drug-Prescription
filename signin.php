<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <title> Log in / Sign up</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1 id="title">Sign In</h1>
            <form method="post" action="login.php">
                <div class="input-group">
                    <!-- <div class="input-field" id="nameField">
                        <i class="fa fa-user-o"></i>
                        <input type="text" placeholder="Name">
                    </div> -->

                    <div class="input-field">
                        <i class="fa fa-user-md"></i>
                        <select name="user" id="" required>
                            <option value="#">Select</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Pharmacy">Pharmacy</option>
                          </select>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-envelope"></i>
                        <input type="Email" placeholder="Email" name="email" required>
                    </div>

                    <div class="input-field">
                        <i class="fa fa-unlock-alt"></i>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>

                    <!--SUBMIT BUTTON-->

                    <button type="submit" class="submit">Submit</button><br/><br/>
                    <!--<p>Lost Password <a href="#">Click Here!</a></p>-->
                    
                </div>
                <!-- <br/>
                <div class="btn-field">
                    <button type="button" id="signupBtn">Sign up</button>
                    <button type="button" id="signinBtn" class="disable">Sign in</button>
                </div> -->
            </form>
        </div>
    </div>
    
</body>


<script>
    let signupBtn = document.getElementById("signupBtn");
    let signinBtn = document.getElementById("signinBtn");
    let nameField = document.getElementById("nameField");
    let title = document.getElementById("title");


    signinBtn.onclick = function(){
        nameField.style.maxHeight = "0";
        title.innerHTML = "Sign In";
        signupBtn.classList.add("disable");
        signinBtn.classList.remove("disable");
    }


    signupBtn.onclick = function(){
        nameField.style.maxHeight = "90px";
        title.innerHTML = "Sign Up";
        signupBtn.classList.remove("disable");
        signinBtn.classList.add("disable");
    }
</script>
</html>