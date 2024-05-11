<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Back To Member List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $user['User']['id']),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Member'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-2 col-xs-12 col-md-2 col-sm-12">
						<?php
							//pr($user);
							$img = 'profile.jpg';
							if(!empty($user['Profile']['image'])){
								$img = $user['Profile']['image'];
							}
							echo $this->Html->image($img,array('class'=>'img-thumbnail'));
						?>
					</div>
					<div class="col-lg-10 col-xs-12 col-md-10 col-sm-12">
						<table class="table table-striped  table-bordered table-hover ">
							<tr>
								<th>Field Name</th>
								<th>Value</th>
							</tr>
							
							<tr>
								<td><?php echo __('Username'); ?></td>
								<td><?php echo h($user['User']['username']); ?> &nbsp;</td>
							</tr>
							<tr>
								<td><?php echo __('Email'); ?></td>
								<td><?php echo h($user['User']['email']); ?> &nbsp;</td>
							</tr>
		
							
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
