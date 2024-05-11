<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="btn-group hidden-nav-xs">			
					<?php echo $this->Html->link(__('Back To Contactuses List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?> 
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add Contactus'), array('action' => 'add'),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Edit Contactus'), array('action' => 'edit', $contactus['Contactus']['id']),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
			
			
			
			<div class="btn-group">
				<div class="btn btn-sm btn-danger btn-icon">
					<i class="fa fa-times"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Form->postLink(__('Delete Contactus'), array('action' => 'delete', $contactus['Contactus']['id']),array('class' => 'btn btn-sm btn-danger'), __('Are you sure?')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Contactus'); ?>
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
			<?php echo h($contactus['Contactus']['id']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Category'); ?></td>
		<td>
			<?php echo h($contactus['Contactus']['category']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Type'); ?></td>
		<td>
			<?php echo h($contactus['Contactus']['type']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Title'); ?></td>
		<td>
			<?php echo h($contactus['Contactus']['title']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Description'); ?></td>
		<td>
			<?php echo h($contactus['Contactus']['description']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Image'); ?></td>
		<td>
			<?php echo h($contactus['Contactus']['image']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('File'); ?></td>
		<td>
			<?php echo h($contactus['Contactus']['file']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Status'); ?></td>
		<td>
			<?php echo h($contactus['Contactus']['status']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($contactus['Contactus']['created']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Slug'); ?></td>
		<td>
			<?php echo h($contactus['Contactus']['slug']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Start Date'); ?></td>
		<td>
			<?php echo h($contactus['Contactus']['start_date']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('End Date'); ?></td>
		<td>
			<?php echo h($contactus['Contactus']['end_date']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Meta Keyword'); ?></td>
		<td>
			<?php echo h($contactus['Contactus']['meta_keyword']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Meta Description'); ?></td>
		<td>
			<?php echo h($contactus['Contactus']['meta_description']); ?>
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


