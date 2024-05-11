
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
<main class="page-content min_height_fixed">
	<section>
		<div class="shell section-80 section-md-0">
			<div class="container content min_height_fixed">
				<div class="range range-md-reverse range-md-right offset-top-0">
					<div class="eee" style="margin-top:70px">
						<?php
						if(!empty($result['Content']['title'])){
					echo '<h3 class="text-primary" style="  border-bottom: 1px groove!important; padding-top:8px; padding-bottom:8px">'.$result['Content']['title'].'</h3>';
					}
						?>	
						<?php
					if(!empty($result['Content']['description'])){
					echo $result['Content']['description'];
					}
					?>	
					</div>
				</div>
			</div>
		</div>
	</section>		
</main>
