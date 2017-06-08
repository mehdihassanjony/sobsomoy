<div class="blog">
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="blog-outer-container">
         <div class="blog-inner">
           <div class="row">
               <?php if($postList) { ?>           
                  <?php foreach ($postList as $_postList) { ?>
                      <div class="col-lg-4 col-md-4 col-sm-4 blog-preview_item">
                          <div class="entry-thumb image-hover2">
                            <a href="<?php echo $_postList['href']; ?>">
                            <img src="<?php echo $_postList['thumb']; ?>" alt="<?php echo $_postList['name']; ?>" title="<?php echo $_postList['name']; ?>"/></a>
                          </div>                         
                          <div class="blog-preview_info">
                            <ul class="post-meta">
                              <!-- <li><i class="fa fa-user"></i>posted by <a href="<?php echo $_postList['href']; ?>"><?php echo $_postList['author']; ?></a></li> -->
                              <li><i class="fa fa-comments"></i><a href="<?php echo $_postList['href']; ?>"><?php echo $_postList['comment_total']; ?> comments </a></li>
                              <li><i class="fa fa-calendar"></i><?php $thmpublish_date = strtotime( $_postList['publish_date'] );
                            echo $mysqldate = date( 'M d, Y', $thmpublish_date );?></li>
                            </ul>                           
                            <?php if(!$hidetitle) { ?><h4 class="blog-preview_title"><a href="<?php echo $_postList['href']; ?>"><?php echo $_postList['name']; ?></a></h4>
                          <?php } ?>
                           
                             <?php if(!$hidedescription) { ?>  
                            <div class="blog-preview_desc"><?php echo $_postList['description']; ?></div>
                             <?php } ?>    
                            <a class="blog-preview_btn" href="<?php echo $_postList['href']; ?>"><?php echo $txt_readmore; ?></a>                        
                          </div>
                        </div>                      
                    <?php } ?>                    
               <?php } else { ?>
                <div class="col-xs-12 col-sm-12 wow bounceInLeft animated"> <?php echo $txt_no_article_found; ?>
                </div>                 
              <?php } ?>   
          </div>       
        </div>
      </div>
     </div>
   </div>
</div>