<footer>
<div class="footer-add"> <a href="#"><img src="catalog/view/theme/<?php echo $thmsoft_theme ?>/image/footer-banner.jpg" alt="download"> </a> </div>
 <div class="footer-inner">
    <div class="container">
      <div class="row">
         <div class="col-sm-8 col-xs-12 col-lg-9">
           <div class="footer-column pull-left">
              <h4><?php echo $text_service; ?></h4>
              <ul class="links">
                  <li class="first"><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
                  <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
                  <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
                  <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
                  <li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
                  <li class="last"><a href="<?php echo $account; ?>" title="<?php echo $text_account; ?>"><?php echo $text_account; ?></a></li>
                </ul>
           </div>
           <div class="footer-column pull-left">
              <h4><?php echo $text_extra; ?></h4>
                <ul class="links">
                    <li class="first"><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
                    <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
                    <li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>                   
                     <?php if($thmsoftblog_status==1){ ?>                     
                       <li><a href="<?php echo $blog_href; ?>"><?php echo $text_blog; ?></a></li>
                       <?php } else { ?>
                         <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
                       <?php }?> 
                    <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
                    <li class="last"><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
                  </ul>
           </div>
           <?php if ($informations) { ?>
           <div class="footer-column pull-left">
            <h4><?php echo $text_information; ?></h4>
            <ul class="links">
            <?php $i=0;$cnt=count($informations); foreach ($informations as $information) { ?>
            <li class="<?php if($i==0){echo 'first';} if($i==$cnt){echo 'last';} ?>"><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
            <?php $i++;} ?>
            </ul>
           </div>
           <?php } ?>
         </div>
          <div class="col-xs-12 col-lg-3 col-sm-4">
            <div class="footer-column-last">             
            <?php if($thmsoftcrocus_footer_fb) { ?>
                      <?php echo html_entity_decode($thmsoftcrocus_footer_fbcontent);?>
            <?php }  ?> 
          </div>
          </div>
    </div>
  </div>
</div>

<?php if($manufacturers) { ?>
<div class="brand-logo">
  <div class="container">
      <div class="slider-items-products">
        <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col6"> 
              <?php foreach ($manufacturers as $_manufacturer) { ?>
              <!-- Item -->
              <div class="item"> 
                <a href="<?php echo str_replace('&', '&amp;', $_manufacturer['href']); ?>">
                  <img src="<?php echo $_manufacturer['manufacturer_image']?>" alt="<?php echo $_manufacturer['name']?>">
                </a>
              </div>
              <!-- End Item -->
              <?php }?>
            </div><!-- slider-items slider-width-col6 -->
          </div><!-- brand-logo-slider -->
      </div><!-- slider-items-products -->
  </div><!-- container -->
</div><!-- brand-logo -->
<?php } ?>


<div class="footer-bottom">
  <div class="container">
    <div class="row">
      <address>
        <?php if ($thmsoftcrocus_address):?>
          <span><i class="fa fa-map-marker"></i><?php echo html_entity_decode($thmsoftcrocus_address); ?></span>                 
        <?php endif;?>
        <?php if ($thmsoftcrocus_phone) : ?>                   
          <span><i class="fa fa-mobile"></i><?php echo $thmsoftcrocus_phone; ?></span>
        <?php endif;?>
        <?php if ($thmsoftcrocus_email): ?>
          <span><i class="fa fa-envelope"></i><?php echo $thmsoftcrocus_email; ?></span>
        <?php endif; ?>
      </address>
    </div>
  </div>
</div>

<!-- <div class="footer-bottom">
    <div class="container">
      <div class="row">
         <?php
        if(trim($thmsoftcrocus_powerby) != '') {
          echo html_entity_decode($thmsoftcrocus_powerby);
        } else {
          echo $powered;
        }
      ?>        
      </div>
    </div>
</div> -->
</footer>
</div> <!-- page id -->
<div id="mobile-menu">
<div class="mobile-menu-inner">
  <ul>
  <li>
     <div class="mm-search">
     <div id="search1">
          <div class="input-group">
            <div class="input-group-btn">
                  <button id="mm-submit-button-search-header" class="btn btn-default">
                  <i class="fa fa-search"></i>
                  </button>
            </div>
             <input id="srch-term" class="form-control simple" type="text" name="search_mm" maxlength="70" value="<?php echo $search;?>" placeholder="<?php echo $text_search; ?>">
          </div>
      </div>
     </div>
  </li>
  
      <?php if($thmsoftcrocus_home_option==1){ ?>
      <li>
       <a href="<?php echo $home;?>"><?php echo $text_home; ?></a>
      </li><?php }?>

      <?php foreach ($categories1 as $category) { ?>
      <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
        <?php if ($category['children']) { ?>
        <ul>
          <?php for($i=0;$i<count($category['children']);$i++){ ?>
          <li><a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?></a>
              <?php if($category['children'][$i]['children']) {?>
              <ul>
                <?php for($j=0;$j<count($category['children'][$i]['children']);$j++) { ?>
                <li><a href="<?php echo $category['children'][$i]['children'][$j]['href']; ?>"><?php echo $category['children'][$i]['children'][$j]['name']; ?></a></li>
                <?php }?>
              </ul>
              <?php }?> 
          </li>
          <?php }?>
        </ul>
        <?php }?>
      </li>
      <?php } ?>
  </ul>
   <div class="top-links"> 
   
            <ul class="links">
            <li><a href="<?php echo $account; ?>" title="<?php echo $text_account; ?>"><?php echo $text_account; ?></a></li>
            <li><a href="<?php echo $wishlist; ?>" id="wishlist-total" title="<?php echo $text_wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
            <li><a href="<?php echo $checkout; ?>" title="<?php echo $text_checkout; ?>"><?php echo $text_checkout; ?></a></li>  
            <?php if($thmsoftblog_status==1){ ?>
            <li><a href="<?php echo $blog_href;?>"><span><?php echo $text_blog ?></span></a></li><?php }?> 
            <li class="last">
            <?php if (!$logged) { ?>
            <a href="<?php echo $login; ?>"><?php echo $text_login; ?></a>

            <?php }  else { ?>
            <a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a>
            <?php } ?>
            </li>
            </ul>
  </div>
</div>
</div><!-- mobile-menu -->
<?php if($thmsoftcrocus_scroll_totop!=1) { ?>
<script type="text/javascript">
window.onload=function(){
$('body #toTop').remove();
}
</script>
<?php }?>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->

<!-- Theme created by Welford Media for OpenCart 2.0 www.welfordmedia.co.uk -->

</body></html>