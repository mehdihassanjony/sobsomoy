<div class="category-description std">
<div class="slider-items-products">
  <div id="category-desc-slider" class="product-flexslider hidden-buttons">
    <div class="slider-items slider-width-col1">          
                  <?php foreach ($slider as $slide) { ?>

                  <div class="item">
                    <?php if ($slide['link']) { ?>
                    <a href="<?php echo $slide['link']; ?>" target="_blank"><img src="<?php echo $slide['image']; ?>" alt="<?php echo $slide['title']; ?>" class="img-responsive" /></a>
                    <?php if($slide['description']) { echo $slide['description'];}?>
                    <?php } else { ?>
                    <img src="<?php echo $slide['image']; ?>" alt="<?php echo $slide['title']; ?>" class="img-responsive" />
                     <div class="cat-img-title cat-bg cat-box"><?php if($slide['description']) { echo $slide['description'];}?></div>
                    <?php } ?>
                  </div>
                  <?php } ?>          
</div>
</div>
</div>
</div>