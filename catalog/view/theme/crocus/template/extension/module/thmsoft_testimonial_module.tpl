<?php

$sidebar_module_ref = 'testimonial_text_limit_of_module'.$module;
$middle_module_ref = 'testimonial_text_limit_of_module'.$module;
$sidebar_height = $$sidebar_module_ref-15; 
$middle_height = $$middle_module_ref-350; ?>
<style type="text/css">
#column-left .thmsofttestimonial .caption<?php echo $module;?>,#column-right .thmsofttestimonial .caption<?php echo $module;?> {
min-height:<?php echo $sidebar_height ?>px;
}
.thmsofttestimonial .caption<?php echo $module?>{
  min-height:<?php echo abs($middle_height) ?>px;
}
</style>
<?php if(!$testimonial_slider){ ?>
<?php if($testimonial_heading_title) { ?>
<h3><?php echo $testimonial_heading_title; ?></h3>
<?php } ?>
<div class="row">
  <?php foreach ($testimonials as $testimonial) { ?>
  <div class="product-layout col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="product-thumb transition">

      <?php if($display_image) {  ?>
      <div class="image" style="margin-top:10px;">
                <img src="<?php echo $testimonial['image'];?>" alt="" title="" class="img-responsive">
      </div>
      <?php } ?>

      <div class="caption" style="min-height:<?php echo $testimonial_text_limit+15;?>px;">
        <h4 style="text-transform: capitalize;"><?php echo $testimonial['author']; ?>
          <small><?php if($display_author_bio) { echo $testimonial['bio']; } ?></small>
        </h4>

        <p><?php echo $testimonial['text']; ?></p>
        
        <?php if($display_rating) { ?>
        <?php if ($testimonial['rating']) { ?>
        <div class="rating">
          <?php for ($i = 1; $i <= 5; $i++) { ?>
          <?php if ($testimonial['rating'] < $i) { ?>
          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
          <?php } else { ?>
          <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
          <?php } ?>
          <?php } ?>
        </div>
        <?php } ?>
        <?php } ?>

        <?php if($display_date_added) { ?>
        <p class="price"><?php  echo $testimonial['date_added']; ?></p>
        <?php } ?>
      </div>
      
  </div>
  </div>
  <?php } ?>
</div>
<div class="row">
        <div class="col-sm-6 text-left"></div>
        <div class="col-sm-6 text-right"><a href="<?php echo $testimonial_url; ?>"><?php echo $text_show_all;?></a></div>
</div>
<?php } else { ?>

<?php if($testimonial_heading_title) { ?>
<!-- <h3><?php echo $testimonial_heading_title; ?></h3> -->
<?php } ?>
<div class="testimonials std">
  <div class="slider-items-products">
    <div id="testimonials" class="product-flexslider hidden-buttons">
      <div class="slider-items slider-width-col1 owl-carousel owl-theme"> 
    <?php $k=0; foreach ($testimonials as $testimonial) { ?>
    <?php if($k==0) { ?> 
    <div class="item">
    <?php } ?>  
       <div class="inner-block">
        
     
          <?php if($display_image) {  ?>
          <div class="auther-img">
          <img src="<?php echo $testimonial['image'];?>" alt="" title="" class="img-responsive">
          </div>
          <?php } ?>

          <div class="caption<?php echo $module;?>">     
         

          <div class="testimonials-text"><?php echo $testimonial['text']; ?></div>

           <div class="auther-name"><?php echo $testimonial['author']; ?> <span><?php if($display_author_bio) { echo $testimonial['bio']; } ?></span> </div>
          
          <?php if($display_rating) { ?>
          <?php if ($testimonial['rating']) { ?>
          <div class="rating">
            <?php for ($i = 1; $i <= 5; $i++) { ?>
            <?php if ($testimonial['rating'] < $i) { ?>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
            <?php } else { ?>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
            <?php } ?>
            <?php } ?>
          </div>
          <?php } ?>
          <?php } ?>

          <?php if($display_date_added) { ?>
          <p class="price"><?php  echo $testimonial['date_added']; ?></p>
          <?php } ?>
        </div>



      </div> 
      <!-- <div class="text-right" style="margin:0px 10px 5px 0px"><a href="<?php echo $testimonial_url; ?>"><?php echo $text_show_all;?></a></div>  -->
    <?php $k++;
    if($k > 1) { $k=0; ?> </div> <?php } ?>   
  <?php  } ?>
</div>
</div>
</div>
</div>
<!-- </div> -->
<script type="text/javascript"><!--


jQuery("#testimonials .slider-items").owlCarousel({
    autoPlay: true,
    items: 1, //10 items above 1000px browser width
    itemsDesktop: [1024, 1], //5 items between 1024px and 901px
    itemsDesktopSmall: [900, 1], // 3 items betweem 900px and 601px
    itemsTablet: [600, 1], //2 items between 600 and 0;
    itemsMobile: [320, 1],
    navigation: false,
    navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
    slideSpeed: 500,
    pagination: true
});

--></script>
<?php } ?>