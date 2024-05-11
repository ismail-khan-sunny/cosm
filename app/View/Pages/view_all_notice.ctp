<div class="wrapper modal-contents details_allpage">
	<div class="container content">
		<?php  
		  $this->Html->addCrumb('Promotion'); 
		?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		        <div class="eee">
				 <h3 class="title titlestyle">All Promotion</h3>        						
				<div class="deatil_content">
					<div class="panel-body">
						<?php if(!empty($common)){ ?>
							  <ul class="thumbnails gallery clearfix" style="padding-left: 0px;">
						    	<?php
						    	foreach ($common as $key => $value) :
									
									$str = str_replace('/thumb','', $value['Notice']['image']);
									//echo $str.'<br>';
						    	?>
							    <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 " style="list-style:none;padding-left: 0px;">
								    <div class="img-fixes">
								   	 	<a style="text-align: center; margin: auto;"  href="<?php echo $this->base.$str;?>" class="" rel="prettyPhoto[gallery]">
								   			<?php echo $this->Html->image($value['Notice']['image'],array('class'=>'lazyOwl','alt'=>$value['Notice']['title'],'title'=>$value['Notice']['title']));?>
								    	</a>
								    </div>
							    </li>
							    <?php
							    	endforeach;
							    ?>
						    </ul>
						    <?php }else{ ?>
						    	<h2 style="color: red;"> "Comming Soon !!"</h2>

						    <?php } ?>
					</div>
			  </div>  
		    </div>
		</div>
	</div>
</div>
<style type="text/css">
	.img-fixes {
    align-items: center;
    display: flex;
    width: 300px;
    height: 350px;
    text-align: center;
    width: 100%;
}
.details_allpage{
	min-height: 500px;
}
.lazyOwl{
	width: 280px;
        height: 370px;
}
</style>