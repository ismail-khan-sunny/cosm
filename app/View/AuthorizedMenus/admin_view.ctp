<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Back To Authorized Menus List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add Authorized Menu'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Edit Authorized Menu'), array('action' => 'edit', $authorizedMenu['AuthorizedMenu']['id']),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-danger btn-icon">
					<i class="fa fa-times"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Delete Authorized Menu'), array('action' => 'delete', $authorizedMenu['AuthorizedMenu']['id']),array('class' => 'btn btn-sm btn-danger')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="authorizedMenus view bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<div class="panel-title pull-left">
				<?php echo __('Authorized Menu'); ?>
			</div>
		</div>

		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped  table-bordered table-hover ">
					<tr>
						<td>Field Name</td>
						<td>Value</td>
					</tr>					
					<tr>
						<td><?php echo __('Name'); ?></td>
						<td><?php echo h($authorizedMenu['AuthorizedMenu']['name']); ?>
							&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Parent Authorized Menu'); ?></td>
						<td><?php echo $this->Html->link($authorizedMenu['ParentAuthorizedMenu']['name'], array('controller' => 'authorized_menus', 'action' => 'view', $authorizedMenu['ParentAuthorizedMenu']['id'])); ?>
							&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Dominion'); ?></td>
						<td><?php echo $this->Html->link($authorizedMenu['Dominion']['name'], array('controller' => 'dominions', 'action' => 'view', $authorizedMenu['Dominion']['id'])); ?>
							&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Process'); ?></td>
						<td><?php echo $this->Html->link($authorizedMenu['Process']['name'], array('controller' => 'processes', 'action' => 'view', $authorizedMenu['Process']['id'])); ?>
							&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Icon'); ?></td>
						<td><?php echo h($authorizedMenu['AuthorizedMenu']['icon']); ?>
							&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Status'); ?></td>
						<td><?php echo h($authorizedMenu['AuthorizedMenu']['status']); ?>
							&nbsp;</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="related table-responsive">
		<h4>
			<?php echo 'Related Authorized Menus'; ?>
			<span class='label label-success'><?php echo sizeof($authorizedMenu['ChildAuthorizedMenu']); ?>
			</span>
		</h4>
		<?php if (!empty($authorizedMenu['ChildAuthorizedMenu'])): ?>
		<table class="table table-striped table-bordered  table-hover">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('Name'); ?></th>
				<th><?php echo __('Parent Id'); ?></th>
				<th><?php echo __('Dominion Id'); ?></th>
				<th><?php echo __('Process Id'); ?></th>
				<th><?php echo __('Icon'); ?></th>
				<th><?php echo __('Status'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($authorizedMenu['ChildAuthorizedMenu'] as $childAuthorizedMenu): ?>
			<tr>
				<td><?php echo $childAuthorizedMenu['id']; ?></td>
				<td><?php echo $childAuthorizedMenu['name']; ?></td>
				<td><?php echo $childAuthorizedMenu['parent_id']; ?></td>
				<td><?php echo $childAuthorizedMenu['dominion_id']; ?></td>
				<td><?php echo $childAuthorizedMenu['process_id']; ?></td>
				<td><?php echo $childAuthorizedMenu['icon']; ?></td>
				<td><?php echo $childAuthorizedMenu['status']; ?></td>
				<td class="actions"><?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('controller' => 'authorized_menus', 'action' => 'view', $childAuthorizedMenu['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary ajax_page', 'data-toggle'=>'modal', 'data-target'=> '#modal', 'escape'=>false)); ?>
					<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('controller' => 'authorized_menus', 'action' => 'edit', $childAuthorizedMenu['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info ajax_page', 'data-toggle'=>'modal', 'data-target'=> '#modal', 'escape'=>false)); ?>
					<?php echo $this->Html->link('<i class="fa fa-times text-white text"></i> ', array('controller' => 'authorized_menus', 'action' => 'delete', $childAuthorizedMenu['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger ajax_delete', 'escape'=>false)); ?>
					<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'authorized_menus', 'action' => 'delete', $childAuthorizedMenu['id']), null, __('Are you sure you want to delete # %s?', $childAuthorizedMenu['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>


	</div>
</section>
