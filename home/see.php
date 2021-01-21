<?php
	session_start();
	if (isset($_SESSION["price"])) {
    if($_SESSION['num'] != 0){
      unset($_SESSION["price"]);
    }
    
  }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Item || Page</title>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
  function order() {
     var retVal = confirm("Do you want to Place Order ?");
               if( retVal == true ){
               	alert("Your Order is Placed");
               }

  }
          
</script>

</head>
<body>
  <nav class="navbar navbar-inverse ">
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Fabrication Wala</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="" class="btn" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
      <li><a href="" data-toggle="modal" data-target="#my"> <span class="glyphicon glyphicon-envelope" ></span> Contact US</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php 
    if(isset($_SESSION['email'])){
      echo '
    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

  ';
    }else{
     
    
  echo '
      <li><a href="../reg.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="../index.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
 
  ';
}
  ?>  
</ul>
  </div>
</nav>


<div class="container">
<div class="row">
  <div class="form-group">
     <br>
  
<?php

include '../conn.php';

if(isset($_GET['item'])){
	$item = $_GET['item'];

	//search in db 
	$sql = "SELECT * FROM `item_info` WHERE `item_no` = '$item'";

			if($result = mysqli_query($conn, $sql)){
				if(mysqli_num_rows($result) < 1){
					header("location: index.html");
				}
				else{
					while ($row = mysqli_fetch_assoc($result)) {
						$_SESSION["sp"] = $row['item_sp'];
            $n =0;
						echo '<div class="row"> 
						<img src="img/'.$row['item_img'].'" height="390" width="390">
							<div class="col-md-6">

								
								<h2>Item Name</h5>'.$row['item_name'].'</h2>
								<h2>Item Price Rate</h5><h6>1x1 Rate</h6>'.$row['item_sp'].'Rs</h2>
								<h2>Stock</h5>'.$row['utem_qty'].'</h2>
								
								<form action="" method="post">
    								<input type="text" name="x" width="10" placeholder="Width"> x <input type="text" name="y" width="10" placeholder="Height"> 
    								<input type="submit" name="submit" class="btn-info btn" value="Calculate">
 								</form>
								<button class="btn btn-success" onclick="order()">Place Order</button><br>
 								<div class="alert alert-success"><b>Price :</b> ';
 								if(isset($_SESSION["price"])) { echo $_SESSION["price"]; $_SESSION['num']++;}
 								echo '</div>
 								
 								
							</div>



						</div>';
					} 
				}
			}
			
}

if (isset($_POST["submit"])) {
  if(!is_numeric($_POST["x"]) or (!is_numeric($_POST["y"]))){
    echo '<script>
      alert("Please Enter Numberic values ");
    </script>';
    exit();
  }

  $_SESSION["price"] = $_POST["x"]*$_POST["y"];
  $_SESSION['num'] = 0;
  header("Refresh:0;");
}
?>
<form action="" method="post">
    <input class="btn btn-info" type="submit" name="request_size" value="Request For Mesurement">
  </form>

<?php  
  //echo '<div class="alert alert-success"></div>';
if (isset($_POST['request_size'])) {
  if (isset($_SESSION['email'])) {
        $sql = "SELECT `item_img` FROM `item_info` where `item_no` = '$item'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
            $img = $row[0];
          }
      }
      $uid = $_SESSION["uid"];
      //insert new request
      $sql = "INSERT INTO `request` (`uid`, `item_no`, `item_img`)
      VALUES ('$uid', '$item', '$img')";
      $result = mysqli_query($conn, $sql);
        echo '<script>
        alert("Request Successfully Registered");
        </script>
      ';

    }
    else{
      echo '<script>
        alert("Please Login First");
        </script>
      ';
    }
}
?>
</div>
 
  </div>


  <div class="row">
    <?php
    //fatch category
      $sql ="SELECT `category` FROM `item_info` WHERE `item_no` = '$item'";
      if($result = mysqli_query($conn, $sql)){
          $row = mysqli_fetch_assoc($result);
          $category = $row['category'];         
      }
    //fatch data by category
      $sql ="SELECT * FROM `item_info` WHERE `category` = '$category'";
      if($result = mysqli_query($conn, $sql)){
          while ($row = mysqli_fetch_assoc($result)) {
            if($row["category"] == $_GET["item"]){
              echo $row["item_no"]. "   " . $row["item_name"] ;
            }
          }
                   
      }
    ?>
  </div>
 <div class="row well well-sm">
  <h3>SImilar Products</h3>
   <?php 
      $sql = "SELECT `category` FROM `item_info` WHERE `item_no` = '$item'";
      if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
          $category = $row["category"];
        }
      }
      $sql = "SELECT * FROM `item_info` WHERE `category` = '$category'";
      if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
         if ($row["item_no"] != $_GET["item"]) {
           echo '
      <div class="col-md-3">
        <img src="img/'.$row['item_img'].'" width="290" height="290"><h2>'.$row['item_name'].'</h2>
        <h4>'.$row['item_sp'].' Rs</h4>
        <a href="see.php?item='.@$row[item_no].'" class="btn btn-success">Add to cart</a>
      </div>
      
      ';
         }
        }
      }

   ?>

 </div>
<!--Container end -->
 </div>
 <div style="margin: 100px;"></div>
    
<!-- modal  for about us-->
<div class="container">
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">About Us</h4>
        </div>
        <div class="modal-body">
          <p>Fabrication Wala is an e-Commerce platform that provide vivide range of products with dynamic range</p>
          <p>Please Look out at out Web application</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

<!-- modal  for Contact us-->
  

  <!-- Modal -->
  <div class="modal fade" id="my" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Contact Us</h4>
        </div>
        <div class="modal-body">
          <p><span class="glyphicon glyphicon-envelope" ></span>  :  info@fabricationwala.com</p>
          <p><span class="glyphicon glyphicon-earphone" > </span>  : +91 xxxxxxxxxx</p>
          <p><span class="glyphicon glyphicon-map-marker" > </span>  : Address here</p>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>

