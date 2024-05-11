    <main>
        <section class="well well__ins2 bg-light">
            <div class="container">
                <h3 class="text-primary" style="font-weight:bold; border-bottom: 1px groove">Brand</h3>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
             		<?php $i=0; foreach($datas as $key=>$value):
                         	 $offset="";
                         	 if(!($i==0)){
                         	  $offset="offset";	
                         	 }
             		  ?>                       
                        <div class="row <?php echo $offset;?>">
                         <?php foreach($value['Item'] as $key1=>$value1):?>
                         	 <?php  $image = $this->Custom->validImage($value1['Brand']['image'],'other'); ?>
	                        <div class="col-md-3 col-sm-12 col-xs-12">
		                        <div class="box2">
                                         <a href="<?php echo $this->base.'/categories/view/'.$value1['Brand']['category_id'].'/'.$value1['Brand']['id'];?>" >
		                                 <?php echo $this->Html->image($image,array('class'=>'img-responsive','alt'=>$value1['Brand']['title'])); ?>
                                         </a>
		                           
		                            <div class="box2_cnt">
		                             <h5 class="strong">
                                         <a href="<?php echo $this->base.'/categories/view/'.$value1['Brand']['category_id'].'/'.$value1['Brand']['id'];?>"> 
		                                   <?php echo String::truncate(strip_tags($value1['Brand']['title']),30,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>
                                            </a>
		                                </h5>
                                        <p class="big">
                                                <div class="bitgtext">
                                                <?php echo String::truncate(strip_tags($value1['Brand']['description']),110,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>   
                                                </div>
                                                 <a class="MBT-readmore" href="<?php echo $this->base.'/categories/view/'.$value1['Brand']['category_id'].'/'.$value1['Brand']['id'];?>" >    More Information >></a>
                                        </p>                                        
		                            </div>
		                        </div>
	                    	</div>
	                       <?php endforeach; ?>  	
                    	</div><!--row ends-->
                    	   <?php $i++; endforeach; ?>  
                   </div><!--col-9 ends-->
        </section>
    </main>