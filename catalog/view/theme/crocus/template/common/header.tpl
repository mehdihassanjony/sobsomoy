<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content= "<?php echo $keywords; ?>" />
<?php } ?>
<script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
<link href="catalog/view/theme/<?php echo $thmsoft_theme ?>/stylesheet/bootstrap.min.css" rel="stylesheet" media="screen" />
<script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />

<?php global $config; ?>

<?php // external CSS thmsoft theme  ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $thmsoft_theme ?>/stylesheet/font-awesome.css" media="all">
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $thmsoft_theme ?>/stylesheet/simple-line-icons.css" media="all">
<link rel="stylesheet" href="catalog/view/theme/crocus/stylesheet/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="catalog/view/theme/crocus/stylesheet/owl.theme.css" type="text/css">
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $thmsoft_theme ?>/stylesheet/jquery.bxslider.css" >
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $thmsoft_theme ?>/stylesheet/jquery.mobile-menu.css" >
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $thmsoft_theme ?>/stylesheet/revslider.css" >


<?php foreach ($styles as $style) { ?>
<link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>

<link href="catalog/view/theme/<?php echo $thmsoft_theme ?>/stylesheet/stylesheet.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $thmsoft_theme ?>/stylesheet/style.css" media="all">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,600,500,700,800' rel='stylesheet' type='text/css'>

<?php // external js thmsoft theme  ?>
<script type="text/javascript" src="catalog/view/theme/<?php echo $thmsoft_theme ?>/js/revslider.js"></script>
<script type="text/javascript" src="catalog/view/theme/<?php echo $thmsoft_theme ?>/js/common.js"></script> 
<script type="text/javascript" src="catalog/view/theme/<?php echo $thmsoft_theme ?>/js/common1.js"></script> 
<script src="catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript" src="catalog/view/theme/<?php echo $thmsoft_theme ?>/js/jquery.mobile-menu.min.js"></script> 
<script type="text/javascript" src="catalog/view/theme/<?php echo $thmsoft_theme ?>/js/jquery.countdown.min.js"></script> 

<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<?php foreach ($scripts as $script) { ?>
<script src="<?php echo $script; ?>" type="text/javascript"></script>
<?php } ?>
<?php foreach ($analytics as $analytic) { ?>
<?php echo $analytic; ?>
<?php } ?>

<style type="text/css">

<?php if($thmsoftcrocus_fonttransform!=''){?>
body {font-family:<?php echo $thmsoftcrocus_fonttransform; ?>, sans-serif !important ;}
<?php }?>

/* sale label */
.sale-label {
background:  <?php echo "#".$thmsoftcrocus_sale_labelcolor; ?> 
}

/*Main color section */
<?php if($thmsoftcrocus_body_bg_ed==1) { ?>
body {background:<?php echo "#".$thmsoftcrocus_body_bg; ?> } <?php } ?>
<?php if($thmsoftcrocus_fontcolor_ed==1) { ?>
body {color:<?php echo "#".$thmsoftcrocus_fontcolor; ?> } <?php } ?>
<?php if($thmsoftcrocus_linkcolor_ed==1) { ?>
a,a:visited {color:<?php echo "#".$thmsoftcrocus_linkcolor; ?>} <?php } ?>
<?php if($thmsoftcrocus_linkhovercolor_ed==1) { ?>
a:hover {color:<?php echo "#".$thmsoftcrocus_linkhovercolor; ?>} <?php } ?>


/* header color section */ 
<?php if($thmsoftcrocus_headerbg_ed==1) { ?>
.header-container,.header-top { background-color: <?php echo "#".$thmsoftcrocus_headerbg; ?>;} <?php } ?>
<?php if($thmsoftcrocus_headerlinkcolor_ed==1) { ?>
.header-top .toplinks div.links div a{color:<?php echo "#".$thmsoftcrocus_headerlinkcolor; ?>;} <?php } ?>
<?php if($thmsoftcrocus_headerlinkhovercolor_ed==1) { ?>
.header-top .toplinks div.links div a:hover{color:<?php echo "#".$thmsoftcrocus_headerlinkhovercolor."! important" ?>;} <?php } ?>
<?php if($thmsoftcrocus_headerclcolor_ed==1) { ?>
#language a{color:<?php echo "#".$thmsoftcrocus_headerclcolor."! important"; ?>;} 
#currency a{color:<?php echo "#".$thmsoftcrocus_headerclcolor."! important"; ?>;} 
<?php } ?>

/*Top Menu */
/*background*/
<?php if($thmsoftcrocus_mmbgcolor_ed==1) { ?>
#nav { background:<?php echo "#".$thmsoftcrocus_mmbgcolor; ?> } 
.nav-inner:before { border-right:25px solid <?php echo "#".$thmsoftcrocus_mmbgcolor; ?> }
.nav-inner:after { border-left:25px solid <?php echo "#".$thmsoftcrocus_mmbgcolor; ?> }
<?php } ?>
/*main menu links*/
<?php if($thmsoftcrocus_mmlinkscolor_ed==1) { ?>
#nav > li > a{ color:<?php echo "#".$thmsoftcrocus_mmlinkscolor; ?>; } <?php } ?>
/*main menu link hover*/
<?php if($thmsoftcrocus_mmlinkshovercolor_ed==1) { ?>
#nav > li > a:hover:nth-child(1), #nav > li > a.active:nth-child(1){color:<?php echo "#".$thmsoftcrocus_mmlinkshovercolor."! important"; ?>} <?php } ?>
<?php if($thmsoftcrocus_mmslinkscolor_ed==1) { ?>
#nav ul.level0 > li > a{color:<?php echo "#".$thmsoftcrocus_mmslinkscolor; ?>} <?php } ?>
/*sub links hover*/
<?php if($thmsoftcrocus_mmslinkshovercolor_ed==1) { ?>
#nav ul li a:hover{color:<?php echo "#".$thmsoftcrocus_mmslinkshovercolor; ?> } <?php } ?> 

/*buttons*/
<?php if($thmsoftcrocus_buttoncolor_ed==1) { ?>
button.button,.btn{background-color:<?php echo "#".$thmsoftcrocus_buttoncolor."! important"; ?> } <?php } ?>
<?php if($thmsoftcrocus_buttonhovercolor_ed==1) { ?>
button.button:hover,.btn:hover{background-color: <?php echo "#".$thmsoftcrocus_buttonhovercolor."! important"; ?>} <?php } ?>


/*price*/
<?php if($thmsoftcrocus_pricecolor_ed==1) { ?>
.regular-price .price{ color:<?php echo "#".$thmsoftcrocus_pricecolor; ?> } <?php } ?>
<?php if($thmsoftcrocus_oldpricecolor_ed==1) { ?>
.old-price .price{ color:<?php echo "#".$thmsoftcrocus_oldpricecolor."! important"; ?> } <?php } ?>
<?php if($thmsoftcrocus_newpricecolor_ed==1) { ?>
.special-price .price{ color:<?php echo "#".$thmsoftcrocus_newpricecolor; ?> } <?php } ?>

/*footer*/
<?php if($thmsoftcrocus_footerbg_ed==1) { ?>
footer{background:<?php echo "#".$thmsoftcrocus_footerbg; ?> } <?php } ?>
<?php if($thmsoftcrocus_footerlinkcolor_ed==1) { ?>
footer a{color: <?php echo "#".$thmsoftcrocus_footerlinkcolor."! important"; ?>} 
<?php } ?>
<?php if($thmsoftcrocus_footerlinkhovercolor_ed==1) { ?>
footer a:hover{color: <?php echo "#".$thmsoftcrocus_footerlinkhovercolor."! important"; ?>} <?php } ?>
<?php if($thmsoftcrocus_powerbycolor_ed==1) { ?>
footer .coppyright{color: <?php echo "#".$thmsoftcrocus_powerbycolor; ?>} <?php } ?>
</style>
</head>
<body class="<?php echo $class; ?> ">
<div id="page">
<header>
<div class="header-container">
      <div class="header-top">
       <div class="container">
            <div class="row">

               <div class="col-xs-12 col-sm-6">
                        <?php echo $language; ?>
                        <?php echo $currency; ?>
                        <div class="welcome-msg">
                         <?php if (!$logged) { ?>
                          <p><?php echo $text_welcome; ?></p>
                          <?php } else { ?>
                          <p><?php echo $text_logged; ?></p>
                          <?php } ?>  
                        </div>
              </div>

           <div class="col-xs-6 hidden-xs"> 
               <div class="toplinks">
                <div class="links">
                      <div class="myaccount"><a href="<?php echo $account; ?>" title="<?php echo $text_account; ?>"><span class="hidden-xs"><?php echo $text_account; ?></span></a></div>
                      <div class="check"><a href="<?php echo $checkout; ?>" title="<?php echo $text_checkout; ?>"><span class="hidden-xs"><?php echo $text_checkout; ?></span></a></div>
                       <?php  if($thmsoftblog_status==1){ ?>
                      <div class="demo"> <a title="<?php echo $text_blog ?>" href="<?php echo $blog_href;?>"><span class="hidden-xs"><?php echo $text_blog ?></span></a></div><?php } ?> 
                      <!-- Header Company -->                     
                      <!--div class="dropdown block-company-wrapper hidden-xs"> <a role="button" data-toggle="dropdown" data-target="#" class="block-company dropdown-toggle" href="#"> <?php echo $text_information; ?> <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                          
                            <?php $i=0;$cnt=count($informations); foreach ($informations as $information) { ?>
                                <li role="presentation"><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
                                <?php $i++;} ?>
                          </ul>
                      </div-->
                      <!-- End Header Company -->
                      <div class="login">  <?php if (!$logged) { ?>
                      <a href="<?php echo $login; ?>"><span class="hidden-xs"><?php echo $text_login; ?></span></a>

                      <?php }  else { ?>
                      <a href="<?php echo $logout; ?>"><span class="hidden-xs"><?php echo $text_logout; ?></span></a>
                      <?php } ?></div>
                </div>
               </div>
              </div>

    </div>
    </div>
    </div><!-- end header top -->
     <div class="container"> 
       <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-block"> 
          <!-- Header Logo -->         
          <?php if ($logo) { ?>
              <div class="logo">  <a href="<?php echo $home; ?>" title="<?php echo $name; ?>">
                  <img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>"/>
                </a></div>
          <?php } else { ?>
                <div class="logo"><h1><a href="<?php echo $home; ?>"><?php echo $name; ?></a></h1></div>
           <?php } ?>
        </div>
        <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12 hidden-xs">
               <!-- search col -->
               <div class="search-box">
                  <div id="search_mini_form">
                        <?php echo $search; ?>   
                  </div>
               </div>
              <!-- search col -->          
        </div>
         <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 thm-top-cart">
              <a href="<?php echo $compare_href; ?>" class="top-link-compare hidden-xs"><i class="compare"></i></a>
              <a href="<?php echo $wishlist; ?>" title="My Wishlist" class="top-link-wishlist hidden-xs"><i class="fa fa-heart"></i></a>
              <div class="top-cart-contain  pull-right"> 
                <!-- Top Cart -->
                <div class="mini-cart">
                 <?php echo $cart; ?>
                </div>
                <!-- Top Cart -->
                <div id="ajaxconfig_info" style="display:none"><a href="#/"></a>
                  <input value="" type="hidden">
                  <input id="enable_module" value="1" type="hidden">
                  <input class="effect_to_cart" value="1" type="hidden">
                  <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
                </div>
              </div>
        </div>
       </div>
     </div>
  </div><!-- end header cointainer -->


<?php 
$cat_id=$cat_id;
$cbim=$cbim_data;


if (function_exists('search')) {}
else {
function search($array, $key, $value)
{
    $results = array();

    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, search($subarray, $key, $value));
        }
    }

    return $results;
}
}
if($cbim=='' || $cbim==null){$cbim=0;}
?>
<nav>
<div class="container">
<div class="mm-toggle-wrap">
  <div class="mm-toggle"><i class="fa fa-align-justify"></i><span class="mm-label"><?php echo $text_menu;?></span> </div>
</div>
<div class="nav-inner">
   <ul class="hidden-xs" id="nav">
    <?php if($thmsoftcrocus_home_option==1){ ?>
    <li id="nav-home" class="level0 parent drop-menu"> <a class="level-top" href="<?php echo $home;?>"> <span><?php echo $text_home;?></span> </a>
    </li><?php }?>
    <?php foreach ($categories1 as $category) { $mclass='';  $mclass1=''; ?>
    <li  class="mega-menu">
      <a href="<?php echo $category['href']; ?>" class="level-top">
      <span><?php echo $category['name']; ?></span>  
      </a>
      <?php if($category['category_id']==$cat_id) {?>
      <script>jQuery("#nav-home").removeClass('active');
      </script>
      <?php }?>
      <?php if ($category['children']) { ?>
      <div class="level0-wrapper dropdown-6col" style="left: 0px; display: none;">
        <div class="container">
      <div class="level0-wrapper2">

        
        <?php $customDataMenu=search($cbim['custom_menu_content'], 'category_id', $category['category_id']); ?>

         
         <?php 
          if(isset($customDataMenu[0]['leftcontent'])) { 
              if($customDataMenu[0]['leftcontent']!='') {
                 $mclass='col-1'; 
              }
              elseif($customDataMenu[0]['leftcontent']=='') {
                $mclass=''; 
              }
          }     
          
          if(isset($customDataMenu[0]['rightcontent'])) { 
              if($customDataMenu[0]['rightcontent']!='') {
                 $pclass='nav-block nav-block-center grid12-8 itemgrid itemgrid-4col'; 
              }
              elseif($customDataMenu[0]['rightcontent']=='') {
                $pclass='nav-block nav-block-center'; 
              }
          }

          ?>    
            
           <!-- top Menu images -->
          <?php if(isset($customDataMenu[0]['topcontent'])) { ?>
          <?php if($customDataMenu[0]['topcontent']!='') { ?>
          <div class="nav-add">  
          <?php echo html_entity_decode($customDataMenu[0]['topcontent']); ?>
          </div>
          <?php } } ?>
            
          <div class="<?php echo $pclass; ?>"> 

           <!-- left Menu images -->
              <?php if(isset($customDataMenu[0]['leftcontent'])) {  ?>
              <?php if($customDataMenu[0]['leftcontent']!='') {  ?>
                <div class="col-2">
                  <div class="menu_image1">
                <?php echo html_entity_decode($customDataMenu[0]['leftcontent']); ?>
              </div>
              </div>
              <?php } } ?> 


          <div class="<?php echo $mclass;?>">

           <?php for ($i = 0; $i < count($category['children']);) { ?>
             
              <ul class="level0">
              <?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
              <?php for (; $i < $j; $i++) { ?>
              <?php if (isset($category['children'][$i])) { ?>
              <li class="level1 nav-6-1 parent item">
                 <?php 
                if(!empty($subcatimgs)) {
                $subThumb=search($subcatimgs, 'category_id', $category['children'][$i]['category_id']);             
                if(!empty($subThumb)) { ?> 
                <div class="cat-img"><a title="" href="#"><img  alt="product-image" src="<?php echo $this->model_tool_image->resize($subThumb[0]['image'], 200, 100) ; ?>"></a></div>   
                <?php }
                } ?>
                
              <a href="<?php echo $category['children'][$i]['href']; ?>"><span><?php echo $category['children'][$i]['name']; ?></span></a>
              <?php //print_r($category['children'][$i]['child2']);
              if(count($category['children'][$i]['children']) )
              {?>
              <ul class="level1">

              <?php for($m=0;$m<count($category['children'][$i]['children']);$m++){
              ?>
              <li class="level2 nav-6-1-1"><a href="<?php echo $category['children'][$i]['children'][$m]['href'];?>"><span><?php echo $category['children'][$i]['children'][$m]['name']?></span></a></li>
              <?php  }?>
              </ul>
              <?php }?>

               
              </li>
              <?php } ?>
              <?php } ?>
              </ul>

              <?php } ?>  

          </div><!-- level -->

           <!-- bottom Menu images -->
          <?php if(isset($customDataMenu[0]['bottomcontent'])) { ?>
          <?php if($customDataMenu[0]['bottomcontent']!='') { ?>
          <div class="nav-add">  
          <?php echo html_entity_decode($customDataMenu[0]['bottomcontent']); ?>
          </div>
          <?php } } ?>

           
           
        </div> <!--nav-block nav-block-center--> 
           
        <!-- Right Menu images -->
          <?php if(isset($customDataMenu[0]['rightcontent'])) {  ?>
          <?php if($customDataMenu[0]['rightcontent']!='') {  ?>
            <div class="nav-block nav-block-right std grid12-4">
              <div class="menu_image1">
            <?php echo html_entity_decode($customDataMenu[0]['rightcontent']); ?>
          </div>
          </div>
          <?php } } ?>  

     
          
      </div>  <!-- level0-wrapper2 -->
    </div><!-- container -->


      </div>
      <?php } ?>
    </li>
    <?php } ?>
    <!-- Custom menu -->
    <?php if($thmsoftcrocus_menubar_cb== 1 )
    {
      if($thmsoftcrocus_menubar_cbtitle && $thmsoftcrocus_menubar_cbcontent)
         echo '<li class="nav-custom-link mega-menu"><a class="level-top"><span>'.$thmsoftcrocus_menubar_cbtitle.'</span></a><div class="level0-wrapper custom-menu"><div class="container"><div class="header-nav-dropdown-wrapper clearer">'.$thmsoftcrocus_menubar_cbcontent.'</div></div></div></li>';
    } ?>
    </ul>

</div><!-- nav-inner -->
</div>

</nav>
</header>
 <!-- Newsletter and social widget -->
  <div class="subscribe-area hidden-xs">
    <div class="container">
      <div class="subscribe-container">
        <div class="row">
          <div class="col-md-12">           
              
           <?php
            if($newslettersubscription_status==1) { ?>
                <div class="subscribe">
                  <?php echo $newslettersubscription; ?>
                </div>
            <?php } ?>
            
            <div class="subscribe-text-link">
              <div class="subscribe-link">
                <!--ul class="social-link">                  
                  <?php if($facebookurl!='') { ?>
                    <li><a href="<?php echo $facebookurl; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <?php } ?>
                    <?php if($twitterurl!='') { ?>
                    <li><a href="<?php echo $twitterurl; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
                    <?php if($gplusurl!='') { ?>
                    <li class="googleplus pull-left"><a href="<?php echo $gplusurl; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <?php } ?>
                    <?php if($rssurl!='') { ?>
                    <li><a href="<?php echo $rssurl; ?>" target="_blank"><i class="fa fa-rss"></i></a></li>
                    <?php } ?>
                    <?php if($pintresturl!='') { ?>
                    <li><a href="<?php echo $pintresturl; ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                    <?php } ?>
                    <?php if($linkedinurl!='') { ?>
                    <li><a href="<?php echo $linkedinurl; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <?php } ?>
                    <?php /*if($youtubeurl!='') { ?>
                    <li><a href="<?php echo $youtubeurl; ?>" target="_blank"></a></li>
                    <?php }*/ ?>
                </ul-->
                <?php if($thmsoftcrocus_footer_cb) { ?>
                      <?php echo html_entity_decode($thmsoftcrocus_footer_cbcontent);?>
                <?php }  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Newsletter and social widget end--> 