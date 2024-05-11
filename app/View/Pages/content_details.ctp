<style>
	.wrapper {
		line-height: 20px;
		width:100%;
	}

	.trunk8-fill {
		color: #f00;
		font-weight: bold;
	}
	.min_height_fixed{
		min-height: 600px;
	}
</style>
<main class="page-content min_height_fixed">
	<section>
		<div class="shell section-80 section-md-0">
			<div class="container content min_height_fixed">
				<br/><br/>
				<?php
				if(!($this->params['pass'][0]=='our-vision-2' || $this->params['pass'][0]=='our-strength')){
					if(!empty($result['Content']['title'])){
						echo '<h3 class="text-primary" style="border-bottom: 1px groove ! important; padding-top: 8px;">'.$result['Content']['title'].'</h3>';
					}
				}
				?>	
				<div class="range range-md-reverse range-md-right offset-top-0" style="margin-top: 20px; margin-left: 0px; margin-right: 0px;">
					<div>

						<?php
						$path = WWW_ROOT.$result['Content']['image'];					
						if(!empty($result['Content']['image']) and file_exists($path)):
							?>
						<div class="picture">
							<?php echo $this->Html->image($result['Content']['image'],array('class'=>'img-responsive','alt'=>$result['Content']['title']));?>
						</div>	
					<?php endif; ?>	
					<div class="deatil_content" style="padding-left: 30px;">
						<div class="wrapper">
							<div id="txt">
								<?php
								if(!empty($result['Content']['description'])){
									echo $result['Content']['description'];
								}
								?>	
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>		
</main>

