<?php
require("dbconn.php");
$from = $_GET['from'];
    $id = $_GET['id'];

    $query = "SELECT * FROM `patient` WHERE id=$id";
    $result = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($result);
        $name = $row['Name'];
        $email = $row['Email'];

if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "UPDATE `patient` SET `Name`='$name',`Email`='$email' WHERE `id` = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
?>
        <script>
            alert("Record Updated successfully");
            window.location.href = "patient.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("An error occured");
            history.back();
        </script>
<?php
    }
}
?>


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
            <h1 id="title">Update Patient</h1>
            <form method="post" action="">
                <div class="input-group">

                    <div class="input-field">
                        <i class="fa fa-envelope"></i>
                        <input type="text" placeholder="Patient Name" name="name" value="<?php echo $name; ?>" required>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-envelope"></i>
                        <input type="Email" placeholder="Patient Email" name="email" value="<?php echo $email; ?>" required>
                    </div>

                    <button type="submit" class="submit" name="submit">Submit</button><br /><br />

                </div>

            </form>
        </div>
    </div>

</body>



</html>