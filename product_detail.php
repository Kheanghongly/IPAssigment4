<?php
  $servername = "localhost";
  $username = "root";
  $password = "";  
  $dbname = "shop";
  session_start();
  //Conection database online
  // $servername = "db4free.net";
  // $username = "hongly123";
  // $password = "hongly123";
  // $dbname = "hongly_shop";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}
  
  $id ='';
  $sql_product = '';
  if(isset($_POST["id"])){
    $id = $_POST["id"];
    $sql_product = "select * from products natural join assets where id=".$id;
    $_SESSION["id"] = $id;
  } 
  else {
    $sql_product = "select * from products natural join assets where id=".$_SESSION["id"];
  }
  $product = $conn->query($sql_product);

  $sql_feature = "SELECT * from features";
  $features = $conn->query($sql_feature);

  $sql_category = "select * from categories";
  $category = $conn->query($sql_category);

  $category_section = "";

  if(isset($_POST['category'])){
    $cate = $_POST['category'];

    $category_section = "select* from products natural join assets where category_id = {$cate};";
    $products = $conn->query($category_section);
  }
  date_default_timezone_set('Asia/Phnom_Penh');

  if(isset($_POST["submit22"])){
    if($_POST["comment"] != ""){
      $comment = $_POST["comment"];
      $date = $_POST["date"];
      $product_id = $_SESSION["id"];
      //Insert comment to database
      $sql_reviews = "INSERT INTO reviews (  `content`,  `written_at`, `product_id` ) VALUE (  '$comment','$date','$product_id')";
      $reviews = $conn->query($sql_reviews);}}
     
    //Get product.id = reviews.prodcut_id 

    $sql_review = "SELECT * FROM reviews JOIN products WHERE reviews.product_id = products.id order by written_at DESC";
    $review = $conn->query($sql_review);
  
    $product_id = $_SESSION["id"];
    $sql_comment = "SELECT * FROM reviews NATURAL JOIN products WHERE reviews.product_id = {$product_id} order by written_at DESC";
    $comment = $conn->query($sql_comment);

    $checkout = "signin.php";
    if(isset($_SESSION["username"])){
      $checkout = "checkout.php";
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
  <!-- Navigation Bar -->

  <?php
  include ("include/nav.php");
  ?>
  
  <!-- feature -->
  <?php  while($row4 = $features->fetch_assoc()) { ?>
        <div class="feature">
            <img src="<?php echo $row4["image"];?>" alt="..." width="100%">
            <div class="search_box"><input class="btn-light searching" type="text" name="" id="input_text_" placeholder="Searching..."></div>
            <div class="dercription_feature"><?php echo $row4["description"];?></div>
            <div class="name_feature"><h3><b><?php echo $row4["title"];?></b></h3></div>
        </div>
  <?php }?>
  <p class="spacing"></p>

  <!-- promotion -->
  <?php
  include ("include/promotion.php");
  ?>
  <!-- Category -->

  <p class="spacing"></p>
  <div class="container">
    <div class="row">
    <div class="col-md-3">
      <h4 id="cate"><b>Category List</b></h4>
      <hr>
      <?php while($row2 = $category->fetch_assoc()) { ?>
  
          <div>
            <ul class="CategoryUl">
              <li>
              <form action="index.php" method="post">
                  <input type="hidden" name="category" value="<?php echo $row2["id"];?>">
                  <button type="submit" class="categoryButton">
                  <img src="<?php echo $row2["icon"];?>" alt="..." class="CategoryIcon"><?php echo $row2["name"];?>
                  </button>
              </form>
              </li>
            </ul>
          </div>
      <?php } ?>
</div>

    <!--products-->

      <div class="col-md-9" >
        <div class="row" id="search-item">
        <?php
        
            if(isset($products)){ ?>
            
              <div class="row">
              <?php include ("include/searchAction.php");?>

            <?php }?>
        
      <!--product detail-->

        <?php
            if(!isset($products)){
              while($row1 = $product->fetch_assoc()) { ?>
        <div class="row" >
            <div class="card mb-3" style="width:100%;">
            <div class="row no-gutters">
              <div class="col-md-6">
                <img src="<?php echo $row1["resource_path"]; ?>" class="card-img" alt="...">
                <span class="discount ass2"><?php echo $discount = $row1["discount"]; ?>%</span>
                <div class="card-body product33">
                      <img class="select_product" src="/Shop/assets/icon/I-shirt.png" alt=""> &nbsp;&nbsp;
                      <img class="select_product" src="/Shop/assets/icon/I-shirt.png" alt=""> &nbsp;&nbsp;
                      <img class="select_product" src="/Shop/assets/icon/I-shirt.png" alt="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="card-body">
                <span style="font-size: 25px;"><b><?php echo $row1["name"]; ?></b></span>
                <span class="price"><span><del style="color: red;"><?php echo $price = $row1["price"]; ?>$</del><?php $after_discount = ((100-$discount) * $price)/100;?></span> &nbsp; <span class="text-success"><?php echo $after_discount; ?>$</span></span>
                <p><?php echo $description = $row1["description"];?></p>
                <a href="<?php echo $checkout;?>" class="btn btn-success card11">Cart</a>
                <div class="product44">
                  <div class="select">Male T-shirt</div> &nbsp;
                  <div class="select">Single Color</div>
                </div>
                </div>
              </div>
            </div>
            
            </div>
          <div class="row">
            <div>
            
            <?php if(isset($product_id)){?>
              <div>
              <?php while($com = $comment->fetch_assoc()){ ?>
                  <div>
                    <?php echo $com["content"]?> <?php echo $com["written_at"]?>
                  </div>
             <?php }?>
              </div>
            <?php }?>
            
            <h3>Comments</h3>
            <?php
              echo '
            <form action="" method="POST">
              <input type="hidden" name="date" value="'.date('Y-m-d H:i:s').'">
              <input type="hidden" name="product_id" value=" '.$_SESSION["id"].' "> 
              <textarea name="comment" rows="4" cols="100%" placeholder="Write comment here!"></textarea><br>  
              <input type="submit" value="Send" name="submit22">
              <input type="reset" value="Discard" name="discard">
            </form>';
            ?>
        </div>


        <?php } } ?>
      </div>
    </div>
  </div>
  

</body>
</html>


