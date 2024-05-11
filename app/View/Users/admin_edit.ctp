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
						<?php echo $this->Form->create('User',array('type'=>'file','role'=>'form','class'=>'ajax_form')); ?>

						<?php
							echo $this->Form->input('id',array('type'=>'hidden'));
							echo $this->Form->input('Profile.id',array('type'=>'hidden'));
						?>
						
						<?php 
							$img = 'no-image.png';
							if(!empty($this->data['Profile']['image'])){
								$img = $this->data['Profile']['image'];
							}
						?>
						<div class="col-md-2 display-image hover-cross">
							<?php echo $this->Html->image($img,array('class'=>'img-responsive','id'=>'userAvaterImage','width'=>'150')) ?>
							<span onclick="removeImageSrc('userAvaterImage','ProfileImage')"><i class="fa fa-fw fa-times-circle"></i></span>
						</div>
						<?php
							
							echo $this->Form->input('email',array('class'=>'form-control','div'=>'form-group col-md-3'));
							
							
							echo $this->Form->input('role_id',array('class'=>'form-control','div'=>'form-group col-md-3'));
							echo $this->Form->input('status',array('type'=>'select', 'options'=>$status, 'class'=>'form-control','div'=>'form-group col-md-3' ));
							echo $this->Form->input('username',array('class'=>'form-control','div'=>'form-group col-md-4'));			
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
