<!-- Actions -->
<header class="header bg-light b-b b-light right">
	<div class="btn-group">
		<div class="btn btn-sm btn-default btn-icon">
			<i class="fa fa-arrow-left"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Back To Roles List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
		</div>
	</div>
	
	

	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-edit"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Edit Role'), array('action' => 'edit', $role['Role']['id']),array('class' => 'btn btn-sm btn-info ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?>
		</div>
	</div>

	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-wrench icon"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Set Permission'), array('action' => 'permission', $role['Role']['id']),array('class' => 'btn btn-sm btn-info ajax_page')); ?>
		</div>
	</div>

	<!--uncomment for php delete if ajax delete is not working.	
	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Form->postLink(__('Delete Role'), array('action' => 'delete', $role['Role']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $role['Role']['id'])); ?>
		</div>
	</div>
	-->


	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Delete Role'), array('action' => 'delete', $role['Role']['id']),array('class' => 'btn btn-sm btn-danger ajax_delete')); ?>
		</div>
	</div>
</header>
<section class="roles view bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<div class="panel-title pull-left">
				<?php echo __('Role'); ?>
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
						<td><?php echo h($role['Role']['name']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Status'); ?></td>
						<td><?php echo h($role['Role']['status']); ?> &nbsp;</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="related table-responsive">
		<h4>
			<?php echo 'Related Users'; ?>
			<span class='label label-success'><?php echo sizeof($role['User']); ?>
			</span>
		</h4>
		<?php if (!empty($role['User'])): ?>
		<table class="table table-striped table-bordered  table-hover">
			<tr>
				<th><?php echo __('Username'); ?></th>
				<th><?php echo __('Email'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($role['User'] as $user): ?>
			<tr>
				<td><?php echo $user['username']; ?></td>
				<td><?php echo $user['email']; ?></td>
				<td class="actions"><?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('controller' => 'users', 'action' => 'view', $user['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary ajax_page', 'data-toggle'=>'modal', 'data-target'=> '#modal', 'escape'=>false)); ?>
					<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('controller' => 'users', 'action' => 'edit', $user['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info ajax_page', 'data-toggle'=>'modal', 'data-target'=> '#modal', 'escape'=>false)); ?>
					<?php echo $this->Html->link('<i class="fa fa-times text-white text"></i> ', array('controller' => 'users', 'action' => 'delete', $user['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger ajax_delete', 'escape'=>false)); ?>
					<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>


	</div>
</section>
