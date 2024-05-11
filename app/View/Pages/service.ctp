<main class="page-content">
	
	<section class="section-top-80 section-sm-top-65 section-bottom-80">
		<div class="shell section-top-17">
			<div class="range">
				<div class="cell-md-3 cell-lg-4">
					<div class="divider divider-8"></div>
					<h2 class="divider-off text-uppercase section-md-27">Services<br class="hidden visible-md-block visible-lg-block"></h2>
					<div class="divider divider-8"></div>
				</div>
				<?php
		      $count = 1;
		      $class_add="";
		      $class_now="cell-lg-2 cell-md-3 cell-sm-4 section-sm-top-80";
		      foreach($services as $service) 
		      {
		      	if($count=='1'){
					$class_add="";	
		      		
		      	}else{
		      		$class_add="cell-lg-preffix-1";
		      	}
		        if ($count%2 == 1)
		        {  
		         
		          echo '<div class="cell-lg-2 cell-md-3 cell-sm-4 section-sm-top-80 '.$class_add.'">';
		        }
		        ?>
					<div class="thumbnail-var-1">
						<div class="icon icon-lg border text-primary offset-top-45 offset-xs-top-0">
						 <?php echo $service['Service']['icon']; ?>
						</div>
						<div class="caption">
							<div class="text-md-left text-center offset-top-16"><a class="h5" href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'service_details',$service['Service']['id'])); ?>">- <?php echo $service['Service']['title']; ?></a>
								<div class="clearfix"></div>
								<?php 
										echo String::truncate(strip_tags($service['Service']['description']),100,array('ellipsis' => ' ...','exact' => false,'html'=>false)); 
									?>
							</div>
						</div>
					</div>
				
				 <?php
		        if ($count%2 == 0)
		        {
		          echo "</div>";
		        }
		        $count++;
		      }
		      if ($count%2 != 1) echo "</div>";
		      //pr($service_text);die();
		      ?>

			</div>
		</div>
	</section>
	
	<section class="bg-images-2">
		<div class="shell section-105">
			<div class="range range-xs-center">
				<div class="cell-md-10 text-center inset-md-right-22">
					<div class="divider divider-3 text-white"></div>
					<h2 class="text-white text-bold text-uppercase divider-off offset-top-20 border-bottom"><?php echo $service_text['Content']['title']; ?></h2>
					<div class="divider-bottom divider-4 text-white"></div>
					<h3 class="line-height-1 text-center text-white text-light"><?php echo $service_text['Content']['description']; ?></h3>
				</div>
			</div>
		</div>
	</section>
	
	<section class="section-top-65 section-bottom-80 secton-md-bottom-135">
		<div class="shell section-top-17">
			<div class="range range-md-reverse">
				<div class="cell-lg-4 cell-md-4">
					<div class="divider divider-1"></div>
					<h1 class="divider-off text-uppercase section-md-27">Upcoming<br class="hidden visible-md-block visible-lg-block"> Articles
					</h1>
					<div class="divider divider-1"></div>
				</div>
				 <?php 
			      $count = 1;
			      foreach($events as $event) 
			      {
			        if ($count%2 == 1)
			        {  
			          echo '<div class="cell-md-2 cell-xs-6 section-xs-60 inset-md-left-40">';
			        }
			        ?>
			        <div class="icon icon-lg border text-primary offset-top-45 offset-xs-top-0">
			          <?php echo $event['Event']['icon'];  ?>
			        </div>
			        <div class="text-md-left text-center offset-top-16" style="height:65px;">
			        <a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'event_details',$event['Event']['id'])); ?>" class="h5">
			            -<?php echo $event['Event']['title'];  ?>
			          </a>
			        </div>
			        <?php
			        if ($count%2 == 0)
			        {
			          echo "</div>";
			        }
			        $count++;
			      }
			      if ($count%2 != 1) echo "</div>";
			      ?>
				
			</div>
		</div>
	</section>
</main>