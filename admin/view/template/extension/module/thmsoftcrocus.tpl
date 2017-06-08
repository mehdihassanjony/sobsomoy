<?php echo $header; ?>
<?php global $config;?>
<!-- <script type="text/javascript" src="view/javascript/colorpicker/colorpicker-color.js"></script>
<script type="text/javascript" src="view/javascript/colorpicker/colorpicker.js"></script> -->
<link rel="stylesheet" href="view/javascript/colorpicker/bootstrap-3.0.0.min.css">
<link rel="stylesheet" href="view/javascript/colorpicker/pick-a-color-1.2.3.min.css">
<link rel="stylesheet" href="view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css">



<style type="text/css">
.heading{
color: #279882;
font-size: 24px!important;
}
.thead{
color: #e74c3c!important;
font-weight: bold;
text-transform: uppercase
}
</style>

<?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-thmsoftcrocus" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-thmsoftcrocus" class="form-horizontal">
          

 <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
<li class="active"><a href="#general" data-toggle="tab">General</a></li>
<li><a href="#colors" data-toggle="tab">Colors</a></li>
<li><a href="#fonts" data-toggle="tab">Fonts</a></li>
<li><a href="#footer" data-toggle="tab">Footer</a></li>
<li><a href="#support" data-toggle="tab">Support</a></li>
</ul>
<div id="my-tab-content" class="tab-content">
<div class="tab-pane active" id="general">
<br>
  <b class="heading">GENERAL THEME SETTINGS</b><hr>
   

    <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_home_option">Home option in menu:</label>
            <div class="col-sm-10">
              <select name="thmsoftcrocus_home_option" id="input-thmsoftcrocus_home_option" class="form-control">
                <?php if ($thmsoftcrocus_home_option) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          


      <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_quickview_button">Product's Quick View:</label>
            <div class="col-sm-10">
              <select name="thmsoftcrocus_quickview_button" id="input-thmsoftcrocus_quickview_button" class="form-control">
                <?php if ($thmsoftcrocus_quickview_button) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          

        <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_scroll_totop">Show scroll to top button:</label>
            <div class="col-sm-10">
              <select name="thmsoftcrocus_scroll_totop" id="input-thmsoftcrocus_scroll_totop" class="form-control">
                <?php if ($thmsoftcrocus_scroll_totop) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

 <?php /*
        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-thmsoftcrocus_animation_effect">Animation Effect:</label>
        <div class="col-sm-10">
        <select name="thmsoftcrocus_animation_effect" id="input-thmsoftcrocus_animation_effect" class="form-control">
        <?php if ($thmsoftcrocus_animation_effect) { ?>
        <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
        <option value="0"><?php echo $text_disabled; ?></option>
        <?php } else { ?>
        <option value="1"><?php echo $text_enabled; ?></option>
        <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
        <?php } ?>
        </select>
        </div>
        </div> */?>

          

                  
<hr><b class="thead">PRODUCTS "SALE" LABEL</b><hr>
        
        <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_sale_label">Show "Sale" label for products with discount:</label>
            <div class="col-sm-10">
              <select name="thmsoftcrocus_sale_label" id="input-thmsoftcrocus_sale_label" class="form-control">
                <?php if ($thmsoftcrocus_sale_label) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>



          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_sale_labeltitle">Sale label title:</label>
            <div class="col-sm-10">
            <input name="thmsoftcrocus_sale_labeltitle" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_sale_labeltitle; ?>" class="form-control"/>
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_sale_labelcolor">Sale label color:</label>
            <div class="col-sm-10">
            <input name="thmsoftcrocus_sale_labelcolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_sale_labelcolor; ?>" class="pick-a-color form-control"/>
            </div>
          </div>


<?php /* ?>
<hr><b class="thead">HEADER CUSTOM BLOCK</b><hr>

       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_headercb_ed">Enable custom Block:</label>
            <div class="col-sm-10">
              <select name="thmsoftcrocus_headercb_ed" id="input-thmsoftcrocus_headercb_ed" class="form-control">
                <?php if ($thmsoftcrocus_headercb_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>



          <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-thmsoftcrocus_headercb_content">Block content:</label>
                  <div class="col-sm-10">
                    <textarea name="thmsoftcrocus_headercb_content" placeholder="Enetr text here" id="input-thmsoftcrocus_headercb_content" class="form-control"><?php echo $thmsoftcrocus_headercb_content; ?></textarea>
                  </div>
                </div>
          <script type="text/javascript">
          $('#input-thmsoftcrocus_headercb_content').summernote({height: 300});
          </script>  
<?php */ ?>
<?php ?>
<hr><b class="thead">MENUBAR CUSTOM BLOCK</b><hr>

       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_menubar_cb">Enable custom Block:</label>
            <div class="col-sm-10">
              <select name="thmsoftcrocus_menubar_cb" id="input-thmsoftcrocus_menubar_cb" class="form-control">
                <?php if ($thmsoftcrocus_menubar_cb) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>



          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_menubar_cbtitle">Block title:</label>
            <div class="col-sm-10">
            <input name="thmsoftcrocus_menubar_cbtitle" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_menubar_cbtitle; ?>" class="form-control"/>
            </div>
          </div>


          <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-thmsoftcrocus_menubar_cbcontent">Block content:</label>
                  <div class="col-sm-10">
                    <textarea name="thmsoftcrocus_menubar_cbcontent" placeholder="Enetr text here" id="input-thmsoftcrocus_menubar_cbcontent" class="form-control summernote"><?php echo $thmsoftcrocus_menubar_cbcontent; ?></textarea>
                  </div>
                </div>
          <script type="text/javascript">
          $('#input-thmsoftcrocus_menubar_cbcontent').summernote({height: 300});
          </script>  

<?php  ?>
<?php /* ?>
<hr><b class="thead">VERTICAL MENUBAR CUSTOM BLOCK</b><hr>

       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_vmenubar_cb">Enable custom Block:</label>
            <div class="col-sm-10">
              <select name="thmsoftcrocus_vmenubar_cb" id="input-thmsoftcrocus_vmenubar_cb" class="form-control">
                <?php if ($thmsoftcrocus_vmenubar_cb) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>



          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_vmenubar_cbtitle">Block title:</label>
            <div class="col-sm-10">
            <input name="thmsoftcrocus_vmenubar_cbtitle" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_vmenubar_cbtitle; ?>" class="form-control"/>
            </div>
          </div>


          <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-thmsoftcrocus_vmenubar_cbcontent">Block content:</label>
                  <div class="col-sm-10">
                    <textarea name="thmsoftcrocus_vmenubar_cbcontent" placeholder="Enetr text here" id="input-thmsoftcrocus_vmenubar_cbcontent" class="form-control"><?php echo $thmsoftcrocus_vmenubar_cbcontent; ?></textarea>
                  </div>
                </div>
          <script type="text/javascript">
          $('#input-thmsoftcrocus_vmenubar_cbcontent').summernote({height: 300});
          </script>  

<?php */ ?>
<?php /* ?>
<hr><b class="thead">PRODUCT CUSTOM BLOCK</b><hr>

       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_productpage_cb">Enable custom block:</label>
            <div class="col-sm-10">
              <select name="thmsoftcrocus_productpage_cb" id="input-thmsoftcrocus_productpage_cb" class="form-control">
                <?php if ($thmsoftcrocus_productpage_cb) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>


          <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-thmsoftcrocus_productpage_cbcontent">Block Content:</label>
                  <div class="col-sm-10">
                    <textarea name="thmsoftcrocus_productpage_cbcontent" placeholder="Enetr text here" id="input-thmsoftcrocus_productpage_cbcontent" class="form-control"><?php echo $thmsoftcrocus_productpage_cbcontent; ?></textarea>
                  </div>
                </div>
        <script type="text/javascript">
        $('#input-thmsoftcrocus_productpage_cbcontent').summernote({height: 300});
        </script>
        <?php */  ?>

 <?php  ?>
<hr><b class="thead">RELATED PRODUCT  CUSTOM BLOCK</b><hr>

       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_productpage_related_cb">Enable custom block:</label>
            <div class="col-sm-10">
              <select name="thmsoftcrocus_productpage_related_cb" id="input-thmsoftcrocus_productpage_related_cb" class="form-control">
                <?php if ($thmsoftcrocus_productpage_related_cb) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>


          <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-thmsoftcrocus_productpage_related_cbcontent">Block Content:</label>
                  <div class="col-sm-10">
                    <textarea name="thmsoftcrocus_productpage_related_cbcontent" placeholder="Enetr text here" id="input-thmsoftcrocus_productpage_related_cbcontent" class="form-control summernote"><?php echo $thmsoftcrocus_productpage_related_cbcontent; ?></textarea>
                  </div>
                </div>
        <script type="text/javascript">
        $('#input-thmsoftcrocus_productpage_related_cbcontent').summernote({height: 300});
        </script>
       



<hr><b class="thead">FOOTER FEATURES BLOCK</b><hr>
        
        <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_footer_fb">Enable footer feature block:</label>
            <div class="col-sm-10">
              <select name="thmsoftcrocus_footer_fb" id="input-thmsoftcrocus_footer_fb" class="form-control">
                <?php if ($thmsoftcrocus_footer_fb) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>


          <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-thmsoftcrocus_footer_fbcontent">Footer feature block content:</label>
                  <div class="col-sm-10">
                    <textarea name="thmsoftcrocus_footer_fbcontent" placeholder="Enetr text here" id="input-thmsoftcrocus_footer_fbcontent" class="form-control summernote"><?php echo $thmsoftcrocus_footer_fbcontent; ?></textarea>
                  </div>
                </div>
          <script type="text/javascript">
          $('#input-thmsoftcrocus_footer_fbcontent').summernote({height: 300});
          </script>  <?php   ?>
<?php  ?>

<hr><b class="thead">PRODUCT PAGE BANNER</b><hr>
          
 <div class="form-group">
    <label class="col-sm-2 control-label"><?php echo $entry_image; ?></label>
    <div class="col-sm-10"><a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="<?php echo $thumb; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>
    <input type="hidden" name="thmsoftcrocus_product_image" value="<?php echo $thmsoftcrocus_product_image; ?>" id="input-image" />          
    </div>
 </div>

 <div class="form-group">
    <label class="col-sm-2 control-label"><?php echo $entry_image1; ?></label>
    <div class="col-sm-10"><a href="" id="thumb-image1" data-toggle="image" class="img-thumbnail"><img src="<?php echo $thumb1; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>
    <input type="hidden" name="thmsoftcrocus_product_image1" value="<?php echo $thmsoftcrocus_product_image1; ?>" id="input-image1" />          
    </div>
 </div>

 <div class="form-group">
    <label class="col-sm-2 control-label"><?php echo $entry_image2; ?></label>
    <div class="col-sm-10"><a href="" id="thumb-image2" data-toggle="image" class="img-thumbnail"><img src="<?php echo $thumb2; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>
    <input type="hidden" name="thmsoftcrocus_product_image2" value="<?php echo $thmsoftcrocus_product_image2; ?>" id="input-image2" />          
    </div>
 </div>






<hr><b class="thead">FOOTER CUSTOM BLOCK</b><hr>
        
        <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_footer_cb">Enable footer custom block:</label>
            <div class="col-sm-10">
              <select name="thmsoftcrocus_footer_cb" id="input-thmsoftcrocus_footer_cb" class="form-control">
                <?php if ($thmsoftcrocus_footer_cb) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>


          <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-thmsoftcrocus_footer_cbcontent">Footer custom block content:</label>
                  <div class="col-sm-10">
                    <textarea name="thmsoftcrocus_footer_cbcontent" placeholder="Enetr text here" id="input-thmsoftcrocus_footer_cbcontent" class="form-control summernote"><?php echo $thmsoftcrocus_footer_cbcontent; ?></textarea>
                  </div>
                </div>
          <script type="text/javascript">
          $('#input-thmsoftcrocus_footer_cbcontent').summernote({height: 300});
          </script>      
<?php  ?>


</div>
<div class="tab-pane" id="colors">
<br>
<b class="heading">THEME COLORS</b><br>
In this section, you can change theme colors. To change the color of element just click inside text field and use color picker.

<hr><b class="thead">MAIN</b><hr>

       <?php if(empty($thmsoftcrocus_body_bg)) { $thmsoftcrocus_body_bg="#FFFFFF"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_body_bg">Body background:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_body_bg_ed" id="input-thmsoftcrocus_body_bg_ed" class="form-control">
                <?php if ($thmsoftcrocus_body_bg_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_body_bg" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_body_bg; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #FFFFFF</div>
          </div>

      <?php if(empty($thmsoftcrocus_fontcolor)) { $thmsoftcrocus_fontcolor="#333333"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_fontcolor">Body font color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_fontcolor_ed" id="input-thmsoftcrocus_fontcolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_fontcolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_fontcolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_fontcolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #333333</div>
          </div>
          

      <?php if(empty($thmsoftcrocus_linkcolor)) { $thmsoftcrocus_linkcolor="#333333"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_linkcolor">Link color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_linkcolor_ed" id="input-thmsoftcrocus_linkcolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_linkcolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_linkcolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_linkcolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #333333</div>
          </div>


       <?php if(empty($thmsoftcrocus_linkhovercolor)) { $thmsoftcrocus_linkhovercolor="#23527c"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_linkhovercolor">Link hover color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_linkhovercolor_ed" id="input-thmsoftcrocus_linkhovercolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_linkhovercolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_linkhovercolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_linkhovercolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #23527c</div>
          </div>

<hr><b class="thead">HEADER</b><hr>


       <?php if(empty($thmsoftcrocus_headerbg)) { $thmsoftcrocus_headerbg="#1c95d1"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_headerbg">Header background:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_headerbg_ed" id="input-thmsoftcrocus_headerbg_ed" class="form-control">
                <?php if ($thmsoftcrocus_headerbg_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_headerbg" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_headerbg; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #1c95d1</div>
          </div>

      <?php if(empty($thmsoftcrocus_headerlinkcolor)) { $thmsoftcrocus_headerlinkcolor="#d1f0ff"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_headerlinkcolor">Header link color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_headerlinkcolor_ed" id="input-thmsoftcrocus_headerlinkcolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_headerlinkcolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_headerlinkcolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_headerlinkcolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #d1f0ff</div>
          </div>
          

      <?php if(empty($thmsoftcrocus_headerlinkhovercolor)) { $thmsoftcrocus_headerlinkhovercolor="#FFFFFF"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_headerlinkhovercolor">Header link hover color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_headerlinkhovercolor_ed" id="input-thmsoftcrocus_headerlinkhovercolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_headerlinkhovercolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_headerlinkhovercolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_headerlinkhovercolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #FFFFFF</div>
          </div>


       <?php if(empty($thmsoftcrocus_headerclcolor)) { $thmsoftcrocus_headerclcolor="#FFFFFF"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_headerclcolor">Header currency/language links color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_headerclcolor_ed" id="input-thmsoftcrocus_headerclcolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_headerclcolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_headerclcolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_headerclcolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #FFFFFF</div>
          </div>

<hr><b class="thead">MAIN MENU</b><hr>


       <?php if(empty($thmsoftcrocus_mmbgcolor)) { $thmsoftcrocus_mmbgcolor="#41ade2"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_mmbgcolor">Main menu background color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_mmbgcolor_ed" id="input-thmsoftcrocus_mmbgcolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_mmbgcolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_mmbgcolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_mmbgcolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #41ade2</div>
          </div>


       <?php if(empty($thmsoftcrocus_mmlinkscolor)) { $thmsoftcrocus_mmlinkscolor="#FFFFFF"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_mmlinkscolor">Main menu links color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_mmlinkscolor_ed" id="input-thmsoftcrocus_mmlinkscolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_mmlinkscolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_mmlinkscolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_mmlinkscolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #FFFFFF</div>
          </div>


       <?php if(empty($thmsoftcrocus_mmlinkshovercolor)) { $thmsoftcrocus_mmlinkshovercolor="#222222"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_mmlinkshovercolor">Main menu links Hover color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_mmlinkshovercolor_ed" id="input-thmsoftcrocus_mmlinkshovercolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_mmlinkshovercolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_mmlinkshovercolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_mmlinkshovercolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #222222</div>
          </div>


      <?php if(empty($thmsoftcrocus_mmslinkscolor)) { $thmsoftcrocus_mmslinkscolor="#222222"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_mmslinkscolor">Main menu sublinks color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_mmslinkscolor_ed" id="input-thmsoftcrocus_mmslinkscolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_mmslinkscolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_mmslinkscolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_mmslinkscolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #222222</div>
          </div>

      <?php if(empty($thmsoftcrocus_mmslinkshovercolor)) { $thmsoftcrocus_mmslinkshovercolor="#222222"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_mmslinkshovercolor">Main menu sublinks Hover color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_mmslinkshovercolor_ed" id="input-thmsoftcrocus_mmslinkshovercolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_mmslinkshovercolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_mmslinkshovercolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_mmslinkshovercolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #222222</div>
          </div>


<hr><b class="thead">BUTTONS</b><hr>

<!-- #0088cc -->
       <?php if(empty($thmsoftcrocus_buttoncolor)) { $thmsoftcrocus_buttoncolor=""; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_buttoncolor">Button color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_buttoncolor_ed" id="input-thmsoftcrocus_buttoncolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_buttoncolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_buttoncolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_buttoncolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label"><!-- Default: #0088cc --></div>
          </div>

      <?php if(empty($thmsoftcrocus_buttonhovercolor)) { $thmsoftcrocus_buttonhovercolor="#37a4d9"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_buttonhovercolor">Button Hover color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_buttonhovercolor_ed" id="input-thmsoftcrocus_buttonhovercolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_buttonhovercolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_buttonhovercolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_buttonhovercolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #37a4d9</div>
          </div>


      <hr><b class="thead">PRODUCT</b><hr>


       <?php if(empty($thmsoftcrocus_pricecolor)) { $thmsoftcrocus_pricecolor="#ff0000"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_pricecolor">Price color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_pricecolor_ed" id="input-thmsoftcrocus_pricecolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_pricecolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_pricecolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_pricecolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #ff0000</div>
          </div>

      <?php if(empty($thmsoftcrocus_oldpricecolor)) { $thmsoftcrocus_oldpricecolor="#777777"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_oldpricecolor">Old Price color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_oldpricecolor_ed" id="input-thmsoftcrocus_oldpricecolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_oldpricecolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_oldpricecolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_oldpricecolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #777777</div>
          </div>


      <?php if(empty($thmsoftcrocus_newpricecolor)) { $thmsoftcrocus_newpricecolor="#ff0000"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_newpricecolor">New Price color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_newpricecolor_ed" id="input-thmsoftcrocus_newpricecolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_newpricecolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_newpricecolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_newpricecolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #ff0000</div>
          </div>


<hr><b class="thead">FOOTER</b><hr>


       <?php if(empty($thmsoftcrocus_footerbg)) { $thmsoftcrocus_footerbg="#1c242f"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_footerbg">Footer background:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_footerbg_ed" id="input-thmsoftcrocus_footerbg_ed" class="form-control">
                <?php if ($thmsoftcrocus_footerbg_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_footerbg" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_footerbg; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #1c242f</div>
          </div>

      <?php if(empty($thmsoftcrocus_footerlinkcolor)) { $thmsoftcrocus_footerlinkcolor="#999999"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_footerlinkcolor">Footer links color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_footerlinkcolor_ed" id="input-thmsoftcrocus_footerlinkcolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_footerlinkcolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_footerlinkcolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_footerlinkcolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #999999</div>
          </div>
          

      <?php if(empty($thmsoftcrocus_footerlinkhovercolor)) { $thmsoftcrocus_footerlinkhovercolor="#ffffff"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_footerlinkhovercolor">Footer links hover color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_footerlinkhovercolor_ed" id="input-thmsoftcrocus_footerlinkhovercolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_footerlinkhovercolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_footerlinkhovercolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_footerlinkhovercolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #ffffff</div>
          </div>


       <?php if(empty($thmsoftcrocus_powerbycolor)) { $thmsoftcrocus_powerbycolor="#cccccc"; }  ?>
       <div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_powerbycolor">Footer powered by text color:</label>
            <div class="col-sm-2">
                <select name="thmsoftcrocus_powerbycolor_ed" id="input-thmsoftcrocus_powerbycolor_ed" class="form-control">
                <?php if ($thmsoftcrocus_powerbycolor_ed) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
            <input name="thmsoftcrocus_powerbycolor" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_powerbycolor; ?>" class="pick-a-color form-control"/>
            </div>
            <div class="col-sm-2 control-label">Default: #cccccc</div>
          </div>

                 

</div>
<div class="tab-pane" id="fonts">
<br><b>THEME FONTS</b><br>
Choose font from list
<hr>


<div class="form-group">
            <label class="col-sm-2 control-label" for="input-thmsoftcrocus_fonttransform">Font transform:</label>
            <div class="col-sm-8">
              <?php $gfonts = "Abel,Abril Fatface,Aclonica,Acme,Actor,Adamina,Aguafina Script,Aladin,Aldrich,Alegreya,Alegreya SC,Alex Brush,Alfa Slab One,Alice,Alike,Alike Angular,Allan,Allerta,Allerta Stencil,Allura,Almendra,Almendra SC,Amaranth,Amatic SC,Amethysta,Andada,Andika,Annie Use Your Telescope,Anonymous Pro,Antic,Anton,Arapey,Arbutus,Architects Daughter,Arial,Arimo,Arizonia,Armata,Artifika,Arvo,Asap,Asset,Astloch,Asul,Atomic Age,Aubrey,Bad Script,Balthazar,Bangers,Basic,Baumans,Belgrano,Bentham,Bevan,Bigshot One,Bilbo,Bilbo Swash Caps,Bitter,Black Ops One,Bonbon,Boogaloo,Bowlby One,Bowlby One SC,Brawler,Bree Serif,Bubblegum Sans,Buda,Buenard,Butcherman,Butterfly Kids,Cabin,Cabin Condensed,Cabin Sketch,Caesar Dressing,Cagliostro,Calligraffitti,Cambo,Candal,Cantarell,Cardo,Carme,Carter One,Caudex,Cedarville Cursive,Ceviche One,Changa One,Chango,Chelsea Market,Cherry Cream Soda,Chewy,Chicle,Chivo,Coda,Coda Caption,Comfortaa,Comic Sans MS,Coming Soon,Concert One,Condiment,Contrail One,Convergence,Cookie,Copse,Corben,Cousine,Coustard,Covered By Your Grace,Crafty Girls,Creepster,Crete Round,Crimson Text,Crushed,Cuprum,Damion,Dancing Script,Dawning of a New Day,Days One,Delius,Delius Swash Caps,Delius Unicase,Devonshire,Didact Gothic,Diplomata,Diplomata SC,Dorsa,Dr Sugiyama,Droid Sans,Droid Sans Mono,Droid Serif,Duru Sans,Dynalight,EB Garamond,Eater,Electrolize,Emblema One,Engagement,Enriqueta,Erica One,Esteban,Euphoria Script,Ewert,Exo,Expletus Sans,Fanwood Text,Fascinate,Fascinate Inline,Federant,Federo,Felipa,Fjord One,Flamenco,Flavors,Fondamento,Fontdiner Swanky,Forum,Francois One,Fredericka the Great,Fresca,Frijole,Fugaz One,Galdeano,Gentium Basic,Gentium Book Basic,Geo,Geostar,Geostar Fill,Germania One,Give You Glory,Glegoo,Gloria Hallelujah,Goblin One,Gochi Hand,Goudy Bookletter 1911,Gravitas One,Gruppo,Gudea,Habibi,Hammersmith One,Handlee,Herr Von Muellerhoff,Holtwood One SC,Homemade Apple,Homenaje,IM Fell DW Pica,IM Fell DW Pica SC,IM Fell Double Pica,IM Fell Double Pica SC,IM Fell English,IM Fell English SC,IM Fell French Canon,IM Fell French Canon SC,IM Fell Great Primer,IM Fell Great Primer SC,Iceberg,Iceland,Inconsolata,Inder,Indie Flower,Inika,Irish Grover,Istok Web,Italianno,Jim Nightshade,Jockey One,Josefin Sans,Josefin Slab,Judson,Julee,Junge,Jura,Just Another Hand,Just Me Again Down Here,Kameron,Kaushan Script,Kelly Slab,Kenia,Knewave,Kotta One,Kranky,Krinspire,Kristi,La Belle Aurore,Lancelot,Lato,League Script,Leckerli One,Lekton,Lemon,Lilita One,Limelight,Linden Hill,Lobster,Lobster Two,Lora,Love Ya Like A Sister,Loved by the King,Luckiest Guy,Lusitana,Lucida Grande,Lustria,Macondo,Macondo Swash Caps,Magra,Maiden Orange,Mako,Marck Script,Marko One,Marmelad,Marvel,Mate,Mate SC,Maven Pro,Meddon,MedievalSharp,Medula One,Megrim,Merienda One,Merriweather,Metamorphous,Metrophobic,Michroma,Miltonian,Miltonian Tattoo,Miniver,Miss Fajardose,Modern Antiqua,Molengo,Monofett,Monoton,Monsieur La Doulaise,Montaga,Montez,Montserrat,Mountains of Christmas,Mr Bedfort,Mr Dafoe,Mr De Haviland,Mrs Saint Delafield,Mrs Sheppards,Muli,Neucha,Neuton,News Cycle,Niconne,Nixie One,Nobile,Norican,Nosifer,Nothing You Could Do,Noticia Text,Nova Cut,Nova Flat,Nova Mono,Nova Oval,Nova Round,Nova Script,Nova Slim,Nova Square,Numans,Nunito,Old Standard TT,Oldenburg,Open Sans,Open Sans Condensed,Orbitron,Original Surfer,Oswald,Over the Rainbow,Overlock,Overlock SC,Ovo,PT Sans,PT Sans Caption,PT Sans Narrow,PT Serif,PT Serif Caption,Pacifico,Parisienne,Passero One,Passion One,Patrick Hand,Patua One,Paytone One,Permanent Marker,Petrona,Philosopher,Piedra,Pinyon Script,Plaster,Play,Playball,Playfair Display,Podkova,Poller One,Poly,Pompiere,Port Lligat Sans,Port Lligat Slab,Prata,Princess Sofia,Prociono,Puritan,Quantico,Quattrocento,Quattrocento Sans,Questrial,Quicksand,Qwigley,Radley,Raleway,Rammetto One,Rancho,Rationale,Redressed,Reenie Beanie,Ribeye,Ribeye Marrow,Righteous,Rochester,Rock Salt,Rokkitt,Ropa Sans,Rosario,Rouge Script,Ruda,Ruge Boogie,Ruluko,Ruslan Display,Ruthie,Sail,Salsa,Sancreek,Sansita One,sans-serif,Sarina,Satisfy,Schoolbell,Shadows Into Light,Shanti,Share,Shojumaru,Short Stack,Sigmar One,Signika,Signika Negative,Sirin Stencil,Six Caps,Slackey,Smokum,Smythe,Sniglet,Snippet,Sofia,Sonsie One,Sorts Mill Goudy,Special Elite,Spicy Rice,Spinnaker,Spirax,Squada One,Stardos Stencil,Stint Ultra Condensed,Stint Ultra Expanded,Stoke,Sue Ellen Francisco,Sunshiney,Supermercado One,Swanky and Moo Moo,Syncopate,Tangerine,Tahoma,Times New Roman,Telex,Tenor Sans,Terminal Dosis,The Girl Next Door,Tienne,Tinos,Titan One,Trade Winds,Trochut,Trykker,Tulpen One,Ubuntu,Ubuntu Condensed,Ubuntu Mono,Ultra,Uncial Antiqua,UnifrakturCook,UnifrakturMaguntia,Unkempt,Unlock,Unna,VT323,Varela,Varela Round,Vast Shadow,Vibur,Vidaloka,Viga,Volkhov,Vollkorn,Voltaire,Verdana,Waiting for the Sunrise,Wallpoet,Walter Turncoat,Wellfleet,Wire One,Yanone Kaffeesatz,Yellowtail,Yeseva One,Yesteryear,Zeyada";
      $thmsoftcrocusfonts = explode(',', $gfonts);
      ?>

<select name="thmsoftcrocus_fonttransform" id="input-thmsoftcrocus_fonttransform" class="form-control">
<option value="" <?php if ($thmsoftcrocus_fonttransform=='') {?>selected<?php } ?>  ></option>
<?php foreach ($thmsoftcrocusfonts as $f ){ ?>
<option value="<?php echo $f; ?>" <?php if($thmsoftcrocus_fonttransform==$f){echo 'selected';} ?>>
  <?php echo $f; ?>
</option>
<?php } ?>
</select>
            </div>

            <div class="col-sm-2 control-label"></div>
          </div>



</div>
<div class="tab-pane" id="footer">
<br>
<p align="left">Fill in contact details you want to be displayed in your custom footer. If you don't want some of contact details to be displayed, just leave these fields empty.
 </p>
<hr>
           <div class="form-group">
            <label class="col-sm-2 control-label" for="thmsoftcrocus_address">Address:</label>
            <div class="col-sm-10">
              <input class="form-control" name="thmsoftcrocus_address" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_address; ?>"/>
              </div>
          </div>

         


          <div class="form-group">
            <label class="col-sm-2 control-label" for="thmsoftcrocus_phone">Phone:</label>
            <div class="col-sm-10">
              <input class="form-control" name="thmsoftcrocus_phone" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_phone; ?>"/>
              </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="thmsoftcrocus_email">Email:</label>
            <div class="col-sm-10">
              <input class="form-control" name="thmsoftcrocus_email" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_email; ?>"/>
              </div>
          </div>
<hr>
<p align="left">Leave url field empty if you don't want to display this social icon in footer.</p>
<hr>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="thmsoftcrocus_fb">Facebook:</label>
            <div class="col-sm-10">
              <input class="form-control" name="thmsoftcrocus_fb" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_fb; ?>"/>
              </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="thmsoftcrocus_twitter">Twitter:</label>
            <div class="col-sm-10">
              <input class="form-control" name="thmsoftcrocus_twitter" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_twitter; ?>"/>
              </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="thmsoftcrocus_gglplus">Google Plus:</label>
            <div class="col-sm-10">
              <input class="form-control" name="thmsoftcrocus_gglplus" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_gglplus; ?>"/>
              </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="thmsoftcrocus_rss">RSS:</label>
            <div class="col-sm-10">
              <input class="form-control" name="thmsoftcrocus_rss" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_rss; ?>"/>
              </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label" for="thmsoftcrocus_pinterest">Pinterest:</label>
            <div class="col-sm-10">
              <input class="form-control" name="thmsoftcrocus_pinterest" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_pinterest; ?>"/>
              </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="thmsoftcrocus_linkedin">Linkedin:</label>
            <div class="col-sm-10">
              <input class="form-control" name="thmsoftcrocus_linkedin" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_linkedin; ?>"/>
              </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="thmsoftcrocus_youtube">You Tube:</label>
            <div class="col-sm-10">
              <input class="form-control" name="thmsoftcrocus_youtube" cols="40" rows="5" placeholder="<?php echo $entry_code; ?>" value="<?php echo $thmsoftcrocus_youtube; ?>"/>
              </div>
          </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-thmsoftcrocus_powerby">Powered by text:</label>
                  <div class="col-sm-10">
                    <textarea name="thmsoftcrocus_powerby" placeholder="Enetr text here" id="input-thmsoftcrocus_powerby" class="form-control summernote"><?php echo $thmsoftcrocus_powerby; ?></textarea>
                  </div>
                </div>

 <script type="text/javascript">
$('#input-thmsoftcrocus_powerby').summernote({height: 300});
</script> 
             
 
</div>


<div class="tab-pane" id="support">
<h1 class="heading">Themessoft Crocus theme for Open Cart 2.3.0.2 </h1><hr>
  <p style="font-weight:bold">Theme designed and developed by <a href="http://themeforest.net/user/themessoft">Themessoft</a>.</p>
<p>Thank you for buying this theme! Contact us for any question or problems regarding the theme at - support@themessoft.com.</p>
<p>If you like theme dont forget to rate theme with stars (you can do it in your Downloads tab, inside your ThemeForest profile. Just click on stars! This little thing helps me to make new theme updates! Thank you!</p>
</div>
</div> 

            
        </form>
      </div>
	</div>
  </div>
</div>



<!-- <script src="build/dependencies/jquery-1.9.1.min.js"></script> -->
  <script type="text/javascript" src="view/javascript/summernote/summernote.js"></script>
  <link href="view/javascript/summernote/summernote.css" rel="stylesheet" />
  <script type="text/javascript" src="view/javascript/summernote/opencart.js"></script> 
  <script src="view/javascript/colorpicker/tinycolor-0.9.15.min.js"></script>
  <script src="view/javascript/colorpicker/pick-a-color-1.2.3.min.js"></script>  
  
  <script type="text/javascript">
  
    $(document).ready(function () {

      $(".pick-a-color").pickAColor({
        showSpectrum            : true,
        showSavedColors         : true,
        saveColorsPerElement    : true,
        fadeMenuToggle          : true,
        showAdvanced            : true,
        showBasicColors         : true,
        showHexInput            : true,
        allowBlank              : true,
        inlineDropdown          : true
      });
      
    });
  
    </script>
  <script type="text/javascript"><!--
    $('.datetime').datetimepicker({
      pickDate: true,
      pickTime: true
    });
//--></script>
<?php echo $footer; ?>