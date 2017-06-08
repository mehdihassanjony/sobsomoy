<?php echo $header; ?>
<div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <?php $b_i=0; $b_cnt=count($breadcrumbs); foreach ($breadcrumbs as $breadcrumb) { ?>
            <li><?php if($b_i!=0) {?><span>/</span><?php } ?>
              <?php if($b_i==($b_cnt-1)){ ?>
              <strong><?php echo $breadcrumb['text']; ?></strong><?php } 
              else { ?>
              <a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
              <?php }?>
            </li>
            <?php $b_i++ ;} ?>

          </ul>
        </div>
      </div>
    </div>
</div>
<section class="main-container col1-layout">
<div class="main" id="content">
<div class="container">
  <div class="row"><?php echo $column_left; ?>
   
    <?php echo $content_top; ?>
     
    <div class="col-main">
    <div class="product-view">
      <div class="product-essential">     
       
          <?php if ($thumb || $images) { ?>
          <div class="product-img-box col-lg-4 col-sm-4 col-xs-12">
              <?php if($thmsoftcrocus_sale_label==1) { 
                        if ($price && $special) { ?>
                       <div class="new-label new-top-left"><?php echo $thmsoftcrocus_sale_labeltitle; ?></div>
              <?php } }  ?>
              <div class="product-image">
                <div class="product-full"> <img id="product-zoom" src="<?php echo $popup; ?>" data-zoom-image="<?php echo $popup; ?>"/> 
                </div>
                <?php if ($images || $thumb) { ?>
                    <div class="more-views">
                      <div class="slider-items-products">
                         <div id="gallery_01" class="product-flexslider hidden-buttons product-img-thumb">
                           <div class="slider-items slider-width-col4 block-content">
                            
                            <?php if ($thumb) { ?>
                             <div class="more-views-items"> <a href="<?php echo $popup; ?>" data-image="<?php echo $popup; ?>" data-zoom-image="<?php echo $popup; ?>"> <img id="product-zoom"  src="<?php echo $popup; ?>" /> </a></div>
                            <?php } ?>
                            
                            <?php foreach ($images as $image) { ?>
                               <div class="more-views-items"> <a href="<?php echo $image['popup']; ?>" data-image="<?php echo $image['popup']; ?>" data-zoom-image="<?php echo $image['popup']; ?>"> <img id="product-zoom"  src="<?php echo $image['popup']; ?>" /> </a></div>
                            <?php } ?>
                            
                          </div>
                        </div>
                      </div>
                    </div>
              <?php } ?>
              </div>
          </div><!-- product-img-box col-lg-6 col-sm-6 col-xs-12 -->
          <?php } ?>
          <div class="product-shop col-lg-5 col-sm-5 col-xs-12">
            <div class="product-name">
              <h1><?php echo $heading_title; ?></h1>
            </div> 
            <?php if ($review_status) { ?>
              <div class="ratings">
                <div class="rating-box">
                  <div class="rating">
                  <?php for ($i = 1; $i <= 5; $i++) { ?>
                  <?php if ($rating < $i) { ?>
                  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                  <?php } else { ?>
                  <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                  <?php } ?>
                  <?php } ?>
                  </div>
                </div>

                <p class="rating-links">
                  <a href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><?php echo $reviews; ?></a>
                  <span class="separator">|</span> 
                  <a href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><?php echo $text_write; ?></a>
                </p>
              </div><!-- ratings -->
              <?php } ?>
              <?php if ($price) { ?>
                <div class="price-block">
                <div class="price-box">
                  <?php if (!$special) { ?>
                  <p class="regular-price"><span class="price"><?php echo $price; ?></span></p>
                  
                  <?php } else {?>
                  <p class="special-price"><span class="price"><?php echo $special; ?></span></p>
                    <p class="old-price"><span class="price"><?php echo $price; ?></span></p>                  
                  <?php } ?>
                    <p class="availability in-stock"><span><?php echo $stock; ?></span></p>
                </div>
                </div>                
                <ul class="list-unstyled">
                <?php if ($tax) { ?>
                <li><span><?php echo $text_tax; ?></span> <?php echo $tax; ?></li>
                <?php } ?>
                <?php if ($points) { ?>
                <li><span><?php echo $text_points; ?> </span><?php echo $points; ?></li>
                <?php } ?>
                <?php if ($discounts) { ?>
                <li>
                <hr>
                </li>
                <?php foreach ($discounts as $discount) { ?>
                <li><span><?php echo $discount['quantity']; ?><?php echo $text_discount; ?></span><?php echo $discount['price']; ?></li>
                <?php } ?>
                <?php } ?>
                </ul>
                <?php } else {?>
                <p class="availability in-stock"><span><?php echo $stock; ?></span></p>
            <?php } ?>
            <ul class="list-unstyled">
              <?php if ($manufacturer) { ?>
              <li><?php echo $text_manufacturer; ?> <a href="<?php echo $manufacturers; ?>"><?php echo $manufacturer; ?></a></li>
              <?php } ?>
              <li><?php echo $text_model; ?> <?php echo $model; ?></li>
              <?php if ($reward) { ?>
              <li><?php echo $text_reward; ?> <?php echo $reward; ?></li>
              <?php } ?>             
            </ul>
            <div id="product">
            <?php if ($options) { ?>
            <hr>
            <h3><?php echo $text_option; ?></h3>
            <?php foreach ($options as $option) { ?>
            <?php if ($option['type'] == 'select') { ?>
            <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
              <label class="control-label" for="input-option<?php echo $option['product_option_id']; ?>"><?php echo $option['name']; ?></label>
              <select name="option[<?php echo $option['product_option_id']; ?>]" id="input-option<?php echo $option['product_option_id']; ?>" class="form-control">
                <option value=""><?php echo $text_select; ?></option>
                <?php foreach ($option['product_option_value'] as $option_value) { ?>
                <option value="<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
                <?php if ($option_value['price']) { ?>
                (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
                <?php } ?>
                </option>
                <?php } ?>
              </select>
            </div>
            <?php } ?>
            <?php if ($option['type'] == 'radio') { ?>
            <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
              <label class="control-label"><?php echo $option['name']; ?></label>
              <div id="input-option<?php echo $option['product_option_id']; ?>">
                <?php foreach ($option['product_option_value'] as $option_value) { ?>
                <div class="radio">
                  <label>
                    <input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" />
                    <?php if ($option_value['image']) { ?>
                    <img src="<?php echo $option_value['image']; ?>" alt="<?php echo $option_value['name'] . ($option_value['price'] ? ' ' . $option_value['price_prefix'] . $option_value['price'] : ''); ?>" class="img-thumbnail" /> 
                    <?php } ?>                    
                    <?php echo $option_value['name']; ?>
                    <?php if ($option_value['price']) { ?>
                    (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
                    <?php } ?>
                  </label>
                </div>
                <?php } ?>
              </div>
            </div>
            <?php } ?>
            <?php if ($option['type'] == 'checkbox') { ?>
            <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
              <label class="control-label"><?php echo $option['name']; ?></label>
              <div id="input-option<?php echo $option['product_option_id']; ?>">
                <?php foreach ($option['product_option_value'] as $option_value) { ?>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="option[<?php echo $option['product_option_id']; ?>][]" value="<?php echo $option_value['product_option_value_id']; ?>" />
                    <?php if ($option_value['image']) { ?>
                    <img src="<?php echo $option_value['image']; ?>" alt="<?php echo $option_value['name'] . ($option_value['price'] ? ' ' . $option_value['price_prefix'] . $option_value['price'] : ''); ?>" class="img-thumbnail" /> 
                    <?php } ?>
                    <?php echo $option_value['name']; ?>
                    <?php if ($option_value['price']) { ?>
                    (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
                    <?php } ?>
                  </label>
                </div>
                <?php } ?>
              </div>
            </div>
            <?php } ?>
            <?php if ($option['type'] == 'text') { ?>
            <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
              <label class="control-label" for="input-option<?php echo $option['product_option_id']; ?>"><?php echo $option['name']; ?></label>
              <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['value']; ?>" placeholder="<?php echo $option['name']; ?>" id="input-option<?php echo $option['product_option_id']; ?>" class="form-control" />
            </div>
            <?php } ?>
            <?php if ($option['type'] == 'textarea') { ?>
            <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
              <label class="control-label" for="input-option<?php echo $option['product_option_id']; ?>"><?php echo $option['name']; ?></label>
              <textarea name="option[<?php echo $option['product_option_id']; ?>]" rows="5" placeholder="<?php echo $option['name']; ?>" id="input-option<?php echo $option['product_option_id']; ?>" class="form-control"><?php echo $option['value']; ?></textarea>
            </div>
            <?php } ?>
            <?php if ($option['type'] == 'file') { ?>
            <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
              <label class="control-label"><?php echo $option['name']; ?></label>
              <button type="button" id="button-upload<?php echo $option['product_option_id']; ?>" data-loading-text="<?php echo $text_loading; ?>" class="btn btn-default btn-block"><i class="fa fa-upload"></i> <?php echo $button_upload; ?></button>
              <input type="hidden" name="option[<?php echo $option['product_option_id']; ?>]" value="" id="input-option<?php echo $option['product_option_id']; ?>" />
            </div>
            <?php } ?>
            <?php if ($option['type'] == 'date') { ?>
            <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
              <label class="control-label" for="input-option<?php echo $option['product_option_id']; ?>"><?php echo $option['name']; ?></label>
              <div class="input-group date">
                <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['value']; ?>" data-date-format="YYYY-MM-DD" id="input-option<?php echo $option['product_option_id']; ?>" class="form-control" />
                <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                </span></div>
            </div>
            <?php } ?>
            <?php if ($option['type'] == 'datetime') { ?>
            <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
              <label class="control-label" for="input-option<?php echo $option['product_option_id']; ?>"><?php echo $option['name']; ?></label>
              <div class="input-group datetime">
                <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['value']; ?>" data-date-format="YYYY-MM-DD HH:mm" id="input-option<?php echo $option['product_option_id']; ?>" class="form-control" />
                <span class="input-group-btn">
                <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                </span></div>
            </div>
            <?php } ?>
            <?php if ($option['type'] == 'time') { ?>
            <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
              <label class="control-label" for="input-option<?php echo $option['product_option_id']; ?>"><?php echo $option['name']; ?></label>
              <div class="input-group time">
                <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['value']; ?>" data-date-format="HH:mm" id="input-option<?php echo $option['product_option_id']; ?>" class="form-control" />
                <span class="input-group-btn">
                <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                </span></div>
            </div>
            <?php } ?>
            <?php } ?>
            <?php } ?>
            <?php if ($recurrings) { ?>
            <hr>
            <h3><?php echo $text_payment_recurring; ?></h3>
            <div class="form-group required">
              <select name="recurring_id" class="form-control">
                <option value=""><?php echo $text_select; ?></option>
                <?php foreach ($recurrings as $recurring) { ?>
                <option value="<?php echo $recurring['recurring_id']; ?>"><?php echo $recurring['name']; ?></option>
                <?php } ?>
              </select>
              <div class="help-block" id="recurring-description"></div>
            </div>
            <?php } ?>
            <?php /* ?>
            <div class="form-group">
              <label class="control-label" for="input-quantity"><?php echo $entry_qty; ?></label>
              <input type="text" name="quantity" value="<?php echo $minimum; ?>" size="2" id="input-quantity" class="form-control" />
              <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
              <br />
              <button type="button" id="button-cart" data-loading-text="<?php echo $text_loading; ?>" class="btn btn-primary btn-lg btn-block"><?php echo $button_cart; ?></button>
            </div>
            <?php */ ?>
            <?php if ($minimum > 1) { ?>
            <div class="alert alert-info"><i class="fa fa-info-circle"></i> <?php echo $text_minimum; ?></div>
            <?php } ?>
            <div class="add-to-box">
                          
                <div class="add-to-cart">
                  <label class="control-label" for="input-quantity"><?php echo $entry_qty; ?></label>
                  <div class="pull-left">
                    <div class="custom pull-left">                   

                        <button class="reduced items-count" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty > 0 ) result.value--;return false;" type="button">
                        <i class="fa fa-minus"> </i>
                        </button>
                        <input type="text" name="quantity" value="<?php echo $minimum; ?>" size="2" id="qty" class="input-text qty" maxlength="12"/>
                        <button class="increase items-count" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" type="button">
                        <i class="fa fa-plus"> </i>
                        </button>
                                            
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
                    </div>
                    </div> 

                    <div class="pull-left">
                      <button type="button" id="button-cart" data-loading-text="<?php echo $text_loading; ?>" class="button btn-cart"><span><?php echo $button_cart; ?></span></button>
                    </div>
                  
                </div>
                
              <div class="email-addto-box">
              <ul class="add-to-links">
              <li><a class="link-wishlist" title="<?php echo $text_wishlist; ?>" onclick="thm_wishlist.add('<?php echo $product_id; ?>');">
              <span><?php echo $text_wishlist; ?></span>
              </a></li>
              <li><a class="link-compare"  title="<?php echo $button_compare; ?>" onclick="thm_compare.add('<?php echo $product_id; ?>');">
              <span><?php echo $button_compare; ?></span>
              </a></li>
              </ul>
              </div>

            </div>
             <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style" data-url="<?php echo $share; ?>"><a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a></div>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eeaf54693130e"></script>
            <!-- AddThis Button END -->

          </div> <!-- product-id -->
          </div> 
          <div class="col-lg-3 col-sm-3 col-xs-12 pro-banner">
            <img alt="banner" src="<?php echo $thmsoftcrocus_product_image; ?>">
            <div class="download-app">
            <h2>DOWNLOAD THE APP</h2>
            <img alt="banner" src="<?php echo $thmsoftcrocus_product_image1; ?>" class="app-btn">  <img alt="banner" src="<?php echo $thmsoftcrocus_product_image2; ?>" class="app-btn"></div>
          </div>

          <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
          <div class="add_info">
                          

          <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
            <li class="active"><a href="#tab-description" data-toggle="tab"><?php echo $tab_description; ?></a></li>
            <?php if ($attribute_groups) { ?>
            <li><a href="#tab-specification" data-toggle="tab"><?php echo $tab_attribute; ?></a></li>
            <?php } ?>
             <?php if ($tags) { ?>
              <li><a href="#product_tabs_tags" data-toggle="tab"><?php echo $text_tags; ?></a></li>
              <?php }?>
            <?php if ($review_status) { ?>
            <li><a href="#tab-review" data-toggle="tab"><?php echo $tab_review; ?></a></li>
            <?php } ?>
            <?php $custtabid=1; if($custom_product_tabs){
              foreach ($custom_product_tabs as $custom_product_tab) { ?>
              <?php $status= $custom_product_tab['customtab_status'] ; if($status) { ?>
            <li>
              <a href="#product_tabs_custom<?php echo $custtabid; ?>" data-toggle="tab">
              <?php echo $custom_product_tab['customtab_title'][$config_language_id]['title']; ?>
              </a>
            </li>

              <?php $custtabid++; } } } ?> 
          </ul>
          <div id="productTabContent" class="tab-content">
            <div class="tab-pane active" id="tab-description"><?php echo $description; ?></div>
            <?php if ($attribute_groups) { ?>
            <div class="tab-pane" id="tab-specification">
              <table class="table table-bordered">
                <?php foreach ($attribute_groups as $attribute_group) { ?>
                <thead>
                  <tr>
                    <td colspan="2"><strong><?php echo $attribute_group['name']; ?></strong></td>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($attribute_group['attribute'] as $attribute) { ?>
                  <tr>
                    <td><?php echo $attribute['name']; ?></td>
                    <td><?php echo $attribute['text']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
                <?php } ?>
              </table>
            </div>
            <?php } ?>
            <?php if ($tags) { ?>
            <p><?php echo $text_tags; ?>
              <?php for ($i = 0; $i < count($tags); $i++) { ?>
              <?php if ($i < (count($tags) - 1)) { ?>
              <a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>,
              <?php } else { ?>
              <a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>
              <?php } ?>
              <?php } ?>
            </p>
            <?php } ?>
            <?php if ($review_status) { ?>
            <div class="tab-pane" id="tab-review">
              <form class="form-horizontal" id="form-review">
                <div id="review"></div>
                <h2><?php echo $text_write; ?></h2>
                <?php if ($review_guest) { ?>
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label" for="input-name"><?php echo $entry_name; ?></label>
                    <input type="text" name="name" value="<?php echo $customer_name; ?>" id="input-name" class="form-control" />
                  </div>
                </div>
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label" for="input-review"><?php echo $entry_review; ?></label>
                    <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                    <div class="help-block"><?php echo $text_note; ?></div>
                  </div>
                </div>
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label"><?php echo $entry_rating; ?></label>
                    &nbsp;&nbsp;&nbsp; <?php echo $entry_bad; ?>&nbsp;
                    <input type="radio" name="rating" value="1" />
                    &nbsp;
                    <input type="radio" name="rating" value="2" />
                    &nbsp;
                    <input type="radio" name="rating" value="3" />
                    &nbsp;
                    <input type="radio" name="rating" value="4" />
                    &nbsp;
                    <input type="radio" name="rating" value="5" />
                    &nbsp;<?php echo $entry_good; ?></div>
                </div>
                <?php echo $captcha; ?>
                <div class="buttons clearfix">
                  <div class="pull-right">
                    <button type="button" id="button-review" data-loading-text="<?php echo $text_loading; ?>" class="btn btn-primary"><?php echo $button_continue; ?></button>
                  </div>
                </div>
                <?php } else { ?>
                <?php echo $text_login; ?>
                <?php } ?>
              </form>
            </div>
            <?php } ?>
             <?php $custtabid=1; if($custom_product_tabs){
            foreach ($custom_product_tabs as $custom_product_tab) { ?>
            <?php $status= $custom_product_tab['customtab_status'] ; if($status) { ?>
            <div class="tab-pane fade" id="product_tabs_custom<?php echo $custtabid; ?>">
            <?php echo html_entity_decode($custom_product_tab['customtab_description'][$config_language_id]['description']); ?>
            </div>

            <?php $custtabid++; } } } ?>  
          </div>


          </div><!-- col-sm-12 wow bounceInUp animated animated -->               
          </div><!-- product-collateral -->             
          
      
      
        
    </div><!-- product essential -->
    </div><!-- product-view -->
    </div><!-- col-main  -->


      
      
      <?php echo $content_bottom; ?>
    <?php echo $column_right; ?></div>
</div>
</div>
</section>
<?php if ($products) { ?>
 <div class="container">  
  <div class="related-pro">
      <div class="slider-items-products">
        <div class="related-block">
          <div id="related-products-slider" class="product-flexslider hidden-buttons">
            <div class="home-block-inner">
                <div class="block-title">
                   <h2><?php echo $text_related; ?> <?php echo $text_product; ?></h2>
                </div>
                <?php if($thmsoftcrocus_productpage_related_cb) { ?>
                      <?php echo html_entity_decode($thmsoftcrocus_productpage_related_cbcontent);?>
                <?php }  ?>
                 <!--  <div class="pretext"> </div>
                  <a href="<?php echo $related_list; ?>" class="view_more_bnt">View All</a> -->  
                </div>
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

                        <li>
                          <a onclick="thm_hm_wishlist.add('<?php echo $product['product_id']; ?>');" class="link-wishlist"><?php echo $text_wishlist; ?></a> 
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
</div>
<?php } ?>
<script type="text/javascript"><!--
$('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
	$.ajax({
		url: 'index.php?route=product/product/getRecurringDescription',
		type: 'post',
		data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
		dataType: 'json',
		beforeSend: function() {
			$('#recurring-description').html('');
		},
		success: function(json) {
			$('.alert, .text-danger').remove();

			if (json['success']) {
				$('#recurring-description').html(json['success']);
			}
		}
	});
});
//--></script>
<script type="text/javascript"><!--
$('#button-cart').on('click', function() {
	$.ajax({
		url: 'index.php?route=checkout/cart/add',
		type: 'post',
		data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
		dataType: 'json',
		beforeSend: function() {
			$('#button-cart').button('loading');
		},
		complete: function() {
			$('#button-cart').button('reset');
		},
		success: function(json) {
			$('.alert, .text-danger').remove();
			$('.form-group').removeClass('has-error');

			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						var element = $('#input-option' + i.replace('_', '-'));

						if (element.parent().hasClass('input-group')) {
							element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
						} else {
							element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
						}
					}
				}

				if (json['error']['recurring']) {
					$('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
				}

				// Highlight any found errors
				$('.text-danger').parent().addClass('has-error');
			}

			if (json['success']) {
				$('.breadcrumbs').after('<div class="container"><div class="alert alert-success">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div></div>');

				var myarr = [];
        var myarr = json['total'].split(" ");
        $('#cart .cart_count').text(myarr['0']);
        $('#cart .price').text($('#cart-txt-heading').attr('value') +' / '+myarr['3']);

				$('html, body').animate({ scrollTop: 0 }, 'slow');

				$('#cart > ul').load('index.php?route=common/cart/info ul li');
			}
		},
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
	});
});
//--></script>
<script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});

$('.datetime').datetimepicker({
	pickDate: true,
	pickTime: true
});

$('.time').datetimepicker({
	pickDate: false
});

$('button[id^=\'button-upload\']').on('click', function() {
	var node = this;

	$('#form-upload').remove();

	$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

	$('#form-upload input[name=\'file\']').trigger('click');

	if (typeof timer != 'undefined') {
    	clearInterval(timer);
	}

	timer = setInterval(function() {
		if ($('#form-upload input[name=\'file\']').val() != '') {
			clearInterval(timer);

			$.ajax({
				url: 'index.php?route=tool/upload',
				type: 'post',
				dataType: 'json',
				data: new FormData($('#form-upload')[0]),
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(node).button('loading');
				},
				complete: function() {
					$(node).button('reset');
				},
				success: function(json) {
					$('.text-danger').remove();

					if (json['error']) {
						$(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
					}

					if (json['success']) {
						alert(json['success']);

						$(node).parent().find('input').val(json['code']);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}, 500);
});
//--></script>
<script type="text/javascript"><!--
$('#review').delegate('.pagination a', 'click', function(e) {
    e.preventDefault();

    $('#review').fadeOut('slow');

    $('#review').load(this.href);

    $('#review').fadeIn('slow');
});

$('#review').load('index.php?route=product/product/review&product_id=<?php echo $product_id; ?>');

$('#button-review').on('click', function() {
	$.ajax({
		url: 'index.php?route=product/product/write&product_id=<?php echo $product_id; ?>',
		type: 'post',
		dataType: 'json',
		data: $("#form-review").serialize(),
		beforeSend: function() {
			$('#button-review').button('loading');
		},
		complete: function() {
			$('#button-review').button('reset');
		},
		success: function(json) {
			$('.alert-success, .alert-danger').remove();

			if (json['error']) {
				$('#review').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
			}

			if (json['success']) {
				$('#review').after('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');

				$('input[name=\'name\']').val('');
				$('textarea[name=\'text\']').val('');
				$('input[name=\'rating\']:checked').prop('checked', false);
			}
		}
	});
});

$(document).ready(function() {
	$('.thumbnails').magnificPopup({
		type:'image',
		delegate: 'a',
		gallery: {
			enabled:true
		}
	});
});
//--></script>
<?php echo $footer; ?>
