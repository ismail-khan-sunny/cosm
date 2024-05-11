

   <div class="wrapper modal-contents details_allpage">
  <div class="container content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			    <div class="eee">

				<?php
				if(!empty($result['News']['title'])){
				echo '<div class="title"><span>'.$result['News']['title'].'</span></div>';
				}
				?>	
						
					<?php
					$path = WWW_ROOT.$result['News']['image'];	
					$file =$this->base.$result['News']['file'];				
					if(!empty($result['News']['image']) and file_exists($path)):
					?>
					<div class="picture">
					<?php echo $this->Html->image($result['News']['image']);?>
					</div>	
				
					<?php endif; ?>	
						<div class="deatil_content">
							
							<?php
							if(!empty($result['News']['file'])){
								?>
							<a href="<?php echo $file; ?>">
							file: <?php echo $result['News']['title'];  ?>
							</a>
							<?php
							}
							else
							{
								
								if(!empty($result['News']['description'])){
								echo $result['News']['description'];
							}
								}
							?>	
					     </div>  
		     </div>
	       </div>
	   </div>
   </div>