<!-- Panel -->
<section class="bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<?php echo __('Photo Albums'); ?>
			</div>
		</div>
		<div class="panel-body">
			<?php echo $this->Form->create('PhotoGallery',array('role'=>'form','type'=>'file')); ?>
			
			<?php
			echo $this->Form->input('id',array('class'=>'form-control','div'=>'form-group'));
			if($logged_user['Role']['name']=='Admin'){
			//echo $this->Form->input('department_id',array('class'=>'form-control','div'=>'form-group','required'=>false,'empty'=>'Select One'));
			}else{
			//	echo $this->Form->hidden('department_id',array('class'=>'','div'=>'form-group','value'=>$logged_user['Department']['id']));
			}
			echo $this->Form->hidden('pre_image',array('value'=>$this->request->data['PhotoGallery']['image']));
			echo $this->Form->input('image',array('class'=>'','div'=>'form-group','type'=>'file'));
			if(!empty($this->request->data['PhotoGallery']['image'])){
				echo $this->Html->image($this->request->data['PhotoGallery']['image']).'<br><br>';
			}
			echo $this->Form->input('title',array('class'=>'form-control','div'=>'form-group'));
			echo $this->Form->input('status',array('class'=>'form-control','options'=>$status,'empty'=>'Select One','div'=>'form-group'));
			echo $this->Form->submit('Submit',array('class'=>'btn btn-success','label'=>false,'div'=>false));
			echo $this->Form->input('Cancel',array('type'=>'reset','class'=>'btn btn-warning left-shift-reset','label'=>false,'div'=>false));
			?>

			<?php echo $this->Form->end(); ?>
		</div>

	</div>
</section>
