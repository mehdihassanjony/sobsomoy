<?php if ($thmsofttestimonials) { ?>
<?php foreach ($thmsofttestimonials as $testimonial) { ?>
<div class="table-responsive">
<table class="table table-hover">

      <thead>
      <tr>
        <th colspan="3">
          <h4><strong style="text-transform: uppercase;"><?php echo $testimonial['author']; ?></strong>
        <small><?php if($display_author_bio) { echo $testimonial['bio']; } ?></small></h4>
        </th>
        
      </tr>
    </thead>

    <tbody>
    <tr>
      <td style="width:10%">      
        <?php if($display_image) {  ?>
        <div class="image">
        <img src="<?php echo $testimonial['image'];?>" alt="image" class="img-responsive">
        </div>
      <?php } ?>
      </td>

      <td colspan="2" style="width:90%">
        <p><?php echo $testimonial['text']; ?></p>
        <?php if($display_rating) { ?>
        <?php if($testimonial['rating']) { ?>
        <div class="rating">
        <?php for ($i = 1; $i <= 5; $i++) { ?>
        <?php if ($testimonial['rating'] < $i) { ?>
        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
        <?php } else { ?>
        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
        <?php } ?>
        <?php } ?>
        <?php } ?>
        </div>
        <?php } ?>
      <div style="margin:5px 0 0 0;"><?php if($display_date_added){ echo $testimonial['date_added']; } ?> </div>
      </td>
    </tr>

    </tbody>
</table>
</div>

<?php } ?>
<div class="text-right"><?php echo $pagination; ?></div>
<?php } else { ?>
<p><?php echo $text_no_reviews; ?></p>
<?php } ?>
