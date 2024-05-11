<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Change Password'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-4 col-xs-12 col-md-4 col-sm-12 col-md-offset-4 col-lg-offset-4">
						<?php echo $this->Form->create('User',array('role'=>'form')); ?>

						<?php
							echo $this->Form->input('old_password',array('type'=>'password','autocomplete'=>'off', 'id'=>'password1','class'=>'form-control','div'=>'form-group ','required'=>true));
							echo '<div class="clearfix"></div>';
							echo $this->Form->input('password',array('type'=>'password','autocomplete'=>'off', 'id'=>'password1','class'=>'form-control','div'=>'form-group ','label'=>'New Password','required'=>true));
							echo '<div class="clearfix"></div>';
							echo $this->Form->input('confirm_password',array('type'=>'password','value'=>'', 'id'=>'password2', 'class'=>'form-control','div'=>'form-group','required'=>true));
						?>
						<div class="clearfix"></div>
						<div class="col-md-12 text-center">
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
</div>