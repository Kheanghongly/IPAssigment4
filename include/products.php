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
  //Select Category
  if(isset($_POST['category'])){
    $cate = $_POST['category'];

    $category_section = "select* from products natural join assets where category_id = {$cate};";
    $product = $conn->query($category_section);
  }
  //Search products
  if(isset($_POST["Input"])){
    $key = $_POST["Input"];

    $sql_product_search = "SELECT * FROM products NATURAL JOIN assets WHERE products.name LIKE '%$key%';";
    $product = $conn->query($sql_product_search);
  }
  $checkout = "signin.php";
  if(isset($_SESSION["username"])){
    $checkout = "checkout.php";
  }

?>  
    
        <?php  
           while($row3 = $product->fetch_assoc()) { ?>
  
              <div class="col-md-4 each_product" >
                <form action="/IPassignment4/product_detail.php" method="POST">
                  <button class="btn btn-light btn_pro"type="submit" name="id" value="<?php echo $id = $row3["id"]; ?>">
                    <div class="card"> 
                      <img class="card-img-top product" src="<?php echo $row3["resource_path"]; ?>" alt="...">
                      <span class="discount"><?php echo $discount = $row3["discount"]; ?>%</span>
                      <div class="card-body">
                        <p class="card-text text-primary"><span style="font-size:25px"><?php echo $row3["name"]; ?></span><br> <?php echo $description = $row3["description"];?>
                        <p>Original Price : <del style="color: red;"><?php echo $price = $row3["price"]; ?>$</del></p>
                        <?php $after_discount = ((100-$discount) * $price)/100;?>
                        <p>After Discount : <span class="text-success"><?php echo $after_discount; ?>$</span></p>
                        <a href="<?php echo $checkout;?>" class="btn btn-success addCard">Cart</a>
                      </div>
                    </div>
                  </button>
                </form>
              </div>

           <?php }?>
        
