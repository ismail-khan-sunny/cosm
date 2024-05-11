<div class="wrapper modal-contents details_allpage">
	<div class="container content">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="eee">
				<?php
				if(!empty($result['Notice']['title'])){
					echo '<h3 class="title" style=" border-bottom: 1px dotted black!important;font-weight:bold">'.$result['Notice']['title'].'</h3>';
				}
				?>	
				<?php
				$path = WWW_ROOT.$result['Notice']['image'];					
				if(!empty($result['Notice']['image']) and file_exists($path)):
					?>
				<div class="picture" style="font-weight:bold">
					<?php echo $this->Html->image($result['Notice']['image'],array('class'=>'img-responsive','alt'=>$result['Notice']['title']));?>
				</div>	

			<?php endif; ?>	
			<div class="deatil_content">		
				<?php
				if(!empty($result['Notice']['description'])){
					echo $result['Notice']['description'];
				}
				?>	
			</div>
		</div>
	</div>
</div>