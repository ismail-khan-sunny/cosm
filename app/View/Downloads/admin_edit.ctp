<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Download List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
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
				<h3 class="box-title"><?php echo __('Download'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
						<?php echo $this->Form->create('Download',array('type'=>'file','role'=>'form','class'=>'')); ?>
						<?php echo $this->Form->input('id',array('type'=>'hidden')); ?>
						
						
						<?php
							
							
							echo $this->Form->input('title',array('class'=>'form-control','div'=>'form-group col-md-6','label'=>'Download Title'));
							echo $this->Form->input('description',array('type'=>'textarea','class'=>'form-control','div'=>'form-group col-md-12'));
							echo $this->Form->input('pre_file',array('type'=>'hidden','value'=>$this->data['Download']['file']));
							echo $this->Form->input('file',array('type'=>'file','class'=>'','div'=>'form-group col-md-12'));
							echo $this->Form->input('start_date',array('type'=>'text','class'=>'form-control','div'=>'form-group col-md-3'));
							echo $this->Form->input('end_date',array('type'=>'text','class'=>'form-control','div'=>'form-group col-md-3'));
							echo $this->Form->input('status',array('type'=>'select','options'=>$status,'empty'=>'Select Status','class'=>'form-control','div'=>'form-group col-md-3'));
						?>
					<div class="col-md-3" style="margin-top:20px;">
						<button type="button" class="btn btn-info btn-metacontent pull-right">Meta Content</button>
					</div>
					<?php 
						$hidden = 'style="display:none;"';
						if(!empty($this->request->data['Download']['meta_keyword']) || !empty($this->request->data['Download']['meta_description'])){
							$hidden = '';
						} 
					?>
					<div class="meta-content" <?php echo $hidden; ?>>
						<?php echo $this->Form->input('meta_keyword',array('class'=>'form-control','div'=>'form-group col-md-12')); ?>
						<?php echo $this->Form->input('meta_description',array('type'=>'textarea','class'=>'form-control','div'=>'form-group col-md-12')); ?>
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
<?php 
	echo $this -> Html -> css(array('datepicker/bootstrap'));
	//echo $this -> Html -> script('admin/nogoradmin/Download');
?>
<script type="text/javascript">
    CKEDITOR.replace( 'DownloadDescription' );
</script>