	
			
	
        
		
<div class="well notea" id="notea" style="height:311px;padding-top: 0px; padding-bottom: 0px;">
    <h4 class="menu-note"><strong>Notice Board</strong></h4>
    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <?php 
			

			$sl=1;  foreach($noticeCategory as $category): ?>
                <?php 
                    $active = '';
                    if($sl==1){
                        $active = 'active';
                    }
                ?>
                <li style="width:33.3%"class="<?php echo $active; ?>" role="presentation" class=""><a href="#<?php echo $category; ?>" id="<?php echo $category; ?>-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false"><?php echo $category; ?></a></li>
            <?php $sl++; endforeach; ?>
        </ul>
        <div id="my-tab-content" class="tab-content" style="margin-top: 10px;">
            <?php $notices = $this->Custom->categoryWiseNotices($notices); ?>

            <?php $sl=1;  foreach($noticeCategory as $category): ?>
            <?php 
                $active = '';
                if($sl==1){
                    $active = 'active in';
                }
				//echo $category;
            ?>
            <div role="tabpanel" class="tab-pane <?php echo $active; ?> fade" id="<?php echo $category; ?>" aria-labelledby="<?php echo $category; ?>-tab">
           
                <?php if(!empty($notices[$category])): ?>
 
               <div id="multilines">
			<ul style="overflow: hidden;height: 234px;" class="newsticker">


                <?php foreach($notices[$category] as $notice):
				$datetime=$notice['Notice']['created'];
					$time = strtotime($datetime);
					
					
				?>
              
				<li style="border-bottom: 1px solid #cacaca;">  
                <div style="height:50px">
        			<a style="font-weight:bold;" href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_full_notice',$notice['Notice']['slug'])); ?>">
                           
                            <?php echo String::truncate(strip_tags($notice['Notice']['title']),80,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>
                        </a>
                        
                        <span class="datecolor"><?php  echo date("jS F Y", $time);  ?></span>
       			</div>
				</li>
				
                <?php endforeach; ?>
              
           </ul>
				<span skinpart="label" class="read_more" style="line-height: 40px;">
				<div class="controls"> 
				<a class="prev-button" href="javascript:void(0">Prev</a> - <a class="next-button" href="javascript:void(0)">Next</a>
				- <a class="stop-button" href="javascript:void(0)">Stop</a>
				 - <a class="start-button" href="javascript:void(0">Start</a> 
				</div>
				</span>
			
			</div>

                
                <?php else: ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p>No notice found.</p>
                        </div>
                    </div>
                <?php endif; ?>
                 <div class="month_bottom"></div>
            </div>
            
        <?php $sl++; endforeach; ?>


          </div>
      </div><!--content-->  
    <span skinpart="label" class="read_more" style="line-height: 40px;"><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_all_notice')) ?>">+ View All Notice</a></span>     
</div>


<script src="<?php echo $this->webroot; ?>js/advanced-news-tricker/jquery-1.js"></script> 
<script src="<?php echo $this->webroot; ?>js/advanced-news-tricker/newsTicker.js"></script> 
 
			<script>
            var multilines = $('#multilines .newsticker').newsTicker({
                row_height: 50,
                speed: 800,
                prevButton: $('#multilines .prev-button'),
                nextButton: $('#multilines .next-button'),
                stopButton: $('#multilines .stop-button'),
                startButton: $('#multilines .start-button'),
            });

            // Pause newsTicker on .header hover
            $('#oneliner .header').hover(function() {
                oneliner.newsTicker('pause');
            }, function() {
                oneliner.newsTicker('unpause');
            });
        </script>
	       

				
	<div class="well notes" style="height: 500px;padding-top: 0px;">
    <h4 class="menu-note"><strong>Admission Area</strong></h4>
    <div id="content" style="height:450px; overflow:auto">
         <?php foreach($addmission as $newstabs):
				
				$datetime=$newstabs['Notice']['created'];
					
				$time = strtotime($datetime);
				 ?>
                 <div class="newsfloat" style="min-height:50px;">
                   
                        <a style="font-weight:bold;" href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_full_notice',$newstabs['Notice']['slug'])); ?>">
                           
                            <?php echo String::truncate(strip_tags($newstabs['Notice']['title']),80,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>
                        </a>
                       
                        <span class="datecolor"><?php  echo date("jS F Y", $time);  ?></span>
                    </div>
                 
                 <?php endforeach; ?>
                 <span skinpart="label" class="read_more" style="line-height: 40px;"><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_all_admission')) ?>">+ View All Admission</a></span>   
       
    </div>
</div>