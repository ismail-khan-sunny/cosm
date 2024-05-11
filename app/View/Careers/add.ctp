<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Career List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Panel -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Careers'); ?>
</h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
						<?php echo $this->Form->create('Career',array('role'=>'form','class'=>'')); ?>
						<?php
			echo $this->Form->input('position_apply_id',array('class'=>'form-control','div'=>'form-group col-md-12'));
			echo $this->Form->input('first_name',array('class'=>'form-control','div'=>'form-group col-md-12'));
			echo $this->Form->input('last_name',array('class'=>'form-control','div'=>'form-group col-md-12'));
			echo $this->Form->input('phone_no',array('class'=>'form-control','div'=>'form-group col-md-12'));
			echo $this->Form->input('email',array('class'=>'form-control','div'=>'form-group col-md-12'));
			echo $this->Form->input('message',array('class'=>'form-control','div'=>'form-group col-md-12'));
			echo $this->Form->input('subject',array('class'=>'form-control','div'=>'form-group col-md-12'));
			echo $this->Form->input('file',array('class'=>'form-control','div'=>'form-group col-md-12'));
			echo $this->Form->input('status',array('class'=>'form-control','div'=>'form-group col-md-12'));
			?>

						<div class="form-group col-md-12">
							<?php
			echo $this->Form->submit('Submit',array('class'=>'btn btn-success','label'=>false,'div'=>false));
			echo $this->Form->input('Cancel',array('type'=>'reset','class'=>'btn btn-warning left-shift-reset','label'=>false,'div'=>false));
			?>

						</div>
						<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
