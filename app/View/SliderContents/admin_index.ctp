<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('List Slider'), array('controller'=>'sliders', 'action' => 'index'),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
		
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon" type="button">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('New Slider Content'), array('action' => 'add',$slider_id),array('class' => 'btn btn-sm btn-primary')); ?>
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

				<table class="table table-striped table-bordered  table-hover">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('slider_id', 'Slider Name', array('class'=>'ajax_page')); ?>
							</th>
							<th><?php echo $this->Paginator->sort('caption', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><?php echo $this->Paginator->sort('description', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><?php echo $this->Paginator->sort('image', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><?php echo $this->Paginator->sort('status', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><i class="fa fa-cog"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($sliderContents as $sliderContent): ?>
						<tr>
							<td><?php echo $this->Html->link($sliderContent['Slider']['title'], array('controller' => 'sliders', 'action' => 'view', $sliderContent['Slider']['id']), array('class'=>'ajax_page','data-toggle'=>'modal', 'data-target'=>'#modal')); ?>
							</td>
							<td><?php echo h($sliderContent['SliderContent']['caption']); ?>&nbsp;</td>
							<td><?php echo ($sliderContent['SliderContent']['description']); ?>&nbsp;</td>
							<td><?php echo $this->Html->image($sliderContent['SliderContent']['image'],array('class'=>'thumbnail','width'=>'100','height'=>'50')); ?>&nbsp;</td>
							<td><?php echo h($sliderContent['SliderContent']['status']); ?>&nbsp;</td>
							<td>
								<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('action' => 'edit', $sliderContent['SliderContent']['id'], $sliderContent['SliderContent']['slider_id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-default', 'escape'=>false)); ?>
								<?php echo $this->Form->postLink('<i class="fa fa-times text-white text"></i>', array('action' => 'delete', $sliderContent['SliderContent']['id']), array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger', 'escape'=>false), __('Are you sure?')); ?>
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