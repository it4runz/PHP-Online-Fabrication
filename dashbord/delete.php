<?php
session_start();
if (!isset($_SESSION['email'])) {
	header("location: ../");
}else if ($_SESSION['email'] != "admin@admin.com") {
	header("location: ../");
}else{
	include '../conn.php';
}

if (empty($_GET['id'])) {
	header("location: update.php");
}
$id = $_GET['id'];
//check if product is exist or not

$sql = "SELECT * FROM `item_info` WHERE `item_no` = '$id' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) < 1) {
	header("location: update.php");
}

$sql = "DELETE FROM `item_info` WHERE `item_no` = '$id'";
$result = mysqli_query($conn, $sql);

header("location: update.php");

?>