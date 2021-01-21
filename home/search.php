<?php
include '../conn.php';
session_start();
if(isset($_SESSION["email"])){
  $auth = "ok";
}
if (empty($_GET['q'])) {
  header("location: index.html");
}
else{
 $q = mysqli_escape_string($conn, $_GET['q']); 
}

?>
<!DOCTYPE html>
<html>
<head>
    <title> <?php echo $_GET['q']; ?> || Page</title>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">

    $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
    

</script>
<style type="text/css">
body{
  height: auto;
}
  .tales {
  width: 100%;
}
.carousel-inner{
  width:100%;
  max-height: 400px !important;
}
.well {
    background: #111 !important;
  }
  .well a{
    color: white !important;
    font-weight: bold !important;
  }
  .body{
    width: 100%;
    height: 500px;    
    background-image: url('slider/img3.jpg');
    background-repeat: no-repeat;
    background-position: center;
  }
  .overlay{
    width: 68.6%;
    height: 480px;
    background: rgba(1,1,1,0.7);
    position: fixed;
    top: 84px;
    left: 195px;
    text-align: center;
    padding: 10% 0;
    letter-spacing: 4px;
    word-spacing: 10px;
  }
  .text{
    color: #ea1136 !important;
  }
  .text2{
    color: green !important;
  }
  .text3 >  a:hover {
    color: #ea1136 !important;
  }
</style>
</head>

<body>
  <nav class="navbar navbar-inverse ">
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Fabrication Wala</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="#" class="btn" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
      <li><a href="#" data-toggle="modal" data-target="#my"> <span class="glyphicon glyphicon-envelope" ></span> Contact US</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php 
    if(!empty($auth)){
      $pic = $_SESSION["pic"];
      if(!isset($name)){
      $name = "Welcome";
    }
    echo '
    
    <li><a href=""><span class="glyphicon glyphicon-user"></span> '.$name.'</a></li>
    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

  ';}
  else{echo '
      <li><a href="../reg.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="../index.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  ';
}
  ?>  
  </div>
</nav>

<div class="container">
  <?php

    $sql = "SELECT *  FROM `item_info` WHERE `item_name` LIKE '%$q%'";
      
      if ($result = mysqli_query($conn, $sql)) {
      // if found item like search
          if(mysqli_num_rows($result) > 0){
           

            while ($row = mysqli_fetch_assoc($result)) {
              echo '
                  <div class="col-md-3">
                    <img src="img/'.$row['item_img'].'" width="290" height="290"><h2>'.$row['item_name'].'</h2>
                    <h4>'.$row['item_sp'].' Rs</h4>
                    <a href="see.php?item='.@$row[item_no].'" class="btn btn-success">Add to cart</a>
                  </div>
                  
                  ';
          }


        }

            else{
                  echo '<div class="body">
                    <div class="overlay">
                      <h1 class="text"><span class="glyphicon glyphicon-remove"></span> No Item Found </h1> 
                      <h2 class="text2">Please Contact Us to Upgarde our Inventory store and make us  Grow day by day</h2>
                      <h3 class="text3"><a class="btn" href="index.html"><span class="glyphicon glyphicon-home"></span>HOME</a></h3>
                     </div>

                  </div>';
            }
        
      }
      else{
        echo mysqli_error($conn);
      }
  ?>
</div>
</body>
