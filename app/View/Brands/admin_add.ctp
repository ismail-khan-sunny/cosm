<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Brand List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
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
				<h3 class="box-title"><?php echo __('Brands'); ?>
</h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
				<?php echo $this->Form->create('Brand',array('type'=>'file','role'=>'form','class'=>'')); ?>
				
					
			<div class="col-md-2 display-image hover-cross">
				<?php echo $this->Html->image('no-image.png',array('id'=>'newsAvaterImage','width'=>'150')) ?>
				<span onclick="removeImageSrc('newsAvaterImage','uploadImage')"><i class="fa fa-fw fa-times-circle"></i></span>
			</div>							
						<?php
			echo $this->Form->input('pre_image',array('type'=>'hidden','value'=>''));
			echo $this->Form->input('image',array('type'=>'file','onchange'=>'displayImage(this,"newsAvaterImage")','id'=>'uploadImage','div'=>'form-group col-md-10'));		
			echo $this->Form->input('category_id',array('empty'=>'Please Select','class'=>'form-control','div'=>'form-group col-md-5','required'=>true,'options'=>$categories));					
			echo $this->Form->input('title',array('class'=>'form-control','div'=>'form-group col-md-12'));
			echo $this->Form->input('description',array('class'=>'form-control','div'=>'form-group col-md-12'));
			//echo $this->Form->input('image',array('class'=>'form-control','div'=>'form-group col-md-12'));
			echo $this->Form->input('status',array('type'=>'select','options'=>$status,'class'=>'form-control','div'=>'form-group col-md-2'));
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
