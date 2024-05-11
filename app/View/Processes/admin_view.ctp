<!-- Actions -->
<header class="header bg-light b-b b-light right">
	<div class="btn-group">
		<div class="btn btn-sm btn-default btn-icon">
			<i class="fa fa-arrow-left"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Back To Processes List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
		</div>
	</div>

	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-edit"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Edit Process'), array('action' => 'edit', $process['Process']['id']),array('class' => 'btn btn-sm btn-info ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?>
		</div>
	</div>





	<!--uncomment for php delete if ajax delete is not working.	
	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Form->postLink(__('Delete Process'), array('action' => 'delete', $process['Process']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $process['Process']['id'])); ?>
		</div>
	</div>
	-->


	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Delete Process'), array('action' => 'delete', $process['Process']['id']),array('class' => 'btn btn-sm btn-danger ajax_delete')); ?>
		</div>
	</div>
</header>
<section class="processes view bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<div class="panel-title pull-left">
				<?php echo __('Process'); ?>
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
						<td><?php echo h($process['Process']['name']); ?> &nbsp;</td>
					</tr>
					<tr>
						<td><?php echo __('Dominion'); ?></td>
						<td><?php echo $this->Html->link($process['Dominion']['name'], array('controller' => 'dominions', 'action' => 'view', $process['Dominion']['id'])); ?>
							&nbsp;</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

</section>
