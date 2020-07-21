<?php  
           while($row4 = $features->fetch_assoc()) { ?>

    <div class="feature">
        <img src="<?php echo $row4["image"];?>" alt="..." width="100%">
        <div class="search_box"><input class="btn-light searching" type="text" name="" id="input_text" placeholder="Searching..."></div>
        <div class="dercription_feature"><?php echo $row4["description"];?></div>
        <div class="name_feature"><h3><b><?php echo $row4["title"];?></b></h3></div>
    </div>
<?php }?>