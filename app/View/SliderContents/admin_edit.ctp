<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('List Slider Content'), array('action' => 'index',$this->request->data['SliderContent']['slider_id']),array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Slider Contents'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<?php echo $this->Form->create('SliderContent',array('role'=>'form','type'=>'file','class'=>'')); ?>
					<?php
						echo $this->Form->input('id',array('class'=>'form-control','div'=>'form-group'));
						if(!empty($this->request->data['SliderContent']['image'])){
							echo '<div class="clearfix col-md-12 previewimg">';
							echo $this->Html->image($this->request->data['SliderContent']['image'], array('class'=>'thumbnail col-md-3'));
							echo '</div>';
						}
						echo '<div id="list" class="row clearfix"></div>';
						echo $this->Form->hidden('pre_image',array('type'=>'file','value'=>$this->request->data['SliderContent']['image']));
						echo $this->Form->input('image',array('type'=>'file','div'=>'form-group col-md-12','id'=>'uploadImage','required'=>false,'label'=>'image(1440X645)'));
						echo $this->Form->input('slider_id',array('type'=>'hidden', 'value'=>$this->request->data['SliderContent']['slider_id']));
						echo $this->Form->input('caption',array('type'=>'textarea','class'=>'form-control','div'=>'form-group col-md-12','required'=>false));
						echo $this->Form->input('status',array('type'=>'select', 'options'=>$status,'class'=>'form-control','div'=>'form-group col-md-3'));
						echo $this->Form->input('order',array('type'=>'text','class'=>'form-control','required'=>true,'div'=>'form-group col-md-3'));
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
