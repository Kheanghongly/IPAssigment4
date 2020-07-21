<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "shop";
  //Conection database online
  // $servername = "db4free.net";
  // $username = "hongly123";
  // $password = "hongly123";
  // $dbname = "hongly_shop";
  session_start();
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  // Product
  $sql_product = "select * from products natural join assets";
  $product = $conn->query($sql_product);
  //Feature
  $sql_feature = "select * from features";
  $features = $conn->query($sql_feature);
  //Category
  $sql_category = "select * from categories";
  $category = $conn->query($sql_category);
  
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/style.js"></script>

</head>
<body>

  <!-- Navigation Bar -->
  <?php
  include 'include/nav.php';
  ?>
  
  <!-- feature -->
  <?php 
  include 'include/feature.php';
  ?>
  <p class="spacing" ></p>
  <!-- promotion -->

  <?php
  include 'include/promotion.php';
  ?>

  <!-- Category -->
  <p class="spacing" ></p>
  
  <div class="container">
    <div class="row" >
  
  <?php include 'include/category.php';?>

  <!-- products -->
      <div class="col-md-9">
        <div class="row" id="search_product"> 
          <?php include 'include/products.php';?>
          </div>
      </div>
    </div>
  </div> 
  <p class="space"></p>
  

</body>
</html>
