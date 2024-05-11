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
<?php

?>
<main class="page-content">
	<div class="shell section-80 section-md-0">
		<div class="range section-md-top-78 section-md-bottom-35">
			<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 20px; padding-left: 30px;">
				<h3 class="text-primary" style="border-bottom: 1px groove ! important; padding-top: 8px;">
					<?php 
				//	pr($result);die();
					echo $result['Content']['title']; ?>
				</h3>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<div id="cssmenu">
						<ul>
							<li class="active"><a href="#"><span><?php echo $service_view['Service']['title']; ?></span></a>
      						</li>
							<?php if(!empty($menu_service)): ?>
								<?php foreach ($menu_service as $key => $value) :
								$params = $this->params;
					        $has="";
					        $display="";
					        
					        $pass = $params['pass'][0];
					        if($slug==$value['Menu']['slug']){
					          $has="active";
					          $display="display: block;"; 
					        } 
							?>
							<li class="has-sub <?php echo $has; ?>"><a href="<?php echo $this->base.'/pages/service_view/'.$value['Menu']['slug'];?>"><span><?php echo $value['Menu']['title']; ?></span></a></li>
							<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					
					<?php
						$path = WWW_ROOT.$result['Content']['image'];					
						if(!empty($result['Content']['image']) and file_exists($path)):
					?>
					<div class="picture">
						<?php echo $this->Html->image($result['Content']['image'],array('class'=>'img-responsive','alt'=>$result['Content']['title']));?>
					</div>	
					<?php endif; ?>	
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
</main>
