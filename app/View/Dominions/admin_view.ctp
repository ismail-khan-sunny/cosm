<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Back To Dominions List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add Dominion'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary ajax_page')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Edit Dominion'), array('action' => 'edit', $dominion['Dominion']['id']),array('class' => 'btn btn-sm btn-info ajax_page')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add New Process'), array( 'action' => 'edit',$dominion['Dominion']['id']),array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-danger btn-icon">
					<i class="fa fa-times"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Form->postLink(__('Delete Dominion'), array('action' => 'delete', $dominion['Dominion']['id']),array('class' => 'btn btn-sm btn-danger'), __('Are you sure?')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="dominions view bg-white scrollable wrapper">

	<div class="related table-responsive">
		<h4>
			<?php echo 'Processes List Of '.h($dominion['Dominion']['name']); ?>
			<span class='label label-success'><?php echo sizeof($dominion['Process']); ?>
			</span>
		</h4>
		<?php if (!empty($dominion['Process'])): ?>
		<table class="table table-striped table-bordered  table-hover">
			<tr>
				<th class="text-center">Sl.No</th>
				<th class="text-center"><?php echo __('Name'); ?></th>
				<th class="actions text-center"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($dominion['Process'] as $key => $process): ?>
			<tr>
				<td style="width: 5%;" class="text-center"><?php echo $key+1;?></td>
				<td><?php echo $process['name']; ?></td>
				<td class="actions">
					<?php echo $this->Form->postLink(__('<i class="fa fa-times text-white text"></i>'), array('controller' => 'processes', 'action' => 'delete', $process['id'],$dominion['Dominion']['id']), array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger ajax_delete', 'escape'=>false), __('Are you sure you want to delete # %s?', $process['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>


	</div>
</section>
