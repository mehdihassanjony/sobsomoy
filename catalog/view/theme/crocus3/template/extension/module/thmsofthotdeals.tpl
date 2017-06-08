<?php global $config; ?>

<?php if($products) { ?>
<div class="offer-slider parallax parallax-2">
   <?php foreach ($products as $product) { ?>
   <h2><?php echo $heading_title; ?></h2>
   <div class="starSeparator"></div>
   <p> <span><?php echo $product['name']; ?>:</span> <?php echo substr($product['description'], 0,80).'..'  ?>
          </p>
    <div class="box-timer">
     <div class="timer-grid"  data-time="<?php echo $product['date_end'] ;?>"></div>
    </div>
     <a target="_self" href="<?php echo $product['href']; ?>" class="shop-now"><?php echo $text_shop; ?></a>
   <?php } ?>
<div>
</div>
</div>
<?php } else { ?>
<div class="offer-slider parallax parallax-2">
   <h2><?php echo $heading_title; ?></h2>
   <p> <?php echo $no_product['name']; ?></p>
   <div class="box-timer">
     <div class="timer-grid"  data-time="<?php echo $no_product['date_end'] ;?>"></div>
    </div>
    <div>
</div>
</div>
<?php } ?>