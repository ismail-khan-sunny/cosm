<div class="container m-t-2">
	<?php  $this->Html->addCrumb($this->params['pass']['0']); ?>
    <div class="row">   
        <div class="col-md-9 min_height_fixed">
               <?php echo $this->element('frontend/right_side_product');?>     
        </div>
        <div class="col-md-3 min_height_fixed">
        	<div id="sidebar" class="well sidebar-nav">
        		 <?php  foreach($all_category as $texts): ?>
	                <h5 style="font-size:20px">
	                    <small><b><?php echo $texts['Category']['title'];  ?></b></small>
	                </h5>
	                <ul class="nav nav-pills nav-stacked">
	                 <?php  foreach($texts['children'] as $text): ?>
	                    <li><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'product',$text['Category']['slug'])); ?>"><?php echo $text['Category']['title']; ?></a></li>
	                    <?php endforeach; ?> 
	                </ul>
                <?php endforeach; ?> 
            </div>
        </div>
    </div>
</div>
<style type="text/css">
	@media (min-width: 768px) {
		#main-menus {
			float: right;
			width: 12em;
		}
	}
</style>