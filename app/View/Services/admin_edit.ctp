<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Service List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
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
				<h3 class="box-title"><?php echo __('Services'); ?>
</h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
						<?php echo $this->Form->create('Service',array('role'=>'form','class'=>'','type'=>'file')); ?>
						<?php
					$service_image = 'no-image.png';
					if(!empty($this->data['Service']['image'])){
						$service_image = $this->data['Service']['image'];
					} 
				?>
				<div class="col-md-2 display-image hover-cross">
					<?php echo $this->Html->image($service_image,array('class'=>'img-responsive','id'=>'serviceAvaterImage','style'=>'width:80px')) ?>
					<span onclick="removeImageSrc('serviceAvaterImage','uploadImage','ServicePreImage')"><i class="fa fa-fw fa-times-circle"></i></span>
				</div>
				<?php
					echo $this->Form->input('id');
					echo $this->Form->hidden('pre_image',array('value'=>$this->request->data['Service']['image']));
					echo $this->Form->input('image',array('type'=>'file','onchange'=>'displayImage(this,"serviceAvaterImage")','div'=>'form-group col-md-10','id'=>'uploadImage','label'=>'image(80X80)'));
					echo $this->Form->input('id',array('class'=>'form-control','div'=>'form-group col-md-12'));
					echo $this->Form->input('title',array('class'=>'form-control','div'=>'form-group col-md-12'));
					echo $this->Form->input('description',array('class'=>'form-control','div'=>'form-group col-md-12'));
					//echo $this->Form->input('icon',array('class'=>'form-control','div'=>'form-group col-md-12'));
					//echo $this->Form->input('status',array('class'=>'form-control','div'=>'form-group col-md-12'));
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
<script type="text/javascript">
    CKEDITOR.replace( 'ServiceDescription' );
</script>