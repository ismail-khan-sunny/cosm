
         
          <div class="demo">
			            <div class="ticker1 modern-ticker mt-round">
			            <div class="mt-body">
			            <div class="mt-label"><a href="#" style="color:#FFF">NEWS:</a></div><div class="mt-news">
			            <ul>
			 
			            <?php foreach($get_marque as $get_marque):?>

			            <li>
                       <a style="font-weight:bold;" href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_full_notice',$get_marque['Notice']['slug'])); ?>">
                            <?php echo $get_marque['Notice']['title'] ?>
                            <span style="color:#099;margin-left:10px;">||</span>
                        </a>
                        
                    </li>
               		 <?php  endforeach; ?>    
                
              
		          		</ul>
		       	 		</div>
		          </div>
       			</div>
      		</div>
      		</div>
