<section>
	<div class="shell section-80 section-md-0" style="margin-top:50px">
		<!-- <div class="range section-md-top-78 section-md-bottom-35">
			<div class="cell-md-4">
				<div class="divider divider-1"></div>
			</div>
		</div> -->
		<div class="range range-md-reverse range-md-right offset-top-0">
			<div class="cell-md-7 text-left inset-md-left-45">
				<h1 class="offset-md-top--9"><?php echo $welcome['Content']['title']; ?></h1>
				<p>
	              <?php echo String::truncate(strip_tags($welcome['Content']['description']),580,array('ellipsis' => '..','exact' => false,'html'=>false)); ?>
	              </p><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'content_detail',$welcome['Content']['slug'])); ?>" class="link link--effect-12">read more</a>
			</div>
			<div class="cell-md-4">
				<?php echo $this->Html->image($welcome['Content']['image'],array('class'=>'img-width')); ?>
			</div>
		</div>
	</div>
</section>