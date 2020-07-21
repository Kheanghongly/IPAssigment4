<?php
  session_start();
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
    die("Connection failed: " . $conn->connect_error);}

  //Varaible

  $new_name = "";
  $new_email = "";
  $new_pass = "";
  $massage_name = "";
  $massage_email = "";
  $massage_pass = "";
  $massage_password = "";
  $massage_confirm_password = "";
  $massage = "";
  $nav_name = "";
  $succ = "Please create account in my Shop";
  $user = "";

if(isset($_POST["submit_signup"])){

  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $name = $firstname.$lastname;
  $email = $_POST["email"];
  $password = $_POST["password"];
  $en_password = md5($password);
  $confirm_password = $_POST["confirm_password"];  
  $check_pass = strlen(trim($password));

    if($name == Null && $email == Null && $password == NULL){
      $massage_name = "Input your name";
      $massage_email = "Input your email";
      $massage_password = "Input your password";
      $massage_confirm_password = "Confirm password";
    }
    else if($name != Null && $email == Null && ($password != NULL && strlen(trim($password)) < 4 ) ){
      $massage_email = "Input your email";
      $massage_password = "Input your password at least 4 charaters";
    }
    else if($name == Null && $email != Null && ($password != NULL && strlen(trim($password)) < 4 ) ){
      $massage_name = "Input your name";
      $massage_password = "Input your password at least 4 charaters";
    }
    else if($name == Null && $email == Null && ($password != NULL && strlen(trim($password)) < 4 ) ){
      $massage_name = "Input your name";
      $massage_email = "Input your email";
      $massage_password = "Input your password at least 4 charaters";
    }
    else if($name != Null && $email == Null && $password == NULL){
      $massage_email = "Input your email";
      $massage_password = "Input your password at least 4 charaters";
    }
    else if($name == Null && $email != Null && $password == NULL){
      $massage_name = "Input your name";
      $massage_password = "Input your password atleast 4 charaters";
    }
    else if($name != Null && $email == Null && $password == NULL){
      $massage_email = "Input your email";
      $massage_password = "Input your password atleast 4 charaters";
    }
    else if($name != Null && $email != Null && $password == NULL){
      $massage_password = "Input your password atleast 4 charater";
    }
    else if($name != Null && $email != Null && ($password != NULL && strlen(trim($password)) < 4 ) ){
      $massage_confirm_password = "Please confirm password";
      $massage_password = "Input your password at least 4 charaters";
    }
    else if($name!=NULL && $email!=NULL && ($password != NULL && strlen(trim($password)) >= 4) && $confirm_password!=NULL && $confirm_password != $password){
      $massage = "incorrect confirm password";
    }
    else if($name!=NULL && $email!=NULL && ($password != NULL && strlen(trim($password)) >= 4 ) && $confirm_password!=NULL && $confirm_password == $password ){
              $sql_check = "SELECT * FROM users where users.email LIKE '{$email}' AND users.password LIKE '{$en_password}'";
              $check = $conn->query($sql_check);

              while($row = $check->fetch_assoc()){
                $new_name = $row["name"];
                $new_email = $row["email"];
                $new_pass = $row["password"];
              }
              if($new_email == $email){
                if($new_pass == $en_password){
                  $succ = "Already have an account !!! Go Login page...";
                  
                }
              }
              if($new_email != $email){
                
                    $sql_users = "INSERT INTO users (  `name`,  `email`, `password` ) VALUE (  '$name','$email','$en_password')";  
                    $user = $conn->query($sql_users);
                    $nav_name = $name;
                    $_SESSION["username"] = $nav_name;
                    $succ = "Signup Success...";
                    
                
              }

}}

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
        <a href="" id="link1">&nbsp; Need help &nbsp; &nbsp;</a><b><?php echo $nav_name;?></b>
      </div>
    </div>
</nav>
<br>
<div class="container form_sign">
    <h2 class="sign_text text-success">Sign Up</h2>
    <p class="text-success sign_text"><?php echo $succ;?></p>
    <label class="signup"><?php echo $massage_name;?></label>
    <form action="" method="post"class="form">
        <div class="row">
            <div class="col-xs-6 col-md-6">
                <input type="text" name="firstname" value="<?php if(isset( $_POST["submit_signup"])){if($firstname==NULL){ $firstname = NULL;}else echo $firstname;}?>" class="form-control input-lg" placeholder="First Name"></div>
            <div class="col-xs-6 col-md-6">
                <input type="text" name="lastname" value="<?php if(isset( $_POST["submit_signup"])){if($lastname==NULL){ $lastname = NULL;}else echo $lastname;}?>" class="form-control input-lg" placeholder="Last Name"></div>
        </div>
        <label class="signup"><?php echo $massage_email;?></label>
        <input type="email" name="email" value="<?php if(isset( $_POST["submit_signup"])){if($email==NULL){ $email = NULL;}else echo $email;}?>" class="form-control input-lg" placeholder="Your Email" require>
        <label class="signup"><?php echo $massage_password;?></label>
        <input type="password" name="password" value="<?php if(isset( $_POST["submit_signup"])){if($password==NULL){ $password = NULL;}else echo $password;}?>" class="form-control input-lg" placeholder="Password">
        <label class="signup"><?php echo $massage_confirm_password;?><?php echo $massage;?></label>
        <input type="password" name="confirm_password" value="<?php if(isset( $_POST["submit_signup"])){if($confirm_password==NULL){ $confirm_password = NULL;}else $confirm_password;}?>" class="form-control input-lg" placeholder="Confirm Password"> 
        <br>
        <input class="btn btn-lg btn-primary btn-block signup-btn create" type="submit" name="submit_signup" value="Continue">
    </form>
    <br>
    <p class="sign_text">Already have an account? <a href="signin.php" class="singin">Sign in<a></p>
</div>
</body>
</html>






