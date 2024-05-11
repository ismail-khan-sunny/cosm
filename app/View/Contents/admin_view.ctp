<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="btn-group hidden-nav-xs">			
					<?php echo $this->Html->link(__('Back To Content List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?> 
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">			
					<?php echo $this->Html->link(__('Add New Content'), array('controller' => 'Contents', 'action' => 'admin_add'),array('class' => 'btn btn-sm btn-primary')); ?> 
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-times"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Edit Content'), array('action' => 'admin_edit', $content['Content']['id']),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-danger btn-icon">
					<i class="fa fa-times"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Form->postLink(__('Delete Content'), array('action' => 'admin_delete', $content['Content']['id']),array('class' => 'btn btn-sm btn-danger'), __('Are you sure?')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Contents'); ?></h3>
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
									<?php echo h($content['Content']['title']); ?>
									&nbsp;
								</td>
							</tr>
							<tr>
								<td><?php echo __('Description'); ?></td>
								<td>
									<?php echo $content['Content']['description']; ?>
									&nbsp;
								</td>
							</tr>
							<tr>
								<td><?php echo __('Created'); ?></td>
								<td>
									<?php echo h($content['Content']['created']); ?>
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
<?php if(!empty($content['ContentFile'])): ?>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Content Files').' ('.count($content['ContentFile']).')'; ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
						<table class="table table-striped  table-bordered table-hover">
							<tr>
								<th>Sl</th>
								<th>Title</th>
								<th>File Location</th>
								<th><i class="fa fa-cog"></i></th>
							</tr>
							<?php $sl=1; foreach($content['ContentFile'] as $file): ?>
								<tr>
									<td><?php echo $sl; ?></td>
									<td><?php echo $file['title']; ?></td>
									<td><?php echo $file['content_file']; ?></td>
									<td>
										<?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('action' => 'view', $file['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary', 'escape'=>false)); ?>
										<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('action' => 'edit', $file['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info', 'escape'=>false)); ?>
										<?php echo $this->Form->postLink('<i class="fa fa-times text-white text"></i>', array('action' => 'delete', $file['id']), array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger', 'escape'=>false), __('Are you sure?')); ?>
									</td>
								</tr>
							<?php $sl++; endforeach; ?>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
<?php endif; ?>