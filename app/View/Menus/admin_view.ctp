<?php App::uses('String', 'Utility'); ?>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="btn-group hidden-nav-xs">			
					<?php echo $this->Html->link(__('Back To Menus List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?> 
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-dark btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Edit Menu'), array('action' => 'edit', $menu['Menu']['id']),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-dark btn-icon">
					<i class="fa fa-bars"></i>
				</div>
				<div class="btn-group hidden-nav-xs">			
					<?php echo $this->Html->link(__('Contents List'), array('controller' => 'contents', 'action' => 'index'),array('class' => 'btn btn-sm btn-primary')); ?> 
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-dark btn-icon">
					<i class="fa fa-times"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Form->postLink(__('Delete Menu'), array('action' => 'delete', $menu['Menu']['id']),array('class' => 'btn btn-sm btn-danger'), __('Are you sure?')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Menus'); ?></h3>
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
						<td><?php echo __('Parent Menu'); ?></td>
						<td>
							<?php echo $this->Html->link($menu['ParentMenu']['title'], array('controller' => 'menus', 'action' => 'view', $menu['ParentMenu']['id'])); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Position'); ?></td>
						<td>
							<?php echo h($menu['Menu']['position']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Title'); ?></td>
						<td>
							<?php echo h($menu['Menu']['title']); ?>
							&nbsp;
						</td>
					</tr>
				
					<tr>
						<td><?php echo __('Status'); ?></td>
						<td>
							<?php echo h($menu['Menu']['status']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Created'); ?></td>
						<td>
							<?php echo h($menu['Menu']['created']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Modified'); ?></td>
						<td>
							<?php echo h($menu['Menu']['modified']); ?>
							&nbsp;
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="related table-responsive">
			<h4> <?php echo 'Related Contents'; ?><span class='label label-success'><?php echo sizeof($menu['Content']); ?> </span>	</h4>
			<?php if (!empty($menu['Content'])): ?>
			<table class="table table-striped table-bordered  table-hover">
				<tr>
					<th><?php echo __('Title'); ?></th>
					<th><?php echo __('Status'); ?></th>
					<th><?php echo __('Created'); ?></th>
					<th><?php echo __('Modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			<?php foreach ($menu['Content'] as $content): ?>
				<tr>
					<td><?php echo $content['title']; ?></td>
					<td><?php echo $content['status']; ?></td>
					<td><?php echo $content['created']; ?></td>
					<td><?php echo $content['modified']; ?></td>
					<td class="actions">
						<?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('controller' => 'contents', 'action' => 'view', $content['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary ajax_page', 'data-toggle'=>'modal', 'data-target'=> '#modal', 'escape'=>false)); ?>
						<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('controller' => 'contents', 'action' => 'edit', $content['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info ajax_page', 'data-toggle'=>'modal', 'data-target'=> '#modal', 'escape'=>false)); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contents', 'action' => 'delete', $content['id']), null, __('Are you sure you want to delete # %s?', $content['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="related table-responsive">
			<h4> <?php echo 'Related Menus'; ?><span class='label label-success'><?php echo sizeof($menu['ChildMenu']); ?> </span>	</h4>
			<?php if (!empty($menu['ChildMenu'])): ?>
			<table class="table table-striped table-bordered  table-hover">
				<tr>
					<th><?php echo __('Position'); ?></th>
					<th><?php echo __('Title'); ?></th>
					<th><?php echo __('Status'); ?></th>
					<th><?php echo __('Created'); ?></th>
					<th><?php echo __('Modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			<?php foreach ($menu['ChildMenu'] as $childMenu): ?>
				<tr>
					<td><?php echo $childMenu['position']; ?></td>
					<td><?php echo $childMenu['title']; ?></td>
					<td><?php echo $childMenu['status']; ?></td>
					<td><?php echo $childMenu['created']; ?></td>
					<td><?php echo $childMenu['modified']; ?></td>
					<td class="actions">
						<?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('controller' => 'menus', 'action' => 'view', $childMenu['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary ajax_page', 'data-toggle'=>'modal', 'data-target'=> '#modal', 'escape'=>false)); ?>
						<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('controller' => 'menus', 'action' => 'edit', $childMenu['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info ajax_page', 'data-toggle'=>'modal', 'data-target'=> '#modal', 'escape'=>false)); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'menus', 'action' => 'delete', $childMenu['id']), null, __('Are you sure you want to delete # %s?', $childMenu['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
			<?php endif; ?>
		</div>
	</div>
</div>
