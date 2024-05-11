 <main>
        <section class="well bg-light">
            <div class="container">
                <h3 class="text-primary" style="font-weight:bold; border-bottom: 1px groove"> Services</h3>
                  <?php $i=0; foreach($datas as $key=>$value):
             		  ?>  
	                <div class="row">
	                 <?php foreach($value['Item'] as $key1=>$value1):?>
	                 	 <?php  $image = $this->Custom->validImage($value1['Mission']['image'],'other'); ?>
	                    <div class="col-md-4 col-sm-6 col-xs-12 ">
	                        <div class="center767">
	                            <a  href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_full_mission',$value1['Mission']['id'])); ?>">
	                            <?php echo $this->Html->image($image,array('class'=>'img-add','alt'=>$value1['Mission']['title'],'style'=>'width:278px;height:133px')); ?>
	                            </a>
	                        </div>
	                        <p class="big"> 
	                         <h5 class="strong">
		                        <a  href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_full_mission',$value1['Mission']['id'])); ?>">
		                         <?php echo String::truncate(strip_tags($value1['Mission']['title']),120,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>
	                         </a>
	                         </h5></p>
	                       </div>
	                   
	                    <?php endforeach; ?>  	
            		</div>
              <?php endforeach; ?>  	
              </div>
        </section>
    </main>