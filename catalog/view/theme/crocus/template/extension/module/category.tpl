<div class="side-nav-categories">
  <div class="block-title"><?php echo $heading_title; ?></div>
  <div class="box-content box-category">    
     
    <ul>
       <?php $cnt=1;$cat_cnt=count($categories); foreach ($categories1 as $category) { ?>
      <li class="<?php if($cnt==$cat_cnt) echo "last";?>">
        <?php if ($category['category_id'] == $category_id) { ?>
       <a href="<?php echo $category['href']; ?>" class="active"><?php echo $category['name']; ?></a>
        <?php } else { ?>
       <a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
        <?php } ?>
        <?php if ($category['children']) { ?>
        <span class="subDropdown <?php if($category['category_id'] == $category_id) { echo 'minus';} else { echo 'plus';}?>"></span>
        <ul class="level0" style="<?php if($category['category_id'] == $category_id) { echo 'display: block;';} else { echo 'display: none;';}?>">
          <?php foreach ($category['children'] as $child) { ?>

          <li>
            <?php  if ($child['category_id'] == $child_id) { ?>
            <a href="<?php echo $child['href']; ?>" class="active"><?php echo $child['name']; ?></a>
            <?php } else { ?>
            <a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a>
            <?php } ?>


            <?php if ($child['children']) { ?>
              <span class="subDropdown <?php if($child['category_id'] == $child_id) { echo 'minus';} else { echo 'plus';}?>"></span>
              <ul class="level1" style="<?php if($child['category_id'] == $child_id) { echo 'display: block;';} else { echo 'display: none;';}?>">
                <?php foreach ($child['children'] as $child) { ?>
                <li>
                  <?php if ($child['category_id'] == $child_id) { ?>
                  <a href="<?php echo $child['href']; ?>" class="active"><?php echo $child['name']; ?></a>
                  <?php } else { ?>
                  <a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a>
                  <?php } ?>
                </li>
                <?php } ?>
              </ul>
              <?php } ?>
          </li>
          <?php } ?>
        </ul>
        <?php } ?>
      </li>
      <?php $cnt++;} ?>
    </ul>
  </div>
</div>
