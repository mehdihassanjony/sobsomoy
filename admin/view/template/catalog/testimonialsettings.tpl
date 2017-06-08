<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-setting" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
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
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>

        <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-setting" class="form-horizontal">

          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo $tab_general; ?></a></li>
            <li><a href="#tab-data" data-toggle="tab"><?php echo $tab_data; ?></a></li>
            <li><a href="#tab-store" data-toggle="tab"><?php echo $tab_stores; ?></a></li>
            
          </ul>

          <div class="tab-content">
            <div class="tab-pane active in" id="tab-general">
                  <div class="form-group">
                  <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_testimonial; ?>"><?php echo $entry_testimonial; ?></span></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($testimonialsettings_status) { ?>
                      <input type="radio" name="testimonialsettings_status" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="testimonialsettings_status" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$testimonialsettings_status) { ?>
                      <input type="radio" name="testimonialsettings_status" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="testimonialsettings_status" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_testimonial_guest; ?>"><?php echo $entry_testimonial_guest; ?></span></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($testimonial_guest) { ?>
                      <input type="radio" name="testimonial_guest" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="testimonial_guest" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$testimonial_guest) { ?>
                      <input type="radio" name="testimonial_guest" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="testimonial_guest" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>

<div class="alert alert-info"><?php echo $text_display_settings;?></div>

                <div class="form-group">
                  <label class="col-sm-2 control-label"><?php echo $entry_display_date_added; ?></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($display_date_added) { ?>
                      <input type="radio" name="display_date_added" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="display_date_added" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$display_date_added) { ?>
                      <input type="radio" name="display_date_added" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="display_date_added" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label"><?php echo $entry_display_author_bio; ?></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($display_author_bio) { ?>
                      <input type="radio" name="display_author_bio" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="display_author_bio" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$display_author_bio) { ?>
                      <input type="radio" name="display_author_bio" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="display_author_bio" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label"><?php echo $entry_display_rating; ?></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($display_rating) { ?>
                      <input type="radio" name="display_rating" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="display_rating" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$display_rating) { ?>
                      <input type="radio" name="display_rating" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="display_rating" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label"><?php echo $entry_display_image; ?></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($display_image) { ?>
                      <input type="radio" name="display_image" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="display_image" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$display_image) { ?>
                      <input type="radio" name="display_image" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="display_image" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>




                <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-catalog-limit"><span data-toggle="tooltip" title="<?php echo $help_items_limit; ?>"><?php echo $entry_items_limit; ?></span></label>
                  <div class="col-sm-10">
                    <input type="text" name="items_limit" value="<?php echo $items_limit; ?>" placeholder="<?php echo $entry_items_limit; ?>" id="input-items-limit" class="form-control" />
                    <?php if ($error_items_limit) { ?>
                    <div class="text-danger"><?php echo $error_items_limit; ?></div>
                    <?php } ?>
                  </div>
                </div>


<div class="alert alert-info"><?php echo $text_form_settings;?></div>

                <div class="form-group">
                  <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_enable_bio; ?>"><?php echo $entry_enable_bio; ?></span></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($bio_option_status) { ?>
                      <input type="radio" name="bio_option_status" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="bio_option_status" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$bio_option_status) { ?>
                      <input type="radio" name="bio_option_status" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="bio_option_status" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>


               <div class="form-group">
                  <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_enable_bio_required; ?>"><?php echo $entry_enable_bio_required; ?></span></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($bio_required_status) { ?>
                      <input type="radio" name="bio_required_status" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="bio_required_status" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$bio_required_status) { ?>
                      <input type="radio" name="bio_required_status" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="bio_required_status" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>  




                <div class="form-group">
                  <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_enable_rating; ?>"><?php echo $entry_enable_rating; ?></span></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($rating_option_status) { ?>
                      <input type="radio" name="rating_option_status" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="rating_option_status" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$rating_option_status) { ?>
                      <input type="radio" name="rating_option_status" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="rating_option_status" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>


               <div class="form-group">
                  <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_enable_rating_required; ?>"><?php echo $entry_enable_rating_required; ?></span></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($rating_required_status) { ?>
                      <input type="radio" name="rating_required_status" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="rating_required_status" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$rating_required_status) { ?>
                      <input type="radio" name="rating_required_status" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="rating_required_status" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>  



                <div class="form-group">
                  <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_enable_image; ?>"><?php echo $entry_enable_image; ?></span></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($image_option_status) { ?>
                      <input type="radio" name="image_option_status" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="image_option_status" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$image_option_status) { ?>
                      <input type="radio" name="image_option_status" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="image_option_status" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>


               <div class="form-group">
                  <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_enable_image_required; ?>"><?php echo $entry_enable_image_required; ?></span></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($image_required_status) { ?>
                      <input type="radio" name="image_required_status" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="image_required_status" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$image_required_status) { ?>
                      <input type="radio" name="image_required_status" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="image_required_status" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>  


                <div class="form-group">
                  <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_captcha; ?>"><?php echo $entry_enable_captcha; ?></span></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($captcha_status) { ?>
                      <input type="radio" name="captcha_status" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="captcha_status" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$captcha_status) { ?>
                      <input type="radio" name="captcha_status" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="captcha_status" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>

<div class="alert alert-info"><?php echo $text_emailalert_settings;?></div>
                <div class="form-group">
                  <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_enable_emailalert_owner; ?>"><?php echo $entry_enable_emailalert_owner; ?></span></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($emailalertowner_option_status) { ?>
                      <input type="radio" name="emailalertowner_option_status" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="emailalertowner_option_status" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$emailalertowner_option_status) { ?>
                      <input type="radio" name="emailalertowner_option_status" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="emailalertowner_option_status" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="<?php echo $help_enable_emailalert_customer; ?>"><?php echo $entry_enable_emailalert_customer; ?></span></label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <?php if ($emailalertcustomer_option_status) { ?>
                      <input type="radio" name="emailalertcustomer_option_status" value="1" checked="checked" />
                      <?php echo $text_yes; ?>
                      <?php } else { ?>
                      <input type="radio" name="emailalertcustomer_option_status" value="1" />
                      <?php echo $text_yes; ?>
                      <?php } ?>
                    </label>
                    <label class="radio-inline">
                      <?php if (!$emailalertcustomer_option_status) { ?>
                      <input type="radio" name="emailalertcustomer_option_status" value="0" checked="checked" />
                      <?php echo $text_no; ?>
                      <?php } else { ?>
                      <input type="radio" name="emailalertcustomer_option_status" value="0" />
                      <?php echo $text_no; ?>
                      <?php } ?>
                    </label>
                  </div>
                </div>



            </div>

            <div class="tab-pane fade" id="tab-data">

              <ul class="nav nav-tabs" id="language">
                <?php foreach ($languages as $language) { ?>
                <li><a href="#language<?php echo $language['language_id']; ?>" data-toggle="tab"><img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
                <?php } ?>
              </ul>

              <div class="tab-content">
                <?php foreach ($languages as $language) { ?>
                <div class="tab-pane" id="language<?php echo $language['language_id']; ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo $entry_name; ?></label>
                    <div class="col-sm-10">
                      <input type="text" name="testimonial_description[<?php echo $language['language_id']; ?>][title]" value="<?php echo isset($testimonial_description[$language['language_id']]) ? $testimonial_description[$language['language_id']]['title'] : ''; ?>" placeholder="<?php echo $entry_name; ?>" id="input-name<?php echo $language['language_id']; ?>" class="form-control" />
                      <?php if (isset($error_name[$language['language_id']])) { ?>
                      <div class="text-danger"><?php echo $error_name[$language['language_id']]; ?></div>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-description<?php echo $language['language_id']; ?>"><?php echo $entry_description; ?></label>
                    <div class="col-sm-10">
                      <textarea name="testimonial_description[<?php echo $language['language_id']; ?>][description]" placeholder="<?php echo $entry_description; ?>" id="input-description<?php echo $language['language_id']; ?>" class="form-control"><?php echo isset($testimonial_description[$language['language_id']]) ? $testimonial_description[$language['language_id']]['description'] : ''; ?></textarea>
                    </div>
                  </div>


                 </div>
                <?php } ?>
              </div>


            </div>

            <div class="tab-pane fade" id="tab-store">
                <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo $entry_stores; ?></label>
                <div class="col-sm-10">
                  <div class="well well-sm" style="height: 150px; overflow: auto;">
                    <div class="checkbox">
                      <label>
                        <?php if (in_array(0, $testimonial_store)) { ?>
                        <input type="checkbox" name="testimonial_store[]" value="0" checked="checked" />
                        <?php echo $text_default; ?>
                        <?php } else { ?>
                        <input type="checkbox" name="testimonial_store[]" value="0" />
                        <?php echo $text_default; ?>
                        <?php } ?>
                      </label>
                    </div>
                    <?php foreach ($stores as $store) { ?>
                    <div class="checkbox">
                      <label>
                        <?php if (in_array($store['store_id'], $testimonial_store)) { ?>
                        <input type="checkbox" name="testimonial_store[]" value="<?php echo $store['store_id']; ?>" checked="checked" />
                        <?php echo $store['name']; ?>
                        <?php } else { ?>
                        <input type="checkbox" name="testimonial_store[]" value="<?php echo $store['store_id']; ?>" />
                        <?php echo $store['name']; ?>
                        <?php } ?>
                      </label>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div><!-- tab -->
          </div><!-- our tab pane -->





        </form>
    	</div><!-- panel-body -->

  	</div><!-- panel panel-default -->

</div><!-- "container-fluid" -->
  <script type="text/javascript"><!--
$('#language a:first').tab('show');
//--></script>
  <script type="text/javascript"><!--
<?php foreach ($languages as $language) { ?>
$('#input-description<?php echo $language['language_id']; ?>').summernote({
  height: 300
});
<?php } ?>
//--></script>
</div><!-- content -->
<?php echo $footer; ?>