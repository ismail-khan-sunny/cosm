<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<?php if($this->Custom->canAccess($this->params['controller'],$action='admin_add')):?>
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon" type="button">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('New Slider'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Sliders'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table class="table table-striped table-bordered  table-hover">
					<thead>
						<tr>
							<th class="center"><?php echo $this->Paginator->sort('Slider Title', null, array('class'=>'ajax_page')); ?></th>
							<th class="center"><?php echo $this->Paginator->sort('status', null, array('class'=>'ajax_page')); ?></th>
							<th class="center" width="25%"><i class="fa fa-cog"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($sliders as $slider): ?>
						<tr>
							<td class="center">
								<?php echo $this->Html->link($slider['Slider']['title'], array('controller' => 'sliders', 'action' => 'view', $slider['Slider']['id']), array('class'=>'')); ?>
								&nbsp;
							</td>
							
							<td class="center"><?php echo h($slider['Slider']['status']); ?>&nbsp;</td>
													
							<td class="action">
								<?php echo $this->Html->link('<i class="fa fa-plus"></i> Manage Photo',array('controller'=>'SliderContents','action' => 'index',$slider['Slider']['id']),array('class'=>'btn btn-sm btn-info','escape'=>false));?>	
								<?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('action' => 'view', $slider['Slider']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary ', 'escape'=>false)); ?>
								<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('action' => 'edit', $slider['Slider']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info ','escape'=>false)); ?>
								<?php echo $this->Form->postLink('<i class="fa fa-times text-white text"></i>', array('action' => 'delete', $slider['Slider']['id']), array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger', 'escape'=>false), __('Are you sure?')); ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php if($this->Paginator->counter('{:pages}') > 1) : ?>
				<div class="panel-footer">
					<div class="row">
						<span class="col-md-5"> <?php echo $this->Paginator->counter('page {:page} of pages {:pages}');?>
						</span> <span class="col-md-7 text-right">
							<ul class="pagination pagination-sm ">
								<?php
								echo $this->Paginator->prev('&laquo;', array('tag'=>'li','escape'=>false,'class' => 'ajax_page'), null, array('class' => 'disabled','tag'=>'li','disabledTag'=>'a','escape'=>false));
								echo $this->Paginator->numbers(array('separator' => '','tag'=>'li','currentTag'=>'a','currentClass'=>'active','class' => 'ajax_page'));
								echo $this->Paginator->next('&raquo;', array('tag'=>'li','escape'=>false,'class' => 'ajax_page'), null, array('class' => 'disabled','tag'=>'li','escape'=>false,'disabledTag'=>'a'));
								?>
							</ul>
						</span>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
