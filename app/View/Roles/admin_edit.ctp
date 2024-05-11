<!-- Panel -->
<section class="bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<?php echo __('Roles'); ?>
			</div>
		</div>
		<div class="panel-body">
			<?php echo $this->Form->create('Role',array('role'=>'form','class'=>'ajax_form')); ?>

			<?php
			echo $this->Form->input('id',array('class'=>'form-control','div'=>'form-group'));
			echo $this->Form->input('name',array('class'=>'form-control','div'=>'form-group'));
			echo $this->Form->input('status',array('type'=>'select', 'options'=>$status, 'class'=>'form-control','div'=>'form-group'));
			echo $this->Form->submit('Submit',array('class'=>'btn btn-success','label'=>false,'div'=>false));
			echo $this->Form->input('Cancel',array('type'=>'reset','class'=>'btn btn-warning left-shift-reset','label'=>false,'div'=>false));
			?>

			<?php echo $this->Form->end(); ?>
		</div>

	</div>
</section>
