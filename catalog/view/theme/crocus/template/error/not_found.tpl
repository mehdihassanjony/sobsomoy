<?php echo $header; ?>
<div class="main-container col2-right-layout">
<div class="main container">
  <div class="row"><?php echo $column_left; ?>
    <?php if ($column_left && $column_right) { ?>
    <?php $class = 'col-sm-6'; ?>
    <?php } elseif ($column_left || $column_right) { ?>
    <?php $class = 'col-sm-9'; ?>
    <?php } else { ?>
    <?php $class = 'col-sm-12'; ?>
    <?php } ?>
    <div id="content" class="<?php echo $class; ?>"><?php echo $content_top; ?>     
      <section class="content-wrapper bounceInUp animated">
        <div class="container">
          <div class="std">
            <div class="page-not-found">
              <h2><?php //echo $heading_title; ?></h2>
              <h3><?php echo $text_error; ?></h3>
              <div><a onclick="window.location='<?php echo $continue; ?>';" class="btn-home"><span><?php echo $button_continue; ?></span></a></div>
            </div>
          </div>
        </div>
      </section>
      <?php echo $content_bottom; ?>
    </div>
    <?php echo $column_right; ?></div>
</div>
<?php echo $footer; ?>