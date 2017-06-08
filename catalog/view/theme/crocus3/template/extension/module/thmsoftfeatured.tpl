<?php if($products) { ?>
<section class="featured-pro">
  <div class="container">
    <div class="slider-items-products">
            <div class="featured-block">
              <div class="block-title">                  
                   <h2><?php echo $heading_title; ?></h2>
                </div>
            <div id="featured-slider" class="product-flexslider hidden-buttons">
              
                
                <!-- <div class="pretext"><?php if(isset($thmsoftfeatured_cbcontent_text)) echo $thmsoftfeatured_cbcontent_text; ?> </div>
                  <a href="<?php echo $featured_list; ?>" class="view_more_bnt"><?php echo $text_viewall; ?></a>
               -->
              <div class="slider-items slider-width-col4 products-grid block-content">
               <?php foreach ($products as $product) { ?>
                <!-- Item -->
                <div class="item">
                   <div class="item-inner">
                     <div class="item-img">
                      <div class="item-img-info">
                       <a class="product-image" href="<?php echo $product['href']; ?>" title="<?php echo $product['name']; ?>">
                       <?php if ($product['thumb']) { ?>
                       <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>"/>
                       <?php } ?>
                       </a>
                        <?php if($thmsoftcrocus_sale_label==1) { 
                        if ($product['price'] && $product['special']) { ?>
                        <div class="sale-label sale-top-right"><?php echo $thmsoftcrocus_sale_labeltitle; ?></div>
                        <?php } }?>

                          <div class="box-hover">
                          <ul class="add-to-links">
                              <?php if($thmsoftcrocus_quickview_button== 1) { ?>
                            <li>
                              <a class="link-quickview" href="index.php?route=product/quickview&amp;product_id=<?php echo $product['product_id']; ?>;"  data-name="<?php echo $product['name']; ?>"><?php echo $text_quickview; ?></a>
                            </li>
                             <?php  } ?> 
                            <li>
                              <a class="link-wishlist" onclick="thm_hm_wishlist.add('<?php echo $product['product_id']; ?>');" ><?php echo $text_wishlist; ?></a> 
                            </li>
                            <li>
                              <a class="link-compare"  onclick="thm_hm_compare.add('<?php echo $product['product_id']; ?>');"><?php echo $button_compare; ?></a>
                            </li>                       
                          </ul>
                          </div>              

                    </div>
                     </div>
                      <div class="item-info">
                         <div class="info-inner">
                            <div class="item-title"> 
                              <a title="<?php echo $product['name']; ?>" href="<?php echo $product['href']; ?>">
                              <?php echo $pro_name = (strlen($product['name'])>25) ? substr($product['name'], 0,25).'...' : $product['name']; ?>
                              </a>
                            </div>
                              <?php //if ($product['rating']) { ?>
                                <div class="rating">
                                  <div class="ratings">
                                    <div class="rating-box">
                                      <?php for ($i = 1; $i <= 5; $i++) { ?>
                                      <?php if ($product['rating'] < $i) { ?>
                                      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                      <?php } else { ?>
                                      <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                      <?php } ?>
                                      <?php } ?>
                                    </div>
                                  </div>
                                </div><!-- rating -->
                                <?php // }?>

                            <div class="item-content">
                                
                              <?php if ($product['price']) { ?>
                               <div class="item-price">
                                <div class="price-box"> 
                                <?php if (!$product['special']) { ?>
                                <p class="regular-price"><span class="price"><?php echo $product['price']; ?></span></p> 
                                <?php } else { ?> 
                                <p class="old-price"><span class="price"><?php echo $product['price']; ?></span></p>
                                <p class="special-price"><span class="price"><?php echo $product['special']; ?></span></p>                           
                                <?php } ?>
                              </div>
                              </div>
                              <?php } ?>
                              <div class="action">
                               <button type="button" title="" data-original-title="<?php echo $button_cart; ?>" class="button btn-cart link-cart" onclick="thm_hm_cart.add('<?php echo $product['product_id']; ?>');"><span><?php echo $button_cart; ?></span></button>
                              </div>
                            </div>

                         </div>
                      </div>  <!-- End Item info --> 
                  </div>  <!-- End  Item inner--> 
                </div> <!-- End Item --> 
                <?php } ?>
                
              </div>
            </div>    <!-- featured --> 
          </div>
    </div>    <!-- slider Item products --> 
  </div>
</section>
<?php } ?>