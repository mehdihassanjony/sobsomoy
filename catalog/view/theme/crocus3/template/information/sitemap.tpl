<?php echo $header; ?>
<div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <ul>
              <?php $b_i=0; $b_cnt=count($breadcrumbs); foreach ($breadcrumbs as $breadcrumb) { ?>
            <li><?php if($b_i!=0) {?> <span>/</span><?php } ?>
              <?php if($b_i==($b_cnt-1)){ ?>
              <strong><?php echo $breadcrumb['text']; ?></strong><?php } 
              else { ?>
              <a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
              <?php }?>
            </li>
            <?php $b_i++ ;} ?>
            </ul>
          </div>
          <!--col-xs-12--> 
        </div>
        <!--row--> 
      </div>
      <!--container--> 
</div>
<br>
<div class="container">
  <div class="row"><?php echo $column_left; ?>
    <?php if ($column_left && $column_right) { ?>
    <?php $class = 'col-sm-6'; ?>
    <?php } elseif ($column_left || $column_right) { ?>
    <?php $class = 'col-sm-9'; ?>
    <?php } else { ?>
    <?php $class = 'col-sm-12'; ?>
    <?php } ?>
    <div id="content" class="col-main <?php echo $class; ?>">
      <div class="cart wow bounceInUp animated">
      <?php echo $content_top; ?>
      <div class="page-title">
        <h2> <?php echo $heading_title; ?></h2>
      </div>
      <div class="row content-row">
        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-4">
          <ul class="simple-list arrow-list bold-list">
            <?php foreach ($categories as $category_1) { ?>
            <li><a href="<?php echo $category_1['href']; ?>"><?php echo $category_1['name']; ?></a>
              <?php if ($category_1['children']) { ?>
              <ul>
                <?php foreach ($category_1['children'] as $category_2) { ?>
                <li><a href="<?php echo $category_2['href']; ?>"><?php echo $category_2['name']; ?></a>
                  <?php if ($category_2['children']) { ?>
                  <ul>
                    <?php foreach ($category_2['children'] as $category_3) { ?>
                    <li><a href="<?php echo $category_3['href']; ?>"><?php echo $category_3['name']; ?></a></li>
                    <?php } ?>
                  </ul>
                  <?php } ?>
                </li>
                <?php } ?>
              </ul>
              <?php } ?>
            </li>
            <?php } ?>
          </ul>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-4">
          <ul class="simple-list arrow-list bold-list">
            <li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
            <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a>
              <ul>
                <li><a href="<?php echo $edit; ?>"><?php echo $text_edit; ?></a></li>
                <li><a href="<?php echo $password; ?>"><?php echo $text_password; ?></a></li>
                <li><a href="<?php echo $address; ?>"><?php echo $text_address; ?></a></li>
                <li><a href="<?php echo $history; ?>"><?php echo $text_history; ?></a></li>
                <li><a href="<?php echo $download; ?>"><?php echo $text_download; ?></a></li>
              </ul>
            </li>
            <li><a href="<?php echo $cart; ?>"><?php echo $text_cart; ?></a></li>
            <li><a href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a></li>
            <li><a href="<?php echo $search; ?>"><?php echo $text_search; ?></a></li>
            <li><?php echo $text_information; ?>
              <ul>
                <?php foreach ($informations as $information) { ?>
                <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
                <?php } ?>
                <li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"> <img class="img-responsive animate scale" src="catalog/view/theme/veritodemo1/image/large-icon-sitemap.png" alt=""> </div>
      </div>
     
      <?php echo $content_bottom; ?></div>
    </div>
    <?php echo $column_right; ?></div>
</div>
<?php echo $footer; ?>