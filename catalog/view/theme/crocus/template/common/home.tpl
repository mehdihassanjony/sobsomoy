<?php echo $header; ?>
<div>
<div id="content">
  <?php echo $column_left;?>
   <div id="thmsoft-slideshow" class="thmsoft-slideshow">
    <div class="container">
      <div class="row">
        <div class=" col-lg-3 col-md-3 col-sm-5 col-xs-12 col-mid"> 
            <?php echo $slider_left;?>
        </div>       
        <div class="col-md-6 col-sm-7 col-xs-12">
        <?php echo $slider;?>
        </div>
        <?php echo $slider_right;?>
    </div>
    </div>
  </div>
<div class="content-page">
<div class="container">
  <div class="row"> 
  <div class="col-md-9">    
  <?php echo $top_left;?>
  </div>
  <div class="col-md-3">
  <?php echo $top_right;?>
  </div>
  </div>
</div>
</div>
  <?php echo $column_right;?>
  <?php echo $content_top; ?><?php echo $content_bottom; ?>
</div>
</div>
<?php echo $footer; ?>