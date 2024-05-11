<!-- Actions -->
<!-- <div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Back To Permissions List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
				</div>
			</div>
		
			<div class="btn-group">
				<div class="btn btn-sm btn-dark btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Edit Permission'), array('action' => 'edit', $permission['Permission']['id']),array('class' => 'btn btn-sm btn-info ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?>
				</div>
			</div>
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
					<i class="fa fa-bars"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Dominions List'), array('controller' => 'dominions', 'action' => 'index'),array('class' => 'btn btn-sm btn-primary ajax_page')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-dark btn-icon">
					<i class="fa fa-bars"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Processes List'), array('controller' => 'processes', 'action' => 'index'),array('class' => 'btn btn-sm btn-primary ajax_page')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-dark btn-icon">
					<i class="fa fa-times"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Delete Permission'), array('action' => 'delete', $permission['Permission']['id']),array('class' => 'btn btn-sm btn-danger ajax_delete')); ?>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!-- Panel -->
<section class="bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<?php echo __('Permissions'); ?>
			</div>
		</div>
		<div class="panel-body">
			
			<div class="form-group col-md-12">
			<table class="table table-bordered">
				<tr>
					<th>Sl</th>
					<th>Dominion</th>
					<th>Process</th>
				</tr>
			<?php $sl = 0; foreach($dominions as $dominion): ?>
				<tr>
					<td><?php echo $sl+1; ?></td>
					<td><?php echo $dominion['Dominion']['name']; ?></td>
					<td>
						<?php $i = 0; foreach($dominion['Process'] as $process): ?>
							<span><?php echo $process['name']; ?></span> |
						<?php $i ++ ;endforeach; ?>
					</td>
				</tr>
			<?php $sl ++ ;endforeach; ?>
			</table>
			
			</div>
		</div>

	</div>
</section>

