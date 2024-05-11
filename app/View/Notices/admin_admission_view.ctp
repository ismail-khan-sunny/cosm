<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="btn-group hidden-nav-xs">			
					<?php echo $this->Html->link(__('Back To Admission List'), array('action' => 'admission_index'),array('class' => 'btn btn-sm btn-default')); ?> 
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add Admission'), array('action' => 'admission_add'),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Edit Admission'), array('action' => 'admission_edit', $notice['Notice']['id']),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
			
			
			
			<div class="btn-group">
				<div class="btn btn-sm btn-danger btn-icon">
					<i class="fa fa-times"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Form->postLink(__('Delete Admission'), array('action' => 'admission_delete', $notice['Notice']['id']),array('class' => 'btn btn-sm btn-danger'), __('Are you sure?')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Notice'); ?>
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
								<td><?php echo __('Title'); ?></td>
								<td>
									<?php echo h($notice['Notice']['title']); ?>
									&nbsp;
								</td>
							</tr>
							<tr>
								<td><?php echo __('Slug'); ?></td>
								<td>
									<?php echo h($notice['Notice']['slug']); ?>
									&nbsp;
								</td>
							</tr>
							<tr>
								<td><?php echo __('Description'); ?></td>
								<td>
									<?php echo $notice['Notice']['description']; ?>
									&nbsp;
								</td>
							</tr>
							<tr>
								<td><?php echo __('Image'); ?></td>
								<td>
									<?php 
										$image = 'no-image.png';
										if(!empty($this->data['Notice']['image'])){
											$image = $this->data['Notice']['image'];
										} 
										echo $this->Html->image($image,array('class'=>'img-responsive','id'=>'avaterImage','width'=>'150'))
									?>
									&nbsp;
								</td>
							</tr>
							<tr>
								<td><?php echo __('Status'); ?></td>
								<td>
									<?php echo h($notice['Notice']['status']); ?>
									&nbsp;
								</td>
							</tr>
							<tr>
								<td><?php echo __('Created'); ?></td>
								<td>
									<?php echo h($notice['Notice']['created']); ?>
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



