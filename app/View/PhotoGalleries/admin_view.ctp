<!-- Actions -->
<header class="header bg-light b-b b-light right">
	<div class="btn-group">
		<div class="btn btn-sm btn-default btn-icon">
			<i class="fa fa-arrow-left"></i>
		</div>
		<div class="btn-group hidden-nav-xs">			
			<?php echo $this->Html->link(__('Back To Photo Galleries List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?> 
		</div>
	</div>
	
	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-edit"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Edit Photo Gallery'), array('action' => 'edit', $photoGallery['PhotoGallery']['id']),array('class' => 'btn btn-sm btn-info ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?>
		</div>
	</div>
	
	
	
	

	<!--uncomment for php delete if ajax delete is not working.	
	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Form->postLink(__('Delete Photo Gallery'), array('action' => 'delete', $photoGallery['PhotoGallery']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $photoGallery['PhotoGallery']['id'])); ?>
		</div>
	</div>
	-->	
	
		
	
			
		<div class="btn-group">
			<div class="btn btn-sm btn-dark btn-icon" type="button">
				<i class="fa fa-bars"></i>
			</div>
			<div class="btn-group hidden-nav-xs">			
				<?php echo $this->Html->link(__('Users List'), array('controller' => 'users', 'action' => 'index'),array('class' => 'btn btn-sm btn-primary ajax_page')); ?> 
			</div>
		</div>
		
		<div class="btn-group">
			<div class="btn btn-sm btn-dark btn-icon" type="button">
				<i class="fa fa-plus"></i>
			</div>
			<div class="btn-group hidden-nav-xs">			
				<?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'),array('class' => 'btn btn-sm btn-primary ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?> 
			</div>
		</div>
	
			
		<div class="btn-group">
			<div class="btn btn-sm btn-dark btn-icon" type="button">
				<i class="fa fa-bars"></i>
			</div>
			<div class="btn-group hidden-nav-xs">			
				<?php echo $this->Html->link(__('Photos List'), array('controller' => 'photos', 'action' => 'index'),array('class' => 'btn btn-sm btn-primary ajax_page')); ?> 
			</div>
		</div>
		
		<div class="btn-group">
			<div class="btn btn-sm btn-dark btn-icon" type="button">
				<i class="fa fa-plus"></i>
			</div>
			<div class="btn-group hidden-nav-xs">			
				<?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add'),array('class' => 'btn btn-sm btn-primary ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?> 
			</div>
		</div>
	
		
	
	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Delete Photo Gallery'), array('action' => 'delete', $photoGallery['PhotoGallery']['id']),array('class' => 'btn btn-sm btn-danger ajax_delete')); ?>
		</div>
	</div>
</header>
<section class="photoGalleries view bg-white scrollable wrapper">
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<div class="panel-title pull-left">	
			<?php echo __('Photo Gallery'); ?>	</div>
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
			<?php echo h($photoGallery['PhotoGallery']['id']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('User'); ?></td>
		<td>
			<?php echo $this->Html->link($photoGallery['User']['id'], array('controller' => 'users', 'action' => 'view', $photoGallery['User']['id'])); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Title'); ?></td>
		<td>
			<?php echo h($photoGallery['PhotoGallery']['title']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Description'); ?></td>
		<td>
			<?php echo h($photoGallery['PhotoGallery']['description']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Where Is Taken'); ?></td>
		<td>
			<?php echo h($photoGallery['PhotoGallery']['where_is_taken']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Date'); ?></td>
		<td>
			<?php echo h($photoGallery['PhotoGallery']['date']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($photoGallery['PhotoGallery']['created']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($photoGallery['PhotoGallery']['modified']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td><?php echo __('Status'); ?></td>
		<td>
			<?php echo h($photoGallery['PhotoGallery']['status']); ?>
			&nbsp;
		</td>
	</tr>
			</table>
		</div>	
	</div>
</div>

<div class="related table-responsive">
	<h4>
		<?php echo 'Related Photos'; ?>		 <span class='label label-success'><?php echo sizeof($photoGallery['Photo']); ?> </span>	</h4>
	<?php if (!empty($photoGallery['Photo'])): ?>
	<table class="table table-striped table-bordered  table-hover">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Photo Gallery Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Where Is Taken'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($photoGallery['Photo'] as $photo): ?>
		<tr>
			<td><?php echo $photo['id']; ?></td>
			<td><?php echo $photo['photo_gallery_id']; ?></td>
			<td><?php echo $photo['description']; ?></td>
			<td><?php echo $photo['where_is_taken']; ?></td>
			<td><?php echo $photo['image']; ?></td>
			<td><?php echo $photo['date']; ?></td>
			<td><?php echo $photo['created']; ?></td>
			<td><?php echo $photo['modified']; ?></td>
			<td><?php echo $photo['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('controller' => 'photos', 'action' => 'view', $photo['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary ajax_page', 'data-toggle'=>'modal', 'data-target'=> '#modal', 'escape'=>false)); ?>
				<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('controller' => 'photos', 'action' => 'edit', $photo['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info ajax_page', 'data-toggle'=>'modal', 'data-target'=> '#modal', 'escape'=>false)); ?>
							<?php echo $this->Html->link('<i class="fa fa-times text-white text"></i> ', array('controller' => 'photos', 'action' => 'delete', $photo['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger ajax_delete', 'escape'=>false)); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'photos', 'action' => 'delete', $photo['id']), null, __('Are you sure you want to delete # %s?', $photo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
