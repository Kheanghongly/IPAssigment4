<?php

$username ="Join";
$isJoint = false;
if (isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    $isJoint = true;
} else {
  $isJoint = false;
  $username ="Join";
}

?>

<nav class="navbar navbar-expand navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <a class="nav-link" href="index.php">
      <h3>Awesome <span class="text-success">Shop</span></h3> 
      
    </a>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="#" class="nav-link text-primary"><img class="question-mark" src="assets/icon/questionMark.png" alt="question_mark" height="15px" width="15px">&nbsp; Need Help</a>
      </li>
      <?php if($isJoint):?>
        <li class="nav-item dropdown">
          <b><a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdownMenuLink" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $username; ?>
          </a></b>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
      <?php else: ?>
        <div class="p-2 "><b><a href="signin.php" class="p-1 text-primary"><?php echo $username; ?></a></b></div>
      <?php endif; ?>
    </ul>
  </div>
</nav>