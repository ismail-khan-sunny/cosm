<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="btn-group hidden-nav-xs">			
					<?php echo $this->Html->link(__('Back To Content Files List'), array('action' => 'index',$contentFile['ContentFile']['content_id']),array('class' => 'btn btn-sm btn-default')); ?> 
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-bars"></i>
				</div>
				<div class="btn-group hidden-nav-xs">			
					<?php echo $this->Html->link(__('Contents List'), array('controller' => 'contents', 'action' => 'index'),array('class' => 'btn btn-sm btn-primary')); ?> 
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-success btn-icon">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add Content File'), array('action' => 'add', $contentFile['ContentFile']['content_id']),array('class' => 'btn btn-sm btn-success')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Edit Content File'), array('action' => 'edit', $contentFile['ContentFile']['id']),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-danger btn-icon">
					<i class="fa fa-times"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Delete Content File'), array('action' => 'delete', $contentFile['ContentFile']['id']),array('class' => 'btn btn-sm btn-danger')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Content Files'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table class="table table-striped  table-bordered table-hover ">
	  				<tr>
	  					<td>Field Name</td>
	  					<td>Value</td>
	  				</tr>
					<tr>
						<td><?php echo __('Content'); ?></td>
						<td>
							<?php echo $this->Html->link($contentFile['Content']['title'], array('controller' => 'contents', 'action' => 'view', $contentFile['Content']['id'])); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Content File'); ?></td>
						<td>
							<?php echo h($contentFile['ContentFile']['content_file']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Created'); ?></td>
						<td>
							<?php echo h($contentFile['ContentFile']['created']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Modified'); ?></td>
						<td>
							<?php echo h($contentFile['ContentFile']['modified']); ?>
							&nbsp;
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
