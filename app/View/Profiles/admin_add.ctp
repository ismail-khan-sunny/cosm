<!-- Panel -->
<section class="bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<?php echo __('Profiles'); ?>
			</div>
		</div>
		<div class="panel-body">
			<?php echo $this->Form->create('Profile',array('role'=>'form','class'=>'ajax_form')); ?>

			<?php
			echo $this->Form->input('user_id',array('class'=>'form-control','div'=>'form-group'));
			echo $this->Form->input('first_name',array('class'=>'form-control','div'=>'form-group'));
			echo $this->Form->input('last_name',array('class'=>'form-control','div'=>'form-group'));
			echo $this->Form->input('address',array('class'=>'form-control','div'=>'form-group'));
			echo $this->Form->input('city',array('class'=>'form-control','div'=>'form-group'));
			echo $this->Form->input('state',array('class'=>'form-control','div'=>'form-group'));
			echo $this->Form->input('zip',array('class'=>'form-control','div'=>'form-group'));
			echo $this->Form->input('phone',array('class'=>'form-control','div'=>'form-group'));
			echo $this->Form->input('skypee',array('class'=>'form-control','div'=>'form-group'));
			echo $this->Form->submit('Submit',array('class'=>'btn btn-success','label'=>false,'div'=>false));
			echo $this->Form->input('Cancel',array('type'=>'reset','class'=>'btn btn-warning left-shift-reset','label'=>false,'div'=>false));
			?>

			<?php echo $this->Form->end(); ?>
		</div>

	</div>
</section>
