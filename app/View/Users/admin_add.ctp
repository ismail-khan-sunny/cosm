<!-- Panel -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Members'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
						
						<?php
							
							echo $this->Form->input('email',array('class'=>'form-control','div'=>'form-group col-md-3'));
							
							echo $this->Form->input('role_id',array('class'=>'form-control','div'=>'form-group col-md-3'));
							echo $this->Form->input('status',array('type'=>'select', 'options'=>$status, 'class'=>'form-control','div'=>'form-group col-md-3' ));
							echo $this->Form->input('username',array('class'=>'form-control','div'=>'form-group col-md-4'));
							echo $this->Form->input('password',array('class'=>'form-control','div'=>'form-group col-md-4'));
							echo $this->Form->input('confirm_password',array('type'=>'password','class'=>'form-control','div'=>'form-group col-md-4'));				
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
</div>
