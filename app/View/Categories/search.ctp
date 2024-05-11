    <main>
        <section class="well well__ins2 bg-light">
            <div class="container">
            <h3 class="text-primary" style="font-weight:bold;"><?php echo $category['Category']['title']; ?></h2>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div id='cssmenu'>
                        <ul>
                           <li class='active'><a href='#'><span><?php echo $category['Category']['title']; ?></span></a></li>
                             <?php $i=0; foreach($brand as $val):
                              $product = $this->Custom->getProductBrand($val['Brand']['id']);
                             // echo $i;
                              $params = $this->params;
                              $has="";
                              $display="";
                              if(array_key_exists(1, $params['pass'])){
                                $pass = $params['pass'][1];
                                if($pass==$val['Brand']['id']){
                                 $has="active";
                                  $display="display: block;"; 
                                }
                              }else{
                                if($i==0){
                                 $has="active";
                                  $display="display: block;"; 
                                }
                              }
                              
                             ?>
	                           <li class='has-sub <?php echo $has; ?>'><a href="<?php echo $this->base.'/categories/view/'.$category['Category']['id'].'/'.$val['Brand']['id'];?>" ><span><?php echo $val['Brand']['title'];  ?></span></a>
	                              <ul style="<?php echo $display; ?>">
	                              <?php foreach($product as $val1):
		                              ?>
	                                 <li>
	                                   <a href="<?php echo $this->base.'/Products/view/'.$val1['Product']['id'].'/'.$val1['Product']['category_id'];?>" >
	                                 <span><?php echo $val1['Product']['title'];  ?></span></a></li>
	                                 <?php  endforeach;?>
	                              </ul>
	                           </li>
                              <?php $i++; endforeach;?>
                        </ul>
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
             		<?php $i=0; foreach($datas as $key=>$value):
                         	 $offset="";
                         	 if(!($i==0)){
                         	  $offset="offset";	
                         	 }
             		  ?>                       
                        <div class="row <?php echo $offset;?>">
                         <?php foreach($value['Item'] as $key1=>$value1):?>
                         	 <?php  $image = $this->Custom->validImage($value1['Product']['image'],'other'); ?>
	                        <div class="col-md-4 col-sm-12 col-xs-12">
		                        <div class="box2">
		                            <a href="<?php echo $this->base.'/Products/view/'.$value1['Product']['id'].'/'.$value1['Product']['category_id'];;?>" >
		                                 <?php echo $this->Html->image($image,array('class'=>'img-responsive','style'=>'width:270px;height:211px','alt'=>$value1['Product']['title'])); ?>
		                            </a>
		                            <div class="box2_cnt">
		                                <h5 class="strong">
		                                   <?php echo String::truncate(strip_tags($value1['Product']['title']),30,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>
		                                </h5>

		                                <p class="big">
                              					<?php echo String::truncate(strip_tags($value1['Product']['description']),120,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>		
                              					 <a class="MBT-readmore" href="<?php echo $this->base.'/Products/view/'.$value1['Product']['id'].'/'.$value1['Product']['category_id'];;?>" >	 More Information >></a>
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