<?php echo $header; ?>
<div class="container">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
    <?php } ?>
  </ul>

  <div class="row">  
    <div id="content" class="col-sm-12">           
      <h1><?php if($testimonial_title){ echo $testimonial_title;}?></h1>
      <?php if ($testimonial_description) { ?>
      <div class="row">
        <div class="col-sm-12"><?php echo $testimonial_description; ?></div>
      </div>
      <hr>
      <?php } ?>

          <form class="form-horizontal" id="form-review">
                <div id="review"></div>
                <?php if($testimonialsettings_status) { ?>
                <h4><legend><?php echo $text_write; ?></legend></h4>
                <?php  if ($testimonial_guest || $this->customer->isLogged() ) { ?>

                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_name; ?></label>
                    <div class="col-sm-10"> 
                    <input type="text" name="name" value="<?php echo $name; ?>" id="input-name" class="form-control" />
                    </div>
                </div>


              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-email"><?php echo $entry_email; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="email" value="<?php echo $email; ?>" id="input-email" class="form-control" />
                  </div>
              </div>


                <div class="form-group <?php if($bio_required_status) {echo 'required';}?>">
                  
                    <label class="col-sm-2 control-label" for="input-bio"><?php echo $entry_bio; ?></label>
                    <div class="col-sm-10">
                    <input type="text" name="bio" value="" id="input-bio" class="form-control" />
                    </div>
                </div>

                <div class="form-group required">
                  
                    <label class="col-sm-2 control-label" for="input-review"><?php echo $entry_review; ?></label>
                    
                    <div class="col-sm-10">
                    <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                    <div class="help-block"><?php echo $text_note; ?></div>
                    </div>

                </div>
                

            <?php if($image_option_status) { ?>
            <div class="form-group <?php if($image_required_status) {echo 'required';}?>">
               
              <label class="col-sm-2 control-label"><?php echo $entry_photo; ?></label>
              
              <div class="col-sm-10">
              <button type="button" id="button-upload" data-loading-text="<?php echo "loading"; ?>" class="btn btn-default btn-block"><i class="fa fa-upload"></i> <?php echo $entry_upload; ?></button>
              <input type="hidden" name="image_code" value="" id="input-option" />
              </div>

          </div>
          <?php } ?>

                                            

                <?php if($rating_option_status) { ?>
                <div class="form-group <?php if($rating_required_status) {echo 'required';}?>">
                  
                    <label class="col-sm-2 control-label"><?php echo $entry_rating; ?></label>
                    
                    <div class="col-sm-10">
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
                    &nbsp;<?php echo $entry_good; ?>
                  </div>

                </div>
                <?php } // enale/disable ratting option ?>


                <?php if ($captcha_status) { ?>
                    <?php if(VERSION < 2.1){ //v2.0?>
                      <?php if ($site_key) { ?>
                      <div class="form-group">
                      <div class="col-sm-2"></div>
                      <div class="col-sm-10">
                        <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div>
                      </div>
                      </div>
                      <?php } 
                    } else { //v2.1 ?>
                    <?php echo $captcha; ?>
                    <?php } ?>
                <?php } ?>

                <div class="buttons clearfix">
                  <div class="pull-right">
                    <button type="button" id="button-review" data-loading-text="<?php echo $text_loading; ?>" class="btn btn-primary"><?php echo $button_continue; ?></button>
                  </div>
                </div>
                <?php } else { echo $text_login; } //allow guest testimonial  ?>
             <?php } //allow testimonial new entry ?>
              </form>
    </div>
  </div>

  </div>

<script type="text/javascript">
$('#review').delegate('.pagination a', 'click', function(e) {
  e.preventDefault();

    $('#review').fadeOut('fast');

    $('#review').load(this.href);

    $('#review').fadeIn('fast');
});

$('#review').load('index.php?route=thmsofttestimonial/thmsofttestimonial/testimonial');

$('#button-review').on('click', function() {
  $.ajax({
    url: 'index.php?route=thmsofttestimonial/thmsofttestimonial/write',
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
        $('input[name=\'email\']').val('');
        $('input[name=\'bio\']').val('');
        $('input[name=\'image_code\']').val('');
        $('textarea[name=\'text\']').val('');
        $('input[name=\'rating\']:checked').prop('checked', false);
      }
    }
  });
});

$('button[id^=\'button-upload\']').on('click', function() {
  var node = this;

  $('#form-upload').remove();

  $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file"/></form>');

  $('#form-upload input[name=\'file\']').trigger('click');

  if (typeof timer != 'undefined') {
      clearInterval(timer);
  }

  timer = setInterval(function() {
    if ($('#form-upload input[name=\'file\']').val() != '') {
      clearInterval(timer);

      $.ajax({
        url: 'index.php?route=thmsofttestimonial/thmsofttestimonial/imageupload',
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

            $(node).parent().find('input').attr('value', json['code']);
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    }
  }, 500);
});

</script>  
<?php echo $footer; ?>