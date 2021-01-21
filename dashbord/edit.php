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
//$_SESSION['updated'] = false;
//check if product is exist or not

$sql = "SELECT * FROM `item_info` WHERE `item_no` = '$id' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) < 1) {
	header("location: update.php");
}else{
	while ($row = mysqli_fetch_assoc($result)) {
		$item_name = $row['item_name'];
		$item_decp = $row['item_decp']; 
		$item_sp = $row['item_sp'];
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<style type="text/css">
		.center_div{
    margin: 0 auto;
    width:80% /* value of your choice which suits your alignment */
}
	</style>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<body>
	<div class="card bg-info text-white">
		<h1>Edit Product</h1>
	</div>
<div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <form class="col-6" action="" method="post">
      <div class="form-group">
        <label for="formGroupExampleInput">Product Name</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Product name" name="item_name" value="<?php echo $item_name; ?>">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Product Description</label>
        <textarea type="text" class="form-control" id="formGroupExampleInput" placeholder="Product Decription" name="item_decp" rows="10"><?php echo $item_decp; ?></textarea>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Product Price Rate</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Product Price Rate" name="item_sp" value="<?php echo $item_sp; ?>">
      </div>
      <div class="form-group">
        
        <input type="submit" class="btn btn-info"  name="submit">

      </div>
<?php

if (isset($_POST['submit'])) {
	$name = $_POST['item_name'];
	$decp = $_POST['item_decp'];
	$sp = $_POST['item_sp'];

	$sql = "UPDATE `item_info` SET `item_name` = '$name', `item_decp` = '$decp', `item_sp` = '$sp' WHERE `item_no` = '$id'";
	$result = mysqli_query($conn ,$sql);
	echo '<div class="alert alert-success">
		Item Details Updated.!!
		</div>
	';
}
?>
    </form>   
    
  </div>
</div>
</body>
</html>







