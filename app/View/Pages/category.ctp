<div class="container m-t-2">
	<div class="row">   
		<div class="col-md-12">
			<div class="title"><span>Category</span></div>
			<?php if(!empty($datas)):
			foreach ($datas as $categories):
				?>
			<div class="row-shadow">
			<?php  
				$i=0;foreach ($categories['Item'] as $category):
				
				$prouct_image='no-image.png';
				if(!empty($category['Category']['image'])){
					$category_image=$category['Category']['image'];   
				}
				$image = $this->Custom->validImage($category_image,'other');
				?>
				<div class="col-sm-4 col-md-3 box-product-outer with-height">
					<div class="box-product">
						<div class="img-wrapper category_image-fixes">
							<a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'product',$category['Category']['slug'])) ?>">
								<img class="category_image" src="<?php echo $this->base.$image; ?>" alt="">
							</a>
						</div>
						<h6 class="text-center"><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'product',$category['Category']['slug'])) ?>"><?php echo $category['Category']['title']; ?></a></h6>
					</div>
				</div>
				<?php $i++;endforeach; ?>

			</div>
		<?php endforeach; ?>
	<?php else: ?>
		<div class="col-lg-12">
			There are no Products found
		</div>
	<?php endif; ?>   
</div>
</div>
</div>