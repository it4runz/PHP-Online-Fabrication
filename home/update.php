<?php
session_start();
include '../conn.php';
$uid = $_SESSION['uid'];
if(isset($_POST['Update'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $sql = "UPDATE `pharmainfo` SET fname='$fname', lname='$lname', address='$address' WHERE `uid` = '$uid'";
    $result = mysqli_query($conn, $sql);
    echo '<script type="text/javascript">
        alert("You Have To login Again to Save Changes");
    </script>';
    session_destroy();


}

?>