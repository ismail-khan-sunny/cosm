<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('View Configuration'), array('action' => 'view'),array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Configurations'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
						<?php echo $this->Form->create('Configuration',array('role'=>'form','type'=>'file')); ?>
							<?php
								$content_image = 'no-image.png';
								if(!empty($this->data['Configuration']['image'])){
									$content_image = $this->data['Configuration']['image'];
								} 
							?>
							<div class="col-md-2 display-image hover-cross">
								<?php echo $this->Html->image($content_image,array('class'=>'img-responsive','id'=>'configurationAvaterImage','width'=>'150')) ?>
								<span onclick="removeImageSrc('configurationAvaterImage','uploadImage','ConfigurationPreImage')"><i class="fa fa-fw fa-times-circle"></i></span>
							</div>
							<?php
							echo $this->Form->input('id');
							echo $this->Form->input('pre_image',array('type'=>'hidden','value'=>$this->request->data['Configuration']['image']));
							echo $this->Form->input('image',array('type'=>'file','id'=>'uploadImage','onchange'=>'displayImage(this,"configurationAvaterImage")','div'=>'form-group col-md-10','label'=>'Logo'));
							echo $this->Form->input('title',array('class'=>'form-control','div'=>'form-group col-md-7'));
							echo $this->Form->input('slogan',array('class'=>'form-control','div'=>'form-group col-md-3'));
							
							echo $this->Form->input('phone',array('class'=>'form-control','div'=>'form-group col-md-3'));
							echo $this->Form->input('fax',array('class'=>'form-control','div'=>'form-group col-md-3','label'=>'Email'));
							
							echo $this->Form->input('google_analytics',array('class'=>'form-control','div'=>'form-group col-md-12'));			
							
							echo $this->Form->input('meta_keywords',array('class'=>'form-control','div'=>'form-group col-md-6'));
							echo $this->Form->input('meta_description',array('class'=>'form-control','div'=>'form-group col-md-6'));
							?>
							<div class="col-md-12">
							<?php
								echo $this->Form->submit('Submit',array('class'=>'btn btn-success','label'=>false,'div'=>false)).'&nbsp;&nbsp;';
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
