<div class="custom-slider">
        <div>              
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
                <!-- Indicators -->

                <?php if($slider) { ?>
                <ol class="carousel-indicators">
                <?php for($i=0;$i<count($slider);$i++){ ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>" <?php if($i==0) echo 'class="active"';?>></li>
                <?php } ?>
                </ol>
                <?php } ?>
                
                <!-- Wrapper for slides -->
                <?php if($slider) { ?>
                <div class="carousel-inner" role="listbox">
                  <?php $i=0; foreach($slider as $slide){ ?>   
                  
                  <div class="item <?php if($i==0) echo 'active';?>"> 
                    <a href="<?php echo $slide['link'];?>" target="_blank" title="<?php if($slide['title']) {echo $slide['title'];}?>">
                    <img  src="<?php echo $slide['image']?>" data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' title="<?php if($slide['title']) {echo $slide['title'];}?>" alt="<?php if($slide['title']) {echo $slide['title'];}?>"/>
                    </a>
                    <div class="carousel-caption">
                      <h3>
                        <a href="<?php echo $slide['link'];?>" target="_blank" title="<?php if($slide['title']) {echo $slide['title'];}?>">
                          <?php if($slide['title']) {echo $slide['title'];}?>
                        </a>
                      </h3>
                      <p><?php if($slide['description']) { echo $slide['description'];}?></p>
                    </div>
                  </div>

                <?php $i++; } ?>
                </div>
                <?php } ?>
                
                <!-- Controls --> 
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>

                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
              </div>
</div>
</div>