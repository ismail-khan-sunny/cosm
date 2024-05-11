<section class="section-80">
	<div class="shell">
		<div class="range">
			<div class="cell-md-4">
				<div class="divider divider-1" style=" min-height: 90px;"></div>
				<h1 class="divider-off text-uppercase section-md-27">Our<br class="hidden visible-md-block visible-lg-block"> achievements
				</h1>
				<div class="divider divider-1" style=" min-height: 90px;"></div>
			</div>
			<?php
			$count = 1;
			foreach($achievements as $achievement) 
			{
			    if ($count%3 == 1)
			    {  
			         echo '<div class="cell-md-4 cell-sm-6 text-left section-md-top-126 offset-top-30" style="padding-top: 100px;">';
			    }
			$achievement_percerntage=100-$achievement['Achievement']['percentage'];
			// echo $achievement['Achievement']['percentage'];
			// echo "<br/>";
			// echo $achievement_percerntage;
			?>
				
				<h5 class="text-bold"><?php echo $achievement['Achievement']['title']; ?></h5>
				<div class="border-var-1 offset-top-10">
					<span data-value="<?php echo $achievement_percerntage; ?>" data-stroke="20" data-easing="linear" data-counter="true" data-duration="3000" class="progress-bar progress-bar-horizontal progress-bar-default">
						<svg viewBox="0 0 100 21" preserveAspectRatio="none meet" style="display: block; width: 100%;" height="75">
							<path d="M 0,10.5 L 100,10.5" stroke-width="21" fill-opacity="0" style="stroke-dasharray: 100, 100; stroke-dashoffset: 100;" class="progress-bar__stroke">
							</path>
						</svg>
						<p class="progress-bar__body">0</p>
					</span>
				</div>
			
			<?php
								   
			    if ($count%3 == 0)
			    {
			        echo "</div>";
			    }
			    $count++;
			}
			if ($count%3 != 1) echo "</div>";
			?>
			
		</div>
	</div>
</section>