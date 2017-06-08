<div class="block block-account">  
<div class="block-title">
  <?php echo $heading_title;?>
  </div>
 <div class="block-content">
  <ul>
    <?php foreach ($informations as $information) { ?>
    <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
    <?php } ?>
    <li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
    <li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
  </ul>
</div>
</div>