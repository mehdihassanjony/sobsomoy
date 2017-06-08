<div class="content-page">
<div class="container">
<div class="row">
<div class="col-md-12">  
      <!-- featured category fashion -->
      <div class="category-product">
        <div class="navbar nav-menu">
          <div class="navbar-collapse">
            <ul class="nav navbar-nav">
              <li>
                <div class="new_title">
                  <h2><?php echo $heading_title; ?></h2>
                </div>
              </li>
              <?php if(isset($category_name1)) { ?>
              <li class="active"><a data-toggle="tab" href="#tab-1"><?php echo $category_name1; ?></a></li>
             
               <?php } ?>
              <?php if(isset($category_name2)) { ?>
              <li class=" <?php if(!isset($category_name1)) { echo "active"; } ?>"><a data-toggle="tab" href="#tab-2"><?php echo $category_name2; ?></a></li>
               <?php } ?>
             
              <?php if(isset($category_name3)) { ?>
              <li class="<?php if(!isset($category_name1) && !isset($category_name2)) { echo "active"; } ?>"><a data-toggle="tab" href="#tab-3" class="active"><?php echo $category_name3; ?></a></li>
              
              <?php } ?>
               <?php if(isset($category_name4)) { ?>
              <li class="<?php if(!isset($category_name1) && !isset($category_name2) && !isset($category_name3)) { echo "active"; } ?>"><a data-toggle="tab" href="#tab-4" class="active"><?php echo $category_name4; ?></a></li>
              <?php } ?>
            
            </ul>
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <div class="product-bestseller">
          <div class="product-bestseller-content">
            <div class="product-bestseller-list">
              <div class="tab-container"> 
                <!-- tab product -->
                 <?php if($categorywise_products1){ ?>
                <div class="tab-panel <?php if(isset($category_name1)) { echo "active"; } ?>" id="tab-1">
                  <div class="category-products">
                    <ul class="products-grid">
                      <?php $j=0; foreach ($categorywise_products1 as $product) { ?>
                      <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
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
                          <?php if($thmsoftcrocus_quickview_button == 1) { ?>
                        <li>
                          <a href="index.php?route=product/quickview&amp;product_id=<?php echo $product['product_id']; ?>;" class="link-quickview" data-name="<?php echo $product['name']; ?>"><?php //echo $text_quickview; ?></a>
                        </li>
                         <?php  } ?> 
                        <li>
                          <a onclick="thm_hm_wishlist.add('<?php echo $product['product_id']; ?>');" class="link-wishlist"><?php //echo $text_wishlist; ?></a> 
                        </li>
                        <li>
                            <a class="link-compare"  onclick="thm_hm_compare.add('<?php echo $product['product_id']; ?>');"><?php //echo $text_compare; ?></a>
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
                                

                            <div class="item-content">
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
                </li>
                    <?php  } ?> 
                    </ul>
                  </div>
                </div>
                <?php } else { ?>
                 <div class="tab-panel <?php if(isset($category_name1)) { echo "active"; } ?>" id="tab-1">
                  <?php echo $no_product_found; ?>
                 </div>
                <?php } ?>

                 <?php if($categorywise_products2){ ?>
                <!-- tab product -->
                <div class="tab-panel <?php if(!isset($category_name1)) { echo "active"; } ?>" id="tab-2">
                  <div class="category-products">
                    <ul class="products-grid">
                                            <?php $j=0; foreach ($categorywise_products2 as $product) { ?>
                      <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
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
                          <?php if($thmsoftcrocus_quickview_button == 1) { ?>
                        <li>
                          <a href="index.php?route=product/quickview&amp;product_id=<?php echo $product['product_id']; ?>;" class="link-quickview" data-name="<?php echo $product['name']; ?>"><?php //echo $text_quickview; ?></a>
                        </li>
                         <?php  } ?> 
                        <li>
                          <a onclick="thm_hm_wishlist.add('<?php echo $product['product_id']; ?>');" class="link-wishlist"><?php //echo $text_wishlist; ?></a> 
                        </li>
                        <li>
                            <a class="link-compare"  onclick="thm_hm_compare.add('<?php echo $product['product_id']; ?>');"><?php //echo $text_compare; ?></a>
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
                                                        

                            <div class="item-content">
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
                </li>
                    <?php  } ?> 
                    </ul>
                  </div>
                </div>
                 <?php } else { ?>
                  <div class="tab-panel <?php if(!isset($category_name1)) { echo "active"; } ?>" id="tab-2">
                  <?php echo $no_product_found; ?>
                 </div>
                <?php } ?>
                 <?php if($categorywise_products3){ ?>
                <div class="tab-panel <?php if(!isset($category_name1) && !isset($category_name2)) { echo "active"; } ?>" id="tab-3">
                  <div class="category-products">
                    <ul class="products-grid">
                                            <?php $j=0; foreach ($categorywise_products3 as $product) { ?>
                      <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
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
                          <?php if($thmsoftcrocus_quickview_button == 1) { ?>
                        <li>
                          <a href="index.php?route=product/quickview&amp;product_id=<?php echo $product['product_id']; ?>;" class="link-quickview" data-name="<?php echo $product['name']; ?>"><?php //echo $text_quickview; ?></a>
                        </li>
                         <?php  } ?> 
                        <li>
                          <a onclick="thm_hm_wishlist.add('<?php echo $product['product_id']; ?>');" class="link-wishlist"><?php //echo $text_wishlist; ?></a> 
                        </li>
                        <li>
                            <a class="link-compare"  onclick="thm_hm_compare.add('<?php echo $product['product_id']; ?>');"><?php //echo $text_compare; ?></a>
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
                                                        

                            <div class="item-content">
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
                </li>
                    <?php  } ?> 
                    </ul>
                  </div>
                </div>
                 <?php } else { ?>
                 <div class="tab-panel <?php if(!isset($category_name1) && !isset($category_name2)) { echo "active"; } ?>" id="tab-3">
                  <?php echo $no_product_found; ?>
                 </div>
                <?php } ?>
                 <?php if($categorywise_products4){ ?>
                <div class="tab-panel <?php if(!isset($category_name1) && !isset($category_name2) && !isset($category_name3)) { echo "active"; } ?>" id="tab-4"> 
                   <div class="category-products">
                    <ul class="products-grid">
                                            <?php $j=0; foreach ($categorywise_products4 as $product) { ?>
                      <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
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
                          <?php if($thmsoftcrocus_quickview_button == 1) { ?>
                        <li>
                          <a href="index.php?route=product/quickview&amp;product_id=<?php echo $product['product_id']; ?>;" class="link-quickview" data-name="<?php echo $product['name']; ?>"><?php //echo $text_quickview; ?></a>
                        </li>
                         <?php  } ?> 
                        <li>
                          <a onclick="thm_hm_wishlist.add('<?php echo $product['product_id']; ?>');" class="link-wishlist"><?php //echo $text_wishlist; ?></a> 
                        </li>
                        <li>
                            <a class="link-compare"  onclick="thm_hm_compare.add('<?php echo $product['product_id']; ?>');"><?php //echo $text_compare; ?></a>
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
                                                        

                            <div class="item-content">
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
                </li>
                    <?php  } ?> 
                    </ul>
                  </div>
                </div>
                 <?php } else { ?>
                 <div class="tab-panel <?php if(!isset($category_name1) && !isset($category_name2) && !isset($category_name3)) { echo "active"; } ?>" id="tab-4"> 
                  <?php echo $no_product_found; ?>
                 </div>
                <?php } ?>
                
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>
</div>
</div>