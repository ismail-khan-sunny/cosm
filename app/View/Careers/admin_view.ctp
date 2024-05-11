<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="btn-group hidden-nav-xs">			
					<?php echo $this->Html->link(__('Back To Careers List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?> 
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add Career'), array('action' => 'add'),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Edit Career'), array('action' => 'edit', $career['Career']['id']),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
			
			
			
			<div class="btn-group">
				<div class="btn btn-sm btn-danger btn-icon">
					<i class="fa fa-times"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Form->postLink(__('Delete Career'), array('action' => 'delete', $career['Career']['id']),array('class' => 'btn btn-sm btn-danger'), __('Are you sure?')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Career'); ?>
</h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
						<table class="table table-striped  table-bordered table-hover ">
			  				<tr>
			  					<td>Field Name</td>
			  					<td>Value</td>
			  				</tr>
								<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($career['Career']['id']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Position Apply'); ?></td>
		<td>
			<?php echo $this->Html->link($career['PositionApply']['title'], array('controller' => 'position_applies', 'action' => 'view', $career['PositionApply']['id'])); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('First Name'); ?></td>
		<td>
			<?php echo h($career['Career']['first_name']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Last Name'); ?></td>
		<td>
			<?php echo h($career['Career']['last_name']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Phone No'); ?></td>
		<td>
			<?php echo h($career['Career']['phone_no']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Email'); ?></td>
		<td>
			<?php echo h($career['Career']['email']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Message'); ?></td>
		<td>
			<?php echo h($career['Career']['message']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Subject'); ?></td>
		<td>
			<?php echo h($career['Career']['subject']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('File'); ?></td>
		<td>
			<?php echo h($career['Career']['file']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Status'); ?></td>
		<td>
			<?php echo h($career['Career']['status']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($career['Career']['created']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($career['Career']['modified']); ?>
			&nbsp;
		</td>
	</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



