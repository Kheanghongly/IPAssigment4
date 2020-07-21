<?php
session_start();
$checkout = "";
    if(isset($_SESSION["username"])){
      $checkout = $_SESSION["username"];
    }
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
<nav class="navbar navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.php"><b>Awesome</b> <span class="text-success"><b>Shop</b></span></a>
      <div class="form-inline">
        <img src="assets/icon/questionMark.png" alt="questionMark" height="15px" width="15px">
        <a href="" id="link1">&nbsp; Need help &nbsp; &nbsp;</a>
        <span><?php echo $checkout;?></span>
      </div>
    </div>
</nav>

<p class="spacing"></p>

<div class="container check_size">
    <br>
    <h3 class="text-success Check"><b>CheckOut</b></h3>
    <br>
    <h5 class="text-success">3 items</h5>
    <hr>
    <div class = "row">
      <div class="col-md-3">
        <img src="assets/icon/shirt.png" alt="" class="check_img">
      </div>
      <div class="col-md-7">
        <span><b>White T-shirt - Nike</b></span><br><br>
        <span class="text-success">$12</span> <br><br>
        <form action=""><input type="number" name="quantity" value="" min="1" max="5"></form>
      </div>
      <div class="col-md-2"><br><br><b>12$ &times;</b></div>
    </div>
    <hr>
    <div class = "row">
      <div class="col-md-3">
        <img src="assets/icon/shirt.png" alt="" class="check_img">
      </div>
      <div class="col-md-7">
        <span><b>White T-shirt - Nike</b></span><br> <br>
        <span class="text-success">$12</span> <br><br>
        <form action=""><input type="number" name="quantity" min="1" max="5"></form>
      </div>
      <div class="col-md-2"><br><br><b>12$ &times;</b></div>
    </div>
    <hr>
    <div class = "row">
      <div class="col-md-3">
        <img src="assets/icon/shirt.png" alt="" class="check_img">
      </div>
      <div class="col-md-7">
        <span><b>White T-shirt - Nike</b></span><br> <br>
        <span class="text-success">$12</span> <br><br>
        <form action=""><input type="number" name="quantity" min="1" max="5"></form>
      </div>
      <div class="col-md-2"><br><br><b>12$ &times;</b></div>
    </div> 
    <br>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8 checkout">
        <a href="">
          <div class="row">
            <div class="col-md-3 buy"><b>CheckOut</b></div>
            <div class="col-md-6"></div>
            <div class="col-md-3 price"><p class="price2">$30.50</p></div>
          </div>
        </a>
      </div>
      <div class="col-md-2"></div>
    </div>
    <br>

</div>
<p class="space"></p>

</body>
</html>