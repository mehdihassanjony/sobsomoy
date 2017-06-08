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
    <div id="content" class="<?php echo $class; ?>">
      <div class="col-main">
      <div class="my-account">
      <?php echo $content_top; ?>
      <div class="page-title">
        <h2> <?php echo $heading_title; ?></h2>
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <td class="text-left" colspan="2"><?php echo $text_recurring_detail; ?></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-left" style="width: 50%;"><b><?php echo $text_order_recurring_id; ?></b> #<?php echo $order_recurring_id; ?><br />
                <b><?php echo $text_date_added; ?></b> <?php echo $date_added; ?><br />
                <b><?php echo $text_status; ?></b> <?php echo $status; ?><br />
                <b><?php echo $text_payment_method; ?></b> <?php echo $payment_method; ?></td>
              <td class="text-left" style="width: 50%;"><b><?php echo $text_order_id; ?></b> <a href="<?php echo $order; ?>">#<?php echo $order_id; ?></a><br />
                <b><?php echo $text_product; ?></b> <a href="<?php echo $product; ?>"><?php echo $product_name; ?></a><br />
                <b><?php echo $text_quantity; ?></b> <?php echo $product_quantity; ?></td>
            </tr>
          </tbody>
        </table>
        <table class="table table-hover">
          <thead>
            <tr>
              <td class="text-left"><?php echo $text_description; ?></td>
              <td class="text-left"><?php echo $text_reference; ?></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-left" style="width: 50%;"><?php echo $recurring_description; ?></td>
              <td class="text-left" style="width: 50%;"><?php echo $reference; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <h3><?php echo $text_transaction; ?></h3>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <td class="text-left"><?php echo $column_date_added; ?></td>
              <td class="text-left"><?php echo $column_type; ?></td>
              <td class="text-right"><?php echo $column_amount; ?></td>
            </tr>
          </thead>
          <tbody>
            <?php if ($transactions) { ?>
            <?php foreach ($transactions as $transaction) { ?>
            <tr>
              <td class="text-left"><?php echo $transaction['date_added']; ?></td>
              <td class="text-left"><?php echo $transaction['type']; ?></td>
              <td class="text-right"><?php echo $transaction['amount']; ?></td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td colspan="3" class="text-center"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <?php echo $recurring; ?><?php echo $content_bottom; ?></div></div></div>
    <?php echo $column_right; ?></div>
</div>
</div>
<?php echo $footer; ?>
