<div class="col-md-3">
      <h4 id="cate"><b>Category List</b></h4>
      <hr>
      <?php while($row2 = $category->fetch_assoc()) { ?>
  
          <div>
            <ul class="CategoryUl">
              <li>
              <form action="" method="post">
                  <input type="hidden" name="category" value="<?php echo $name_category = $row2["id"];?>">
                  <button type="submit" class="categoryButton">
                  <img src="/IPassignment3/<?php echo $icon = $row2["icon"];?>" alt="..." class="CategoryIcon"><?php echo $name_category = $row2["name"];?>
                  </button>
              </form>
              </li>
            </ul>
          </div>
        
      <?php } ?>
</div>