    <main>
        <section class="well well__ins2 bg-light">
            <div class="container">
            <h3 class="text-primary" style="border-bottom:1px groove; padding-bottom:8px;"><?php echo $brand['Brand']['title']; ?></h2>
              <div style="text-align:center">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	             		<?php $i=0; foreach($datas as $key=>$value):
	                         	 $offset="";
	                         	 if(!($i==0)){
	                         	  $offset="offset";	
	                         	 }
	             		  ?>                       
                        <div class="row <?php echo $offset;?>">
                         <?php foreach($value['Item'] as $key1=>$value1):?>
                         	 <?php  $image = $this->Custom->validImage($value1['Product']['image'],'other'); ?>
	                        <div class="col-md-3 col-sm-12 col-xs-12" >
		                        <div class="box2">
		                            <a href="<?php echo $this->base.'/Products/view/'.$value1['Product']['id'].'/'.$value1['Product']['category_id'];;?>" >
		                                 <?php echo $this->Html->image($image,array('class'=>'img-responsive','style'=>'width:270px;height:211px','alt'=>$value1['Product']['title'])); ?>
		                            </a>
		                            <div class="box2_cnt">
		                                <h5 class="strong">
		                                   <?php echo String::truncate(strip_tags($value1['Product']['title']),30,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>
		                                </h5>

		                                <p class="big">
                        					<?php echo String::truncate(strip_tags($value1['Product']['description']),110,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>		
                        					 <a class="MBT-readmore" href="<?php echo $this->base.'/Products/view/'.$value1['Product']['id'].'/'.$value1['Product']['category_id'];;?>" >	 More Information >></a>
		                                </p>

		                            </div>
		                        </div>
	                    	</div>
	                       <?php endforeach; ?>  	
                    	</div><!--row ends-->
                    	   <?php $i++; endforeach; ?>  
                   </div><!--col-9 ends-->
        		</div>
        </section>
    </main>