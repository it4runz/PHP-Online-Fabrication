<?php  
session_start();
if (!isset($_SESSION['email'])) {
	header("location: index.html");
}
include '../conn.php';	
$uid = $_SESSION['uid'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Request || Page</title>
		<style type="text/css">
			.badge-danger{
				color: white;
				font-style: italic;
				background-color: red !important;
			}

			.badge-success{
				color: white;
				font-style: italic;
				background-color: green !important;
			}
		</style>

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
			<h1>Requests</h1>
		</div>
		<div class="container">
			<div class="panel panel-defult">
				<div class="panel-body">
				<?php
					$sql = "SELECT * FROM `request` where status = 'pending' ";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($result)) {
						$img = $row['item_img'];
						$req_id = $row['id'];
						$item_no = $row['item_no'];
						$status = $row['status'];
						$cuid = $row['uid'];
					echo '
					<div class="row">
						<div class="col-md-2">
							<img src="../home/img/'.$img.'" width="150" height="150">
						</div>
						<div class="col-md-4">
							<h4>Customer No:- <b>'.$cuid.'</b> </h4>
							<h4>Request No:- <b>'.$req_id.'</b> </h4>
							<h4>Item No:- <b>'.$item_no.'</b> </h4>';

							if ($status == "pending") {
							echo '<h4>Request Statue:- <span class="badge badge-danger">Pending..!</span></h4>';
							echo '
							<a href="changestatus.php?id='.$req_id.'">
								Change To Completed
								<span class="glyphicon  glyphicon-ok"></span>
							</a>
							';
							echo '</div></div>';
							} 
											
					}
				?>
					

				</div>
			</div>
		</div>
	</div>

</body>
</html>