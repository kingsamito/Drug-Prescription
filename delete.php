<?php
require("dbconn.php");

$from = $_GET['from'];
$id = $_GET['id'];
$location = $_GET['location'];

$query = "DELETE FROM `$from` where id = $id";
$result = mysqli_query($con, $query);

if ($result) {
?>
    <script>
        alert("Record Deleted successfully");
        <?php
        if ($location == 'patient') {
            ?>
            window.location.href='patient.php'
            <?php
        }else {
            ?>
            window.location.href='prescription.php'
            <?php
        }
       ?>
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

?>