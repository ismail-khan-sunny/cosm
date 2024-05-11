<div class="wrapper modal-contents details_allpage">
	<div class="container content min_height_fixed">
	<?php  
		  $this->Html->addCrumb('Gallery'); 
		?>

	      <div class="row">
	        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	        <div class="title"><span>Photo Albums(<?php echo count($dataAlbum);?>)</span></div>
	    		
	 		<div class="album_list">
				<?php
					if(!empty($dataAlbum)):
				?>
				    <ul class="thumbnails" style="padding-left: 0px;">
				    	<?php
				    	foreach($dataAlbum as $result):
				    	?>
				    	
					    <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="list-style:none;padding-left: 0px;">
					   	 <a href="<?php echo $this->base.'/pages/get_all_album_photos/'.$result['PhotoGallery']['id'].'/'.$result['PhotoGallery']['title'];?>" class="thumbnail">
					   		<?php echo $this->Html->image($result['PhotoGallery']['image'],array('alt'=>$result['PhotoGallery']['title'],'title'=>$result['PhotoGallery']['title']));?>
					   		<h5 style="text-align:center">
	                        
	                       <?php echo String::truncate(strip_tags($result['PhotoGallery']['title']),30).'('.count($result['Photo']).')'; ?>
	                       </h5>
					    </a>
					    </li>
					    <?php
					    	endforeach;
					    ?>
				    </ul>
			    <?php
					else:
						echo '<h4>No Album exists</h4>';
					endif;
			    ?>
			  </div>
	    </div>
	</div>
</div>