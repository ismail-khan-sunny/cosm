<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Dashboard'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<?php $bg = array('bg-aqua','bg-green','bg-yellow','bg-red','bg-lime','bg-olive','bg-purple','bg-maroon','bg-navy','bg-aqua','bg-green') ?>
					<?php $i=0; foreach($dashboard_datas as $data): ?>
						<div class="col-lg-4 col-xs-12 col-md-4 col-sm-12">
	                        <!-- small box -->
	                        <div class="small-box <?php echo $bg[$i]; ?>">
	                            <div class="inner">
	                                <h3><?php echo $data['name']; ?></h3>
	                                <h3> <?php echo $data['total_data']; ?></h3>
	                            </div>
	                            <div class="icon">
	                            	<?php echo $data['icon']; ?>
	                            </div>
	                            <a href="<?php echo $this->Html->url(array('controller'=>$data['controller'],'action'=>$data['action'])) ?>" class="small-box-footer">
	                                More info <i class="fa fa-arrow-circle-right"></i>
	                            </a>
	                        </div>
						</div>
					<?php $i++; endforeach; ?>
					
				</div>
			</div>
		</div>
	</div>
</div>