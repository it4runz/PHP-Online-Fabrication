<?php
session_start();
if(!isset($_SESSION["email"])){
    header("location: ../index.html");
}
if($_SESSION["email"] != "admin@admin.com"){
    header("location: ../home/index.html");   
}

include '../conn.php';
?>
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Registration :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="reg-w3">
<div class="w3layouts-main">
	<h2>Add New Product</h2>
		<form action="" method="post">
			<input type="text" class="ggg" name="name" placeholder="PRODUCT NAME" required="">
			<input type="text" class="ggg" name="desc" placeholder="PRODUCT DESCRIPTION" required="" style="height: 100px">
			<input type="text" class="ggg" name="rate" placeholder="CURRENT RATE" required="">
			<input type="text" class="ggg" name="qty" placeholder="QTY. OF ITEM" required="">
			<input type="text" class="ggg" name="filename" placeholder="FILE NAME" required="">
			<input type="text" class="ggg" name="category" placeholder="CATEGORY" required="">
			<input type="file"  class="ggg btn" name="category" placeholder="CATEGORY" required="">
				<input type="submit" value="submit" name="submit">
		</form>
		<div class="clearfix"></div>
		<a href="../">  back</a>
		
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script>
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$desc = $_POST['desc'];
	$rate = (int)$_POST['rate'];
	$file = $_POST['filename'];
	$no = rand(111,999);
	$category = $_POST['category'];
	$qty = $_POST['qty'];

$sql = "INSERT INTO `item_info` VALUES('$no', '$name', '$file', '$desc', '0', '$rate', '$qty', '$category')";
	if(mysqli_query($conn, $sql)){
		echo '<script type="text/javascript">
            window.alert("One Iteam Added..!!");
          </script>';
          exit(); 
	}
}

?>