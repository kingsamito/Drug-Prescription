<?php
require("dbconn.php");

$from = $_GET['from'];
$id = $_GET['id'];

$query = "DELETE FROM `$from` where id = $id";
$result = mysqli_query($con, $query);

if($result){
    ?>
    <script>
        alert("Record Deleted successfully");
        history.back();
    </script>
    <?php
}else {
    ?>
    <script>
        alert("An error occured");
        history.back();
    </script>
    <?php
}

    ?>