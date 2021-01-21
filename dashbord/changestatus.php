<?php
$id = $_GET['id'];
include "../conn.php";
$sql = "SELECT `status` FROM `request` WHERE id = '$id'";
$result = mysqli_query($conn ,$sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		if ($row['status'] != "pending") {
			die("Unable to Fatch Request Data please try again");
		}else{
			$query = "UPDATE `request` SET `status` = '' WHERE `id` = '$id'";
			$update = mysqli_query($conn ,$query);
			header("location: ../");
		}
	}
}
