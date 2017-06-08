<?php echo $header; ?>

<?php echo $column_left; ?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-thmblog" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
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
	  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-thmblog" class="form-horizontal">
	    <div class="tab-pane">
	      <ul class="nav nav-tabs" id="language">
              <?php foreach ($languages as $language) { ?>
              <li><a href="#language<?php echo $language['language_id']; ?>" data-toggle="tab"><img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
              <?php } ?>
            </ul>
	      <div class="tab-content">
		  
		   <?php foreach ($languages as $language) { ?>
		      <div class="tab-pane panel-heading" id="language<?php echo $language['language_id']; ?>">
			  <div class="form-group">
			    <label class="col-sm-2 control-label" for="input-metatitle<?php echo $language['language_id']; ?>"><?php echo $entry_metatitle; ?></label>
			    <div class="col-sm-10">
			    <input name="thmsoftblog_description[<?php echo $language['language_id']; ?>][metatitle]" cols="40" rows="5" id="input-metatitle<?php echo $language['language_id']; ?>" placeholder="<?php echo $entry_metatitle; ?>" value="<?php echo isset($thmsoftblog_description[$language['language_id']]) ? $thmsoftblog_description[$language['language_id']]['metatitle'] : ''; ?>" class="form-control"/>
			    </div>
			  </div>
	
			  <div class="form-group">
			    <label class="col-sm-2 control-label" for="input-metakeyword<?php echo $language['language_id']; ?>"><?php echo $entry_metakeyword; ?></label>
			    <div class="col-sm-10">
			    <input name="thmsoftblog_description[<?php echo $language['language_id']; ?>][metakeyword]" cols="40" rows="5" id="input-metakeyword<?php echo $language['language_id']; ?>" placeholder="<?php echo $entry_metakeyword; ?>" value="<?php echo isset($thmsoftblog_description[$language['language_id']]) ? $thmsoftblog_description[$language['language_id']]['metakeyword'] : ''; ?>" class="form-control"/>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label" for="input-metadescription<?php echo $language['language_id']; ?>"><?php echo $entry_metadescription; ?></label>
			    <div class="col-sm-10">
			      <textarea name="thmsoftblog_description[<?php echo $language['language_id']; ?>][metadescription]" placeholder="<?php echo $entry_metadescription; ?>" id="input-metadescription<?php echo $language['language_id']; ?>" class="form-control"><?php echo isset($thmsoftblog_description[$language['language_id']]) ? $thmsoftblog_description[$language['language_id']]['metadescription'] : ''; ?></textarea>
			    </div>
			  </div>
		
		      </div>
		  <?php } ?>
<br><br>
		  <div class="form-group">
			<label class="col-sm-2 control-label" for="input-thmblog_ed"><?php echo $entry_status; ?></label>
			<div class="col-sm-10">
			    <select name="thmsoftblog_status" id="input-thmblog_ed" class="form-control">
			    <?php if ($thmsoftblog_status) { ?>
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
			<label class="col-sm-2 control-label" for="input-thmblogcommentstatus_ed"><?php echo $entry_allowcomment; ?></label>
			<div class="col-sm-10">
			    <label class="radio-inline">
			      <?php if ($thmsoftblog_allow_comment) { ?>
			      <input type="radio" name="thmsoftblog_allow_comment" value="1" checked="checked" />
			      <?php echo $text_yes; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_comment" value="1" />
			      <?php echo $text_yes; ?>
			      <?php } ?>
			    </label>
			    <label class="radio-inline">
			      <?php if (!$thmsoftblog_allow_comment) { ?>
			      <input type="radio" name="thmsoftblog_allow_comment" value="0" checked="checked" />
			      <?php echo $text_no; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_comment" value="0" />
			      <?php echo $text_no; ?>
			      <?php } ?>
			    </label>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label class="col-sm-2 control-label" for="input-thmblogcomment_ed"><?php echo $entry_allowguestcomment; ?></label>
			<div class="col-sm-10">
			    <label class="radio-inline">
			      <?php if ($thmsoftblog_allow_guestcomment) { ?>
			      <input type="radio" name="thmsoftblog_allow_guestcomment" value="1" checked="checked" />
			      <?php echo $text_yes; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_guestcomment" value="1" />
			      <?php echo $text_yes; ?>
			      <?php } ?>
			    </label>
			    <label class="radio-inline">
			      <?php if (!$thmsoftblog_allow_guestcomment) { ?>
			      <input type="radio" name="thmsoftblog_allow_guestcomment" value="0" checked="checked" />
			      <?php echo $text_no; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_guestcomment" value="0" />
			      <?php echo $text_no; ?>
			      <?php } ?>
			    </label>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-2 control-label" for="input-thmblogtagstatus_ed"><?php echo $entry_allowtag; ?></label>
			<div class="col-sm-10">
			    <label class="radio-inline">
			      <?php if ($thmsoftblog_allow_tag) { ?>
			      <input type="radio" name="thmsoftblog_allow_tag" value="1" checked="checked" />
			      <?php echo $text_yes; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_tag" value="1" />
			      <?php echo $text_yes; ?>
			      <?php } ?>
			    </label>
			    <label class="radio-inline">
			      <?php if (!$thmsoftblog_allow_tag) { ?>
			      <input type="radio" name="thmsoftblog_allow_tag" value="0" checked="checked" />
			      <?php echo $text_no; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_tag" value="0" />
			      <?php echo $text_no; ?>
			      <?php } ?>
			    </label>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-2 control-label" for="input-thmblogrssfeedstatus_ed"><?php echo $entry_allowblogfeed; ?></label>
			<div class="col-sm-10">
			    <label class="radio-inline">
			      <?php if ($thmsoftblog_allow_rssfeed) { ?>
			      <input type="radio" name="thmsoftblog_allow_rssfeed" value="1" checked="checked" />
			      <?php echo $text_yes; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_rssfeed" value="1" />
			      <?php echo $text_yes; ?>
			      <?php } ?>
			    </label>
			    <label class="radio-inline">
			      <?php if (!$thmsoftblog_allow_rssfeed) { ?>
			      <input type="radio" name="thmsoftblog_allow_rssfeed" value="0" checked="checked" />
			      <?php echo $text_no; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_rssfeed" value="0" />
			      <?php echo $text_no; ?>
			      <?php } ?>
			    </label>
			</div>
		  </div>

		  <div class="form-group">
			<label class="col-sm-2 control-label" for="input-thmblogcategorynametatus_ed"><?php echo $entry_allowcategoryname; ?></label>
			<div class="col-sm-10">
			    <label class="radio-inline">
			      <?php if ($thmsoftblog_allow_categoryname) { ?>
			      <input type="radio" name="thmsoftblog_allow_categoryname" value="1" checked="checked" />
			      <?php echo $text_yes; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_categoryname" value="1" />
			      <?php echo $text_yes; ?>
			      <?php } ?>
			    </label>
			    <label class="radio-inline">
			      <?php if (!$thmsoftblog_allow_categoryname) { ?>
			      <input type="radio" name="thmsoftblog_allow_categoryname" value="0" checked="checked" />
			      <?php echo $text_no; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_categoryname" value="0" />
			      <?php echo $text_no; ?>
			      <?php } ?>
			    </label>
			</div>
		  </div>




		  	<div class="form-group">
			<label class="col-sm-2 control-label" for="input-thmblogallowsociallinks_ed"><?php echo $entry_allowsociallinks; ?></label>
			<div class="col-sm-10">
			    <label class="radio-inline">
			      <?php if ($thmsoftblog_allow_sociallinks) { ?>
			      <input type="radio" name="thmsoftblog_allow_sociallinks" value="1" checked="checked" />
			      <?php echo $text_yes; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_sociallinks" value="1" />
			      <?php echo $text_yes; ?>
			      <?php } ?>
			    </label>
			    <label class="radio-inline">
			      <?php if (!$thmsoftblog_allow_sociallinks) { ?>
			      <input type="radio" name="thmsoftblog_allow_sociallinks" value="0" checked="checked" />
			      <?php echo $text_no; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_sociallinks" value="0" />
			      <?php echo $text_no; ?>
			      <?php } ?>
			    </label>
			</div>
		  </div>


		  	<div class="form-group">
			<label class="col-sm-2 control-label" for="input-thmblogallowseolinks_ed"><span data-toggle="tooltip" title="<?php echo $help_allowseolinks; ?>"><?php echo $entry_allowseolinks; ?></span></label>
			<div class="col-sm-10">
			    <label class="radio-inline">
			      <?php if ($thmsoftblog_allow_seolinks) { ?>
			      <input type="radio" name="thmsoftblog_allow_seolinks" value="1" checked="checked" />
			      <?php echo $text_yes; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_seolinks" value="1" />
			      <?php echo $text_yes; ?>
			      <?php } ?>
			    </label>
			    <label class="radio-inline">
			      <?php if (!$thmsoftblog_allow_seolinks) { ?>
			      <input type="radio" name="thmsoftblog_allow_seolinks" value="0" checked="checked" />
			      <?php echo $text_no; ?>
			      <?php } else { ?>
			      <input type="radio" name="thmsoftblog_allow_seolinks" value="0" />
			      <?php echo $text_no; ?>
			      <?php } ?>
			    </label>
			</div>
		  </div>

		  
	      </div><!-- tabcontent -->
	    </div>
	  </form>
	</div>
      </div>
  </div>
<script type="text/javascript"><!--
$('#language a:first').tab('show');
//--></script> 
</div> 
  
    
<?php echo $footer; ?> 
