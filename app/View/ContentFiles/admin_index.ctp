<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Content List'), array('controller'=>'contents','action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?>
				</div>
			</div>
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add New Content File'), array('action' => 'add',$content_id),array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Content Files'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<table class="table table-striped table-bordered  table-hover">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id', null, array('class'=>'ajax_page')); ?></th>
							<th><?php echo $this->Paginator->sort('content_id', null, array('class'=>'ajax_page')); ?></th>
							<th><?php echo $this->Paginator->sort('title', null, array('class'=>'ajax_page')); ?></th>
							<th><?php echo $this->Paginator->sort('content_file', null, array('class'=>'ajax_page')); ?></th>
							<th><?php echo $this->Paginator->sort('created', null, array('class'=>'ajax_page')); ?></th>
							<th><?php echo $this->Paginator->sort('modified', null, array('class'=>'ajax_page')); ?></th>
							<th><i class="fa fa-cog"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if(!empty($contentFiles)):
							$sl = $this->Paginator->counter('{:start}');
							foreach ($contentFiles as $contentFile): ?>
						<tr>
							<td><?php echo h($sl); ?>&nbsp;</td>
							<td>
								<?php echo $this->Html->link($contentFile['Content']['title'], array('controller' => 'contents', 'action' => 'view', $contentFile['Content']['id'])); ?>
							</td>
							<td><?php echo h($contentFile['ContentFile']['title']); ?>&nbsp;</td>
							<td><?php echo h($contentFile['ContentFile']['content_file']); ?>&nbsp;</td>
							<td><?php echo h($contentFile['ContentFile']['created']); ?>&nbsp;</td>
							<td><?php echo h($contentFile['ContentFile']['modified']); ?>&nbsp;</td>
							<td>
								<?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('action' => 'view', $contentFile['ContentFile']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary', 'escape'=>false)); ?>
								<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('action' => 'edit', $contentFile['ContentFile']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info', 'escape'=>false)); ?>
								<?php //echo $this->Html->link('<i class="fa fa-times text-white text"></i> ', array('action' => 'delete', $contentFile['ContentFile']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger', 'escape'=>false)); ?>
								<?php echo $this->Form->postLink('<i class="fa fa-times text-white text"></i>', array('action' => 'delete', $contentFile['ContentFile']['id']), array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger', 'escape'=>false), __('Are you sure?')); ?>
							</td>
						</tr>
						<?php $sl ++ ;endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="7"><?php echo h('No Result Found.') ?></td>
							</tr>
						<?php endif; ?>
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
