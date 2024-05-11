<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Dominion List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Panel -->
<section class="bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<?php echo __('Dominions'); ?>
			</div>
		</div>
		<div class="panel-body">
			<?php echo $this->Form->create('Dominion',array('role'=>'form','class'=>'')); ?>
			<?php
				echo $this->Form->input('Dominion.id');
				echo $this->Form->input('Dominion.name',array('class'=>'form-control','div'=>'form-group col-md-12','label'=>'Dominion Name'));
			?>
			<?php foreach($this->data['Process'] as $index=>$data):?>
				<?php echo $this->Form->input('Process.'.$index.'.id'); ?>
				<?php echo $this->Form->input('Process.'.$index.'.name',array('class'=>'form-control','div'=>'form-group col-md-3','label'=>'Action Name')); ?>
			<?php endforeach; ?>
			<?php echo $this->Form->input('More.actionname',array('class'=>'form-control','div'=>'form-group col-md-3','label'=>'Add More Action Name')); ?>
			<div class="form-group col-md-12">
			<?php
				echo $this->Form->submit('Submit',array('class'=>'btn btn-success','label'=>false,'div'=>false));
				echo $this->Form->input('Cancel',array('type'=>'reset','class'=>'btn btn-warning left-shift-reset','label'=>false,'div'=>false));
			?>
			</div>
			<?php echo $this->Form->end(); ?>
			
		</div>

	</div>
</section>
