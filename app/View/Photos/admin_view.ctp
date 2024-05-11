<!-- Actions -->
<header class="header bg-light b-b b-light right">
	<div class="btn-group">
		<div class="btn btn-sm btn-default btn-icon">
			<i class="fa fa-arrow-left"></i>
		</div>
		<div class="btn-group hidden-nav-xs">			
			<?php echo $this->Html->link(__('Back To Photos List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?> 
		</div>
	</div>
	
	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-edit"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Edit Photo'), array('action' => 'edit', $photo['Photo']['id']),array('class' => 'btn btn-sm btn-info ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?>
		</div>
	</div>
	
	
	
	

	<!--uncomment for php delete if ajax delete is not working.	
	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Form->postLink(__('Delete Photo'), array('action' => 'delete', $photo['Photo']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $photo['Photo']['id'])); ?>
		</div>
	</div>
	-->	
	
		
	
			
		<div class="btn-group">
			<div class="btn btn-sm btn-dark btn-icon" type="button">
				<i class="fa fa-bars"></i>
			</div>
			<div class="btn-group hidden-nav-xs">			
				<?php echo $this->Html->link(__('Photo Galleries List'), array('controller' => 'photo_galleries', 'action' => 'index'),array('class' => 'btn btn-sm btn-primary ajax_page')); ?> 
			</div>
		</div>
		
		<div class="btn-group">
			<div class="btn btn-sm btn-dark btn-icon" type="button">
				<i class="fa fa-plus"></i>
			</div>
			<div class="btn-group hidden-nav-xs">			
				<?php echo $this->Html->link(__('New Photo Gallery'), array('controller' => 'photo_galleries', 'action' => 'add'),array('class' => 'btn btn-sm btn-primary ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?> 
			</div>
		</div>
	
		
	
	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Delete Photo'), array('action' => 'delete', $photo['Photo']['id']),array('class' => 'btn btn-sm btn-danger ajax_delete')); ?>
		</div>
	</div>
</header>
<section class="photos view bg-white scrollable wrapper">
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<div class="panel-title pull-left">	
			<?php echo __('Photo'); ?>	</div>
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
		<td>
			<?php echo h($photo['Photo']['id']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Photo Gallery'); ?></td>
		<td>
			<?php echo $this->Html->link($photo['PhotoGallery']['title'], array('controller' => 'photo_galleries', 'action' => 'view', $photo['PhotoGallery']['id'])); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Description'); ?></td>
		<td>
			<?php echo h($photo['Photo']['description']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Where Is Taken'); ?></td>
		<td>
			<?php echo h($photo['Photo']['where_is_taken']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Image'); ?></td>
		<td>
			<?php echo h($photo['Photo']['image']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Date'); ?></td>
		<td>
			<?php echo h($photo['Photo']['date']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($photo['Photo']['created']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($photo['Photo']['modified']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Status'); ?></td>
		<td>
			<?php echo h($photo['Photo']['status']); ?>
			&nbsp;
		</td>
	</tr>
			</table>
		</div>	
	</div>
</div>

