<?php
session_start();
if (!isset($_SESSION['email'])) {
	header("location: ../");
}else if ($_SESSION['email'] != "admin@admin.com") {
	header("location: ../");
}else{
	include '../conn.php';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update Product</title>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="panel panel-info">
		<div class="panel-heading">
			<a href="../"><h4><</>Back</h4></a>
			<h1>Update Product</h1>
		</div>
		<div class="container">
			<div class="panel-body">
				<?php
				$sql = "SELECT * FROM `item_info` WHERE 1";
				$result = mysqli_query($conn ,$sql);
				while ($row = mysqli_fetch_assoc($result)) {
					 $img = $row['item_img'];
					 $item_no = $row['item_no'];
					 $item_name = $row['item_name'];
					echo '<div class="row">
					<div class="col-md-2 col-sm-12">
						<img src="../home/img/'.$img.'" width="150" height="150">
					</div>
					<div class="col-md-4">
						<h4>Item No :- '.$item_no.'</h4>
						<h3>Item Name :- '.$item_name.'</h3>
					</div>
					<div class="col-md-4">
						<a href="edit.php?id='.$item_no.'"><span class="glyphicon glyphicon-edit"></span> Edit</a>
						<a href="delete.php?id='.$item_no.'" style="color: red;"><span class="glyphicon glyphicon-warning-sign"></span> Delete</a>
					</div>
				</div>';
				}
				
				?>
			</div>
		</div>
	</div>
</body>
</html>
