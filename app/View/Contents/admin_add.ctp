<?php App::uses('String', 'Utility'); ?>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Content List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-primary ')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Contents'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
				<?php echo $this->Form->create('Content',array('role'=>'form','class'=>'','type' => 'file')); ?>
				<div class="col-md-2 display-image hover-cross">
					<?php echo $this->Html->image('no-image.png',array('class'=>'img-responsive','id'=>'contentAvaterImage','width'=>'150')) ?>
					<span onclick="removeImageSrc('contentAvaterImage','uploadImage')"><i class="fa fa-fw fa-times-circle"></i></span>
				</div>
				<?php
					$width_ration="image(1200X400)";
					echo $this->Form->hidden('pre_image',array('value'=>''));
					echo $this->Form->input('image',array('type'=>'file','onchange'=>'displayImage(this,"contentAvaterImage")','div'=>'form-group col-md-10','id'=>'uploadImage','label'=>$width_ration));
					echo $this->Form->input('title',array('class'=>'form-control','div'=>'form-group col-md-10'));
					echo $this->Form->input('description',array('class'=>'form-control','div'=>'form-group col-md-12'));
					echo $this->Form->input('type',array('class'=>'form-control','div'=>'form-group col-md-6','type'=>'select','empty'=>'Select one','options'=>$contentType));
					echo $this->Form->input('status',array('class'=>'form-control','div'=>'form-group col-md-6','type'=>'select','options'=>$contentStatus));
				?>
				<div>
					<div class="col-md-12">
						<button type="button" class="btn btn-info btn-metacontent pull-right">Meta Content</button>
					</div>
					<div class="meta-content" style="display:none;">
						<?php echo $this->Form->input('meta_keyword',array('class'=>'form-control','div'=>'form-group col-md-12')); ?>
						<?php echo $this->Form->input('meta_description',array('type'=>'textarea','class'=>'form-control','div'=>'form-group col-md-12')); ?>
					</div>
				</div>
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

<script type="text/javascript">
    CKEDITOR.replace( 'ContentDescription' );
</script>
