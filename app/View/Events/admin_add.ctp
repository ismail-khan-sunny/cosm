<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Upcoming Articles List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
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
				<h3 class="box-title"><?php echo __('Upcoming Articles'); ?>
					</h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<?php echo $this->Form->create('Event',array('role'=>'form','class'=>'')); ?>
					<?php
						echo $this->Form->input('title',array('class'=>'form-control','div'=>'form-group col-md-12'));
						echo $this->Form->input('description',array('class'=>'form-control','div'=>'form-group col-md-12'));
						echo $this->Form->input('icon',array('type'=>'text','class'=>'form-control','div'=>'form-group col-md-3'));
					?>
					<div class="form-group col-md-12">
						<?php
							echo $this->Form->submit('Submit',array('class'=>'btn btn-success','label'=>false,'div'=>false)).'&nbsp;';
							echo $this->Form->input('Cancel',array('type'=>'reset','class'=>'btn btn-warning left-shift-reset','label'=>false,'div'=>false));
						?>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $this -> Html -> css(array('datepicker/bootstrap')); ?>
<script type="text/javascript">
    CKEDITOR.replace( 'EventDescription' );
</script>