<div class="wrapper modal-contents details_allpage">
	<div class="container content">		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		        <div class="eee">
		    		<?php
				if(!empty($result['Mission']['title'])){
				echo '<h3 style="  border-bottom: 1px groove!important; padding-top:8px; padding-bottom:8px" class="text-primary">'.$result['Mission']['title'].'</h3>';
				}
				?>	
						
				<?php
				$path = WWW_ROOT.$result['Mission']['image'];	
					
				if(!empty($result['Mission']['image']) and file_exists($path)):
				?>
				<div class="picture">
					<?php echo $this->Html->image($result['Mission']['image']);?>
					</div>	
					<?php echo $result['Mission']['description'];?>
				<?php endif; ?>	
			</div>	
		</div>
   </div>
</div>
			