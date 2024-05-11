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
if($this->params['pass'][0]=='11'){
 ?>

<main class="page-content">
	<div class="shell section-80 section-md-0">
		<div class="range section-md-top-78 section-md-bottom-35">
			<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 20px; padding-left: 30px;">
				<h3 class="text-primary" style="border-bottom: 1px groove ! important; padding-top: 8px;">
					<?php echo $result['Service']['title']; ?>
				</h3>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<div id="cssmenu">
						<ul>
							<li class="active"><a href="#"><span><?php echo $result['Service']['title']; ?></span></a>
      						</li>
							<?php if(!empty($menu_service)): ?>
								<?php foreach ($menu_service as $key => $value) : ?>
								<li><a href="<?php echo $this->base.'/pages/service_view/'.$value['Menu']['slug'];?>"><span><?php echo $value['Menu']['title']; ?></span></a></li>
							<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					<?php
					if(!empty($result['Service']['description'])){
						echo $result['Service']['description'];
					}
					?>
				</div>	
			</div>
		</div>
	</div>
</main>
<?php 
}else{
?>

<main class="page-content min_height_fixed">
	<section>
		<div class="shell section-80 section-md-0">
			<div class="container content min_height_fixed">
				<div class="range range-md-reverse range-md-right offset-top-0">
					<div class="eee" style="margin-top:70px">
						<?php
						if(!empty($result['Service']['title'])){
							echo '<h3 class="text-primary" style="font-weight: bold;">'.$result['Service']['title'].'</h3>';
						}
						?>	
						<?php
						if(!empty($result['Service']['description'])){
							echo $result['Service']['description'];
						}
						?>	
					</div>
				</div>
			</div>
		</div>
	</section>		
</main>


<?php }

?>