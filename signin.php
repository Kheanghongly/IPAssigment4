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

  $massage = "";
  $new_email = "";
  $new_pass = "";
  $new_name = "";
  $succ = "Login with your email and password";
  $sewsome_shop = "index.php";

  if(isset($_POST["continue"])){

    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $sql_check = "SELECT DISTINCT * FROM users where users.email LIKE '{$email}' AND users.password LIKE '{$password}'";
              $check = $conn->query($sql_check);

              while($row = $check->fetch_assoc()){
                $new_name = $row["name"];
                $new_email = $row["email"];
                $new_pass = $row["password"];}

    if($new_email == $email){
      if($new_pass == $password){
        $new_name;
        $succ = "Login succes";
        session_start();
        $_SESSION["username"] = $new_name;
        header('Location: index.php');
        exit;
      }else $massage = "*Email or password is valid. Try again!!!";
    }else $massage = "*Email or password is valid. Try again!!!";

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
        <img src="/Shop/assets/icon/questionMark.png" alt="questionMark" height="15px" width="15px">
        <a href="" id="link1">&nbsp; Need help &nbsp; &nbsp;</a><b><?php if(isset($_POST["continue"])){echo $new_name;}?></b>
      </div>
    </div>
</nav>
<br>
<div class="container form_sign">
    <h2 class="sign_text text-success">Welcome Back</h2>
    <p class="text-success sign_text"><?php echo $succ;?></p>
    <br>
    <p style="color: red;"><?php if(isset($_POST["continue"])){echo $massage;}?></p>
    <form action="" class="form" method="POST">
        <input type="text" name="email" value="<?php if(isset($_POST["continue"])){echo $email;}?>" class="form-control input-lg" placeholder="Your Email">
        <p></p>
        <input type="password" name="password" value="<?php if(isset($_POST["continue"])){ $password;}?>" class="form-control input-lg" placeholder="Password">
        <br>
        <br>
        <input class="btn btn-lg btn-primary btn-block signup-btn create" type="submit" name="continue" value="Login">
    </form>
    <br>
    <p class="sign_text">Don't have any account?<a href="signup.php" class="singin">Sign up<a></p>

</div>
</body>
</html>