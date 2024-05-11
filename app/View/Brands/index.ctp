    <main>
        <section class="well well__ins2 bg-light">
            <div class="container">
         <h3 style="border-bottom: 1px groove!important; padding-top:8px; padding-bottom:8px" class="text-primary">Brand</h2>
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
	                        <div class="col-md-4 col-sm-12 col-xs-12">
		                        <div class="box2">
		                                 <?php echo $this->Html->image($image,array('class'=>'img-responsive','alt'=>$value1['Brand']['title'])); ?>
		                           
		                            <div class="box2_cnt">
		                                <h5 >
                                         <a href="<?php echo $this->base.'/Brands/view/'.$value1['Brand']['id'];?>" >
		                                   <?php echo String::truncate(strip_tags($value1['Brand']['title']),30,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>
                                            </a>
		                                </h5>
		                            </div>
		                        </div>
	                    	</div>
	                       <?php endforeach; ?>  	
                    	</div><!--row ends-->
                    	   <?php $i++; endforeach; ?>  
                   </div><!--col-9 ends-->
        </section>
    </main>