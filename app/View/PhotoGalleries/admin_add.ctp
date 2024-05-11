<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Photo Gallery List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Photo Galleries'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<?php echo $this->Form->create('PhotoGallery',array('role'=>'form','type'=>'file')); ?>
					<?php
						echo $this->Form->hidden('pre_image',array('class'=>'','div'=>'form-group','value'=>''));
						echo $this->Form->input('image',array('class'=>'','div'=>'form-group col-md-12','type'=>'file','required'=>true));
						echo $this->Form->input('title',array('class'=>'form-control','div'=>'form-group col-md-6'));
						echo $this->Form->input('status',array('class'=>'form-control','options'=>$status,'empty'=>'Select One','div'=>'form-group col-md-6'));
					?>
					<div class="col-md-12">
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
