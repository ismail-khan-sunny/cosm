<div class="well note" style="height:347px;padding-top: 0px;">
    <h4 class="menu-note"><strong>News Area</strong></h4>
    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <?php $sl=1;  foreach($newsCategory as $category): ?>
            <?php 
                $active = '';
                if($sl==1){
                    $active = 'active';
                }
            ?>
            <li style="border:0px solid #000; width:33.3%" class="<?php echo $active; ?>" role="presentation" class=""><a href="#<?php echo $category; ?>" id="<?php echo $category; ?>-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false"><?php echo $category; ?></a></li>
            <?php $sl++; endforeach; ?>
        </ul>
        <div id="my-tab-content" class="tab-content" style="margin-top: 10px; border:0px solid #F00;overflow: auto; max-height:225px;
         padding-right:1px;overflow-x: hidden;overflow-y: auto;">
         
         
            <?php $news = $this->Custom->categoryWiseNews($news); ?>

            <?php $sl=1;  foreach($newsCategory as $category): ?>
            <?php 
                $active = '';
                if($sl==1){
                    $active = 'active in';
                }
            ?>
            <div role="tabpanel" class="tab-pane <?php echo $active; ?> fade" id="<?php echo $category; ?>" aria-labelledby="<?php echo $category; ?>-tab">
                <?php if(!empty($news[$category])): ?>
                <?php foreach($news[$category] as $newstab):
				
				$datetime=$newstab['News']['created'];
					
				$time = strtotime($datetime);
				 ?>
                   <div >
                    
                    <div class="newsfloat" style="min-height:40px;">
                   
                        <a style="font-weight:bold;" href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_full_news',$newstab['News']['id'])); ?>">
                           

                            <?php echo String::truncate(strip_tags($newstab['News']['title']),80,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>
                        </a>
                       
                        <span class="datecolor"><?php  echo date("jS F Y", $time);  ?></span>
                    </div>
                    <br/>
                   
                    </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p>No news found.</p>
                        </div>
                    </div>
                <?php endif; ?>
                 <div class="month_bottom"></div>
            </div>
            <?php $sl++; endforeach; ?>
      </div>
    </div>
       <span skinpart="label" class="read_more" style="line-height: 40px;"><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_all_news')) ?>">+ View All News</a></span>     
</div>