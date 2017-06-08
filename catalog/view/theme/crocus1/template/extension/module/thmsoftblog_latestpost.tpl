<?php if($postList){ ?>
<div class="popular-posts widget widget__sidebar wow bounceInUp animated">
  	
	<h3 class="widget-title">
	<?php echo $heading_title; ?>
	</h3>

  	<div class="widget-content">
  		<ul class="posts-list unstyled clearfix">
	  <?php foreach($postList as $key => $value){ ?>

			<li>
			<figure class="featured-thumb"> 
				<a href="<?php echo $value['href'];?>"> 
					<img src="<?php echo $value['thumb'];?>" > 
				</a> 
			</figure>
			<!--featured-thumb-->

			<h4><a href="<?php echo $value['href'];?>" title="<?php echo $value['name'];?>"><?php echo $value['name'];?></a></h4>

			<p class="post-meta"><i class="icon-calendar"></i>
			<time class="entry-date"><!--<?php //echo $value['date'];?> -->
				<?php $thmpublish_date = strtotime( $value['date'] );
                 echo $mysqldate = date( 'M d, Y', $thmpublish_date );?>
			</time>
			.</p>
			</li>


		
	  <?php } ?>
	  	</ul>
	</div>
</div>
<?php } ?>