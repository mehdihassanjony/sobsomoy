<div class="comments-wrapper">
<?php if ($comments) { ?>
<h3> <?php echo $text_comments;?> </h3>
<ul class="commentlist">
<?php foreach ($comments as $comment) { ?>
<li class="comment">
<div class="comment-wrapper">
  <div class="comment-author vcard">
    <!-- <p class="gravatar">
    <a href="#">
    <img width="60" height="60" src="images/avatar60x60.jpg" alt="avatar">
    </a>
    </p> -->
    <span class="author"><?php echo $comment['user']; ?></span>
  </div>
<div class="comment-meta"><?php echo $comment['created_at']; ?></div>
<div class="comment-body"> <?php echo $comment['comment']; ?> </div>

  <div class="comment-body rating"> 
    <?php for ($i = 1; $i <= 5; $i++) { ?>
      <?php if ($comment['rating'] < $i) { ?>
      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
      <?php } else { ?>
      <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
      <?php } ?>
      <?php } ?>
  </div>
</div>
</li>

<?php /* ?>
<table class="table table-striped table-bordered">
  <tr>
    <td style="width: 50%;"><strong><?php echo $comment['user']; ?></strong></td>
    <td class="text-right"><?php echo $comment['created_at']; ?></td>
  </tr>
  <tr>
    <td colspan="2"><p><?php echo $comment['comment']; ?></p>
      <?php for ($i = 1; $i <= 5; $i++) { ?>
      <?php if ($comment['rating'] < $i) { ?>
      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
      <?php } else { ?>
      <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
      <?php } ?>
      <?php } ?></td>
  </tr>
</table> <?php */ ?>
<?php } ?>
</ul>
<div class="text-right"><?php echo $pagination; ?></div>
<?php } else { ?>
<p><?php echo $text_no_comments; ?></p>
<?php } ?>
</div>