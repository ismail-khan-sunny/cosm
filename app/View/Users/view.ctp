<!-- Actions -->
<header class="header bg-light b-b b-light right">
	<div class="btn-group">
		<div class="btn btn-sm btn-default btn-icon">
			<i class="fa fa-arrow-left"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Back To Users List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
		</div>
	</div>

	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-edit"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id']),array('class' => 'btn btn-sm btn-info ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?>
		</div>
	</div>





	<!--uncomment for php delete if ajax delete is not working.	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</div>
	</div>
	-->




	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-bars"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Roles List'), array('controller' => 'roles', 'action' => 'index'),array('class' => 'btn btn-sm btn-primary ajax_page')); ?>
		</div>
	</div>

	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-plus"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Add New Role'), array('controller' => 'roles', 'action' => 'add'),array('class' => 'btn btn-sm btn-primary ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?>
		</div>
	</div>


	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-bars"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Profiles List'), array('controller' => 'profiles', 'action' => 'index'),array('class' => 'btn btn-sm btn-primary ajax_page')); ?>
		</div>
	</div>

	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-plus"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Add New Profile'), array('controller' => 'profiles', 'action' => 'add'),array('class' => 'btn btn-sm btn-primary ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?>
		</div>
	</div>


	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Delete User'), array('action' => 'delete', $user['User']['id']),array('class' => 'btn btn-sm btn-danger ajax_delete')); ?>
		</div>
	</div>
</header>
<section class="users view bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<div class="panel-title pull-left">
				<?php echo __('User'); ?>
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
						<td><?php echo __('Id'); ?></td>
						<td><?php echo h($user['User']['id']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Username'); ?></td>
						<td><?php echo h($user['User']['username']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Email'); ?></td>
						<td><?php echo h($user['User']['email']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Password'); ?></td>
						<td><?php echo h($user['User']['password']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Role'); ?></td>
						<td><?php echo $this->Html->link($user['Role']['name'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
							&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Created'); ?></td>
						<td><?php echo h($user['User']['created']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Modified'); ?></td>
						<td><?php echo h($user['User']['modified']); ?> &nbsp;</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="related">
		<h3>
			<?php echo __('Related Profiles'); ?>
		</h3>
		<?php if (!empty($user['Profile'])): ?>
		<dl>
			<dt>
				<?php echo __('Id'); ?>
			</dt>
			<dd>
				<?php echo $user['Profile']['id']; ?>
				&nbsp;
			</dd>
			<dt>
				<?php echo __('User Id'); ?>
			</dt>
			<dd>
				<?php echo $user['Profile']['user_id']; ?>
				&nbsp;
			</dd>
			<dt>
				<?php echo __('First Name'); ?>
			</dt>
			<dd>
				<?php echo $user['Profile']['first_name']; ?>
				&nbsp;
			</dd>
			<dt>
				<?php echo __('Last Name'); ?>
			</dt>
			<dd>
				<?php echo $user['Profile']['last_name']; ?>
				&nbsp;
			</dd>
			<dt>
				<?php echo __('Address'); ?>
			</dt>
			<dd>
				<?php echo $user['Profile']['address']; ?>
				&nbsp;
			</dd>
			<dt>
				<?php echo __('City'); ?>
			</dt>
			<dd>
				<?php echo $user['Profile']['city']; ?>
				&nbsp;
			</dd>
			<dt>
				<?php echo __('State'); ?>
			</dt>
			<dd>
				<?php echo $user['Profile']['state']; ?>
				&nbsp;
			</dd>
			<dt>
				<?php echo __('Zip'); ?>
			</dt>
			<dd>
				<?php echo $user['Profile']['zip']; ?>
				&nbsp;
			</dd>
			<dt>
				<?php echo __('Phone'); ?>
			</dt>
			<dd>
				<?php echo $user['Profile']['phone']; ?>
				&nbsp;
			</dd>
			<dt>
				<?php echo __('Skypee'); ?>
			</dt>
			<dd>
				<?php echo $user['Profile']['skypee']; ?>
				&nbsp;
			</dd>
		</dl>
		<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Profile'), array('controller' => 'profiles', 'action' => 'edit', $user['Profile']['id'])); ?>
				</li>

			</ul>
		</div>
	</div>
</section>
