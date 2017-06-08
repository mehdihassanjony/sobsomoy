<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-category" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
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
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-article" class="form-horizontal">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo $tab_general; ?></a></li>
            <li><a href="#tab-data" data-toggle="tab"><?php echo $tab_data; ?></a></li>
	          <li><a href="#tab-links" data-toggle="tab"><?php echo $tab_links; ?></a></li>
            <li><a href="#tab-relatedproducts" data-toggle="tab"><?php echo $tab_relatedproducts; ?></a></li>
            <li><a href="#tab-relatedarticles" data-toggle="tab"><?php echo $tab_relatedarticles; ?></a></li>
          </ul>

          <div class="tab-content">

            <div class="tab-pane active in" id="tab-general">
              <ul class="nav nav-tabs" id="language">
                <?php foreach ($languages as $language) { ?>
                <li><a href="#language<?php echo $language['language_id']; ?>" data-toggle="tab"><img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
                <?php } ?>
              </ul>
              <div class="tab-content">
              <?php // echo "<pre>"; print_r($article_description);exit();?>
                <?php foreach ($languages as $language) { 

                  ?>
                <div class="tab-pane" id="language<?php echo $language['language_id']; ?>">
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-article<?php echo $language['language_id']; ?>"><?php echo $entry_article; ?></label>
                    <div class="col-sm-10">
                      <input type="text" name="article_description[<?php echo $language['language_id']; ?>][name]" value="<?php echo isset($article_description[$language['language_id']]) ? $article_description[$language['language_id']]['name'] : ''; ?>" placeholder="<?php echo $entry_article; ?>" id="input-article<?php echo $language['language_id']; ?>" class="form-control" />
                      <?php if (isset($error_article[$language['language_id']])) { ?>
                      <div class="text-danger"><?php echo $error_article[$language['language_id']]; ?></div>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-description<?php echo $language['language_id']; ?>"><?php echo $entry_description; ?></label>
                    <div class="col-sm-10">
                      <textarea name="article_description[<?php echo $language['language_id']; ?>][description]" placeholder="<?php echo $entry_description; ?>" id="input-description<?php echo $language['language_id']; ?>" class="form-control summernote"><?php echo isset($article_description[$language['language_id']]) ? $article_description[$language['language_id']]['description'] : ''; ?></textarea>
                    </div>
                  </div>
		              <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-metatitle<?php echo $language['language_id']; ?>"><?php echo $entry_metatitle; ?></label>
                    <div class="col-sm-10">
                      <textarea name="article_description[<?php echo $language['language_id']; ?>][meta_title]" placeholder="<?php echo $entry_metatitle; ?>" id="input-metatitle<?php echo $language['language_id']; ?>" class="form-control"><?php echo isset($article_description[$language['language_id']]) ? $article_description[$language['language_id']]['meta_title'] : ''; ?></textarea>
		                <?php if (isset($error_metatitle[$language['language_id']])) { ?>
                      <div class="text-danger"><?php echo $error_metatitle[$language['language_id']]; ?></div>
                      <?php } ?>
		                </div>
                  </div>
		              <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-metatitle<?php echo $language['language_id']; ?>"><?php echo $entry_metadescription; ?></label>
                    <div class="col-sm-10">
                      <textarea name="article_description[<?php echo $language['language_id']; ?>][meta_description]" placeholder="<?php echo $entry_metadescription; ?>" id="input-metadescription<?php echo $language['language_id']; ?>" class="form-control"><?php echo isset($article_description[$language['language_id']]) ? $article_description[$language['language_id']]['meta_description'] : ''; ?></textarea>
                    </div>
                  </div>
		              <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-metakeyword<?php echo $language['language_id']; ?>"><?php echo $entry_metakeyword; ?></label>
                    <div class="col-sm-10">
                      <textarea name="article_description[<?php echo $language['language_id']; ?>][meta_keyword]" placeholder="<?php echo $entry_metakeyword; ?>" id="input-metakeyword<?php echo $language['language_id']; ?>" class="form-control"><?php echo isset($article_description[$language['language_id']]) ? $article_description[$language['language_id']]['meta_keyword'] : ''; ?></textarea>
                    </div>
                  </div>
		            <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-tag<?php echo $language['language_id']; ?>">
                  <span data-toggle="tooltip" title="<?php echo $help_tag; ?>"><?php echo $entry_tag; ?></span></label>
                    <div class="col-sm-10">
                      <input type="text" name="article_description[<?php echo $language['language_id']; ?>][tags]" value="<?php echo isset($article_description[$language['language_id']]) ? $article_description[$language['language_id']]['tags'] : ''; ?>" placeholder="<?php echo $entry_tag; ?>" id="input-tag<?php echo $language['language_id']; ?>" class="form-control" />
                    </div>
                  </div>
                 </div>
                <?php } ?>
              </div>
            </div>

            <div class="tab-pane fade" id="tab-data">
	    <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo $entry_image; ?></label>
                <div class="col-sm-10"><a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="<?php echo $thumb; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>
                  <input type="hidden" name="image" value="<?php echo $image; ?>" id="input-image" />
                </div>
              </div>
             <div class="form-group">
                <label class="col-sm-2 control-label" for="input-author"><?php echo $entry_author; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="author" value="<?php echo $author; ?>" placeholder="<?php echo $entry_author; ?>" id="input-author" class="form-control" />
                </div>
              </div>
	      <div class="form-group">
                <label class="col-sm-2 control-label" for="input-publishdate"><?php echo $entry_publishdate; ?></label>
                <div class="col-sm-3">
                  <div class="input-group date">
                    <input type="text" name="publishdate" value="<?php echo $publishdate; ?>" placeholder="<?php echo $entry_publishdate; ?>" data-date-format="YYYY-MM-DD" id="input-publishdate" class="form-control" />
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                    </span></div>
                </div>
              </div>
              

            <div class="form-group">
            <label class="col-sm-2 control-label" for="input-keyword"><span data-toggle="tooltip" title="<?php echo $help_keyword; ?>"><?php echo $entry_keyword; ?></span></label>
            <div class="col-sm-10">
            <input type="text" name="keyword" value="<?php echo $keyword; ?>" placeholder="<?php echo $entry_keyword; ?>" id="input-keyword" class="form-control" />
            <?php if ($error_keyword) { ?>
            <div class="text-danger"><?php echo $error_keyword; ?></div>
            <?php } ?>                
            </div>
            </div>


              
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
                <div class="col-sm-10">
                  <select name="status" id="input-status" class="form-control">
                    <?php if ($status) { ?>
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
                <label class="col-sm-2 control-label" for="input-display-order"><?php echo $entry_display_order; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="display_order" value="<?php echo $display_order; ?>" placeholder="<?php echo $entry_display_order; ?>" id="input-display-order" class="form-control" />
                </div>
              </div>

            </div>
            
	    <div class="tab-pane fade" id="tab-links">

             <div class="form-group">
                <label class="col-sm-2 control-label" for="input-parent"><?php echo $entry_category; ?></label>
                <div class="col-sm-10">
		    <div class="well well-sm" style="height: 150px; overflow: auto;">
		      <?php if(count($parentcategory) == 0){ ?>
		       <div class="checkbox">

                      <label>
                        <?php if (in_array(0, $article_category)) { ?>
                        <!--<input type="checkbox" name="question_category[]" value="0" checked="checked" />-->
                        <?php echo $text_default_category; ?>
                        <?php } else { ?>
                        <!--<input type="checkbox" name="question_category[]" value="0" />-->
                        <?php echo $text_default_category; ?>
                        <?php } ?>
                      </label>
                    </div>
		  <?php } ?>
		      <?php foreach ($parentcategory as $_parentcategory) { ?>
			<div class="checkbox">
			  <label>
			    <?php if (in_array($_parentcategory['category_id'], $article_category)) { ?>
			    <input type="checkbox" name="article_category[]" value="<?php echo $_parentcategory['category_id']; ?>" checked="checked" />
			    <?php echo $_parentcategory['name']; ?>
			    <?php } else { ?>
			    <input type="checkbox" name="article_category[]" value="<?php echo $_parentcategory['category_id']; ?>" />
			    <?php echo $_parentcategory['name']; ?>
			    <?php } ?>
			  </label>
			</div>
		      <?php } ?>
		    </div>
                </div>
              </div>

	      <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo $entry_store; ?></label>
                <div class="col-sm-10">
                  <div class="well well-sm" style="height: 150px; overflow: auto;">
                    <div class="checkbox">

                      <label>
                        <?php if (in_array(0, $article_store)) { ?>
                        <input type="checkbox" name="article_store[]" value="0" checked="checked" />
                        <?php echo $text_default; ?>
                        <?php } else { ?>
                        <input type="checkbox" name="article_store[]" value="0" />
                        <?php echo $text_default; ?>
                        <?php } ?>
                      </label>
                    </div>

                    <?php foreach ($stores as $store) { ?>
                    <div class="checkbox">
                      <label>
                        <?php if (in_array($store['store_id'], $article_store)) { ?>
                        <input type="checkbox" name="article_store[]" value="<?php echo $store['store_id']; ?>" checked="checked" />
                        <?php echo $store['name']; ?>
                        <?php } else { ?>
                        <input type="checkbox" name="article_store[]" value="<?php echo $store['store_id']; ?>" />
                        <?php echo $store['name']; ?>
                        <?php } ?>
                      </label>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>



                    <div class="tab-pane fade" id="tab-relatedproducts">

<div class="form-group">
      <label class="col-sm-2 control-label" for="input-parent"><?php echo $entry_title_relatedproducts; ?></label>
      <div class="col-sm-10">
        <?php foreach ($languages as $language) { ?>
      <div class="col-sm-1">
        <img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
      </div>
       <div class="col-sm-11">
        <input type="text" name="article_description[<?php echo $language['language_id']; ?>][title_relatedproducts]" value="<?php echo isset($article_description[$language['language_id']]) ? $article_description[$language['language_id']]['title_relatedproducts'] : ''; ?>" placeholder="<?php echo $language['name'].' '.$entry_title_relatedproducts; ?>" class="form-control" />
      </div>
     
        <?php } ?>

      </div>
</div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-related"><span data-toggle="tooltip" title="<?php echo $help_related; ?>"><?php echo $entry_related; ?></span></label>
                <div class="col-sm-10">
                  <input type="text" name="related" value="" placeholder="<?php echo $entry_related; ?>" class="form-control" />
                  <div id="related-product" class="well well-sm" style="height: 150px; overflow: auto;">
                    <?php foreach ($related_products as $related_product) { ?>
                    <div id="related-product<?php echo $related_product['product_id']; ?>"><i class="fa fa-minus-circle"></i> <?php echo $related_product['name']; ?>
                      <input type="hidden" name="related_product[]" value="<?php echo $related_product['product_id']; ?>" />
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>






                                <div class="tab-pane fade" id="tab-relatedarticles">

<div class="form-group">
      <label class="col-sm-2 control-label" for="input-parent"><?php echo $entry_title_relatedarticles; ?></label>
      <div class="col-sm-10">
        <?php foreach ($languages as $language) { ?>
      <div class="col-sm-1">
        <img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>
      </div>
       <div class="col-sm-11">
        <input type="text" name="article_description[<?php echo $language['language_id']; ?>][title_relatedarticles]" value="<?php echo isset($article_description[$language['language_id']]) ? $article_description[$language['language_id']]['title_relatedarticles'] : ''; ?>" placeholder="<?php echo $language['name'].' '.$entry_title_relatedarticles; ?>" class="form-control" />
      </div>
     
        <?php } ?>

      </div>
</div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-relatedarticles"><span data-toggle="tooltip" title="<?php echo $help_relatedarticles; ?>"><?php echo $entry_relatedarticles; ?></span></label>
                <div class="col-sm-10">
                  <input type="text" name="relatedarticles" value="" placeholder="<?php echo $entry_relatedarticles; ?>" class="form-control" />
                  <div id="related-article" class="well well-sm" style="height: 150px; overflow: auto;">
                    <?php foreach ($related_articles as $related_article) {  ?>
                    <div id="related-article<?php echo $related_article['blog_id']; ?>"><i class="fa fa-minus-circle"></i> <?php echo $related_article['name']; ?>
                      <input type="hidden" name="related_article[]" value="<?php echo $related_article['blog_id']; ?>" />
                    </div>
                    <?php  } ?>
                  </div>
                </div>
              </div>

            </div>




          </div>
        </form>
      </div>
    </div>
  </div>
<script type="text/javascript" src="view/javascript/summernote/summernote.js"></script>
<link href="view/javascript/summernote/summernote.css" rel="stylesheet" />
<script type="text/javascript" src="view/javascript/summernote/opencart.js"></script> 
<script type="text/javascript"><!--
<?php foreach ($languages as $language) { ?>
$('#input-description<?php echo $language['language_id']; ?>').summernote({
	height: 300
});
<?php } ?>
//--></script> 
  <script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});

$('.time').datetimepicker({
	pickDate: false
});

$('.datetime').datetimepicker({
	pickDate: true,
	pickTime: true
});
//--></script> 
  <script type="text/javascript"><!--
$('#language a:first').tab('show');

// Related
$('input[name=\'related\']').autocomplete({
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['product_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $('input[name=\'related\']').val('');

    $('#related-product' + item['value']).remove();

    $('#related-product').append('<div id="related-product' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="related_product[]" value="' + item['value'] + '" /></div>');
  }
});

$('#related-product').delegate('.fa-minus-circle', 'click', function() {
  $(this).parent().remove();
});

//Relaed articles
$('input[name=\'relatedarticles\']').autocomplete({
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=thmsoftblog/article/autocompletearticles&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['article_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $('input[name=\'relatedarticles\']').val('');

    $('#related-article' + item['value']).remove();

    $('#related-article').append('<div id="related-article' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="related_article[]" value="' + item['value'] + '" /></div>');
  }
});

$('#related-article').delegate('.fa-minus-circle', 'click', function() {
  $(this).parent().remove();
});

//--></script></div>
<?php echo $footer; ?>