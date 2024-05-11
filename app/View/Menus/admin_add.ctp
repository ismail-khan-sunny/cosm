<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Menu List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Menus Add'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<?php echo $this->Form->create('Menu',array('type'=>'file','role'=>'form')); ?>
					<?php
						echo $this->Form->input('is_delete_able',array('type'=>'hidden','value'=>'1'));
						echo $this->Form->input('parent_id',array('type'=>'select','options'=>$menuList,'empty'=>'Select One','class'=>'form-control','div'=>'form-group col-md-4'));
						echo $this->Form->input('type',array('type'=>'select','options'=>$menuType,'required'=>true,'class'=>'form-control','div'=>'form-group col-md-4'));
						echo $this->Form->input('position',array('type'=>'select','options'=>$menuPosition,'required'=>true,'empty'=>'Select One','class'=>'form-control','div'=>'form-group col-md-4'));
						echo $this->Form->input('title',array('class'=>'form-control','div'=>'form-group col-md-6'));
						echo $this->Form->input('content_id',array('type'=>'select','options'=>$content_list,'empty'=>'Select One','class'=>'form-control','div'=>'form-group col-md-4'));	

					?>
					<div class="form-group col-md-2">
						<?php echo $this->Html->link('<i class="fa fa-plue"></i> Add Content', array('controller'=>'Contents','action' => 'add','referer'),array('class'=>'btn btn-info btn-block btn-content','id'=>'addContent','data-target'=>'#modal','data-toggle'=>'modal', 'escape'=>false)); ?>
					</div>
					<?php
						echo $this->Form->input('slug',array('type'=>'hidden','class'=>'form-control','div'=>'form-group'));
						echo $this->Form->input('url',array('type'=>'url','class'=>'form-control','div'=>array('class'=>'form-group col-md-6 menu-url')));
						echo $this->Form->input('order',array('type'=>'text','class'=>'form-control','required'=>true,'div'=>'form-group col-md-3'));
						echo $this->Form->input('status',array('type'=>'select','options'=>$status,'class'=>'form-control','div'=>'form-group col-md-3'));
						
						echo $this->Form->hidden('pre_file',array('class'=>'','div'=>'form-group ','value'=>''));
						echo $this->Form->input('file',array('class'=>'','div'=>'form-group col-md-12','type'=>'file','label'=>'File'));
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
<?php echo $this->element('admin/modal'); ?>
<?php echo $this -> Html -> script('admin/nogoradmin/menu'); ?>