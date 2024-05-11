<?php App::uses('String', 'Utility'); ?>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('New Categories'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary ')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Categories'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<p>
				<?php $fields = array('Category.name'=>'Name','Category.slug'=>'Slug','Category.code_name'=>'Code Name'); ?>
				    	<?php echo $this->Form->create('Search',array('type'=>'GET','class'=>'form-inline basic-grey')); ?>
					    	<?php echo $this->Form->input('fieldname',array('type'=>'select','options'=>$fields,'empty'=>'Select Field Name','class'=>'form-control input-sm','div'=>'form-group','label'=>false)); ?>
					    	<?php echo $this->Form->input('value',array('type'=>'text','class'=>'form-control input-sm','div'=>'form-group','placeholder'=>'Insert Search value','label'=>false)); ?>
						    <button type='submit' class='btn btn-danger btn-xs'>Search</button>
						<?php echo $this->Form->end(); ?>
				</p>
				  <table class="table table-condensed table-bordered table-striped tablesorter data-table" id="sample-table">
	            <thead>
	            	<tr>
						<th class='sorting'><?php echo $this->Paginator->sort('id', null, array('class'=>'')); ?></th>
						<th class='sorting'><?php echo $this->Paginator->sort('parent_id', null, array('class'=>'')); ?></th>
						<th class='sorting'><?php echo $this->Paginator->sort('name', null, array('class'=>'')); ?></th>
						<th class='sorting'><?php echo $this->Paginator->sort('order', null, array('class'=>'')); ?></th>
						<th class='sorting'><?php echo $this->Paginator->sort('status', null, array('class'=>'')); ?></th>
						<th class='sorting'><?php echo $this->Paginator->sort('created', null, array('class'=>'')); ?></th>
						<th class="action"><i class="fa fa-cog"></i></th>
					</tr>
	            </thead>
	            <tbody>
	            	<?php if(!empty($categories)): ?>
					<?php $sl = $this->Paginator->counter('{:start}'); foreach ($categories as $category): ?>
					<tr>
						<td><?php echo h($sl); ?>&nbsp;</td>
						<td><?php echo h($category['ParentCategory']['name']); ?>&nbsp;</td>
						<td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
						<td><?php echo h($category['Category']['order']); ?>&nbsp;</td>
						<td><?php echo h($category['Category']['status']); ?>&nbsp;</td>
						<td><?php echo h(date('d M, Y h:i:s',strtotime($category['Category']['created']))); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('action' => 'view', $category['Category']['id']),array('class'=>'btn btn-small btn-icon btn-primary', 'escape'=>false, 'data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'View'));  ?>
							<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('action' => 'edit', $category['Category']['id']),array('class'=>'btn btn-small btn-info','escape'=>false, 'data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Edit'));  ?>
							<?php echo $this->Form->postLink('<i class="fa fa-times text-white text"></i>', array('action' => 'delete', $category['Category']['id']), array('class'=>'btn btn-small btn-danger', 'escape'=>false, 'data-toggle'=>'tooltip', 'data-placement'=>'top','title'=>'Delete'), __('Are you sure?')); ?>
						</td>
					</tr>
					<?php $sl++; endforeach; ?>
					<?php else: ?>
					<tr>
						<td colspan='12'>There are no Categories found</td>
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