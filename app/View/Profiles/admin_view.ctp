<!-- Actions -->
<header class="header bg-light b-b b-light right">
	<div class="btn-group">
		<div class="btn btn-sm btn-default btn-icon">
			<i class="fa fa-arrow-left"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Back To Profiles List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
		</div>
	</div>

	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-edit"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $profile['Profile']['id']),array('class' => 'btn btn-sm btn-info ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?>
		</div>
	</div>





	<!--uncomment for php delete if ajax delete is not working.	
	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Form->postLink(__('Delete Profile'), array('action' => 'delete', $profile['Profile']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $profile['Profile']['id'])); ?>
		</div>
	</div>
	-->




	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-bars"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Users List'), array('controller' => 'users', 'action' => 'index'),array('class' => 'btn btn-sm btn-primary ajax_page')); ?>
		</div>
	</div>

	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-plus"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Add New User'), array('controller' => 'users', 'action' => 'add'),array('class' => 'btn btn-sm btn-primary ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?>
		</div>
	</div>



	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Delete Profile'), array('action' => 'delete', $profile['Profile']['id']),array('class' => 'btn btn-sm btn-danger ajax_delete')); ?>
		</div>
	</div>
</header>
<section class="profiles view bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<div class="panel-title pull-left">
				<?php echo __('Profile'); ?>
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
						<td><?php echo h($profile['Profile']['id']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('User'); ?></td>
						<td><?php echo $this->Html->link($profile['User']['id'], array('controller' => 'users', 'action' => 'view', $profile['User']['id'])); ?>
							&nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('First Name'); ?></td>
						<td><?php echo h($profile['Profile']['first_name']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Last Name'); ?></td>
						<td><?php echo h($profile['Profile']['last_name']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Address'); ?></td>
						<td><?php echo h($profile['Profile']['address']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('City'); ?></td>
						<td><?php echo h($profile['Profile']['city']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('State'); ?></td>
						<td><?php echo h($profile['Profile']['state']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Zip'); ?></td>
						<td><?php echo h($profile['Profile']['zip']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Phone'); ?></td>
						<td><?php echo h($profile['Profile']['phone']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Skypee'); ?></td>
						<td><?php echo h($profile['Profile']['skypee']); ?> &nbsp;</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

</section>
