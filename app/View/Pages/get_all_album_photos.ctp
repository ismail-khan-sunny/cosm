   <div class="wrapper modal-contents details_allpage">
	<div class="container content"> 
	     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="bg-white" style="">
	    	<h3 class="welcome-title"><?php echo $album_title.'('.count($dataPhoto).')';?></h3>						
			<div class="deatil_content">
				<div class="" style="padding-left: 0px;">
					<?php
					
					//pr($dataAlbum);exit;
						if(!empty($dataPhoto)):

							
					?>
				    <ul class="thumbnails gallery clearfix" style="padding-left: 0px;">
				    	<?php
				    	foreach($dataPhoto as $result):
							
							$str = str_replace('/thumb','', $result['Photo']['image']);
							//echo $str.'<br>';
				    	?>
				    	
					    <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="list-style:none;padding-left: 0px;">
					   	 	<a href="<?php echo $this->base.$str;?>" class="thumbnail" rel="prettyPhoto[gallery]">
					   			<?php echo $this->Html->image($result['Photo']['image'],array('alt'=>$result['PhotoGallery']['title'],'title'=>$result['PhotoGallery']['title']));?>
					    	</a>
					    </li>
					    <?php
					    	endforeach;
					    ?>
				    </ul>
				   
				    <?php
						else:
							echo '<h3 class="welcome-title">No Photo exists</h3>';
						endif;
				    ?>
				   
				</div>
			</div>	
		</div>
	</div>
</div>
</div>
<script>
	$(document).ready(function(){
		$("area[rel^='prettyPhoto']").prettyPhoto();
		
		$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
	});	
</script>