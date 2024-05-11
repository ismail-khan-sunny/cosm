<div class="footer">
	
	<div class="bg-white" style="">
		<?php
			if(!empty($result['Seminar']['title'])){
			echo '<h3 class="title" style=" text-decoration:underline;font-weight:bold">'.$result['Seminar']['title'].'</h3>';
			}
		?>	
		
		<?php
			$path = WWW_ROOT.$result['Seminar']['image'];					
			if(!empty($result['Seminar']['image']) and file_exists($path)):
		?>
			<div class="picture">
				<?php echo $this->Html->image($result['Seminar']['image']);?>
			</div>	
			
		<?php endif; ?>	
		<div class="deatil_content">	
			<?php
			if(!empty($result['Seminar']['description'])){
			echo $result['Seminar']['description'];
			}
			?>	
		</div>
	</div>
</div>