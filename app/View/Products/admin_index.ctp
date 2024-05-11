<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Directory List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add New Directory'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Directory'); ?>
</h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
				<p>
					<?php  $fields = array('Product.title'=>'Title'); ?>
			    	
			    	<?php echo $this->Form->create('Search',array('class'=>'form-inline','url'=>array('controller'=>'products','action'=>'admin_index'))); ?>
				    	<?php echo $this->Form->input('fieldname',array('options'=>$fields,'class'=>'form-control','div'=>'form-group','label'=>false)); ?>
				    	<?php echo $this->Form->input('value',array('type'=>'text','class'=>'form-control','div'=>'form-group','placeholder'=>'Insert Search value','label'=>false)); ?>
					    <button type="submit" class="btn">Search</button>
					<?php echo $this->Form->end(); ?>
				</p>			
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
						<table class="table table-striped table-bordered dataTable">
							<thead>
								<tr>
																			<th><?php echo $this->Paginator->sort('id', null, array('class'=>'')); ?></th>
																			<th><?php echo $this->Paginator->sort('category_id', null, array('class'=>'')); ?></th>
																			
																			<th><?php echo $this->Paginator->sort('title', null, array('class'=>'')); ?></th>
																			<th><?php echo $this->Paginator->sort('slug', null, array('class'=>'')); ?></th>
																			<th><?php echo $this->Paginator->sort('description', null, array('class'=>'')); ?></th>
																			
																			<th><?php echo $this->Paginator->sort('image', null, array('class'=>'')); ?></th>
																			<th><?php echo $this->Paginator->sort('status', null, array('class'=>'')); ?></th>
																			<th><?php echo $this->Paginator->sort('created', null, array('class'=>'')); ?></th>
																			<th><?php echo $this->Paginator->sort('modified', null, array('class'=>'')); ?></th>
																		<th><i class="fa fa-cog"></i></th>
								</tr>
							</thead>
							<tbody>
								<?php $sl = $this->Paginator->counter('{:start}'); foreach ($products as $product): ?>
					<tr>
						<td><?php echo h($sl); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
						</td>
						
						<td><?php echo h($product['Product']['title']); ?>&nbsp;</td>
						<td><?php echo h($product['Product']['slug']); ?>&nbsp;</td>
						<td>
						<?php 
							echo String::truncate(strip_tags($product['Product']['description']),200,array('ellipsis' => ' ...','exact' => false,'html'=>false)); 
						?>	
					    &nbsp;</td>
						<td>
							<?php 
						
								if(!empty($product['Product']['image'])){
									echo $this->Html->image($product['Product']['image'],array('class'=>'img-responsive','width'=>'150')); 
								}
							?>

						</td>
						<td><?php echo h($product['Product']['status']); ?>&nbsp;</td>
						<td><?php echo h($product['Product']['created']); ?>&nbsp;</td>
						<td><?php echo h($product['Product']['modified']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('action' => 'view', $product['Product']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary', 'escape'=>false)); ?>
							<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('action' => 'edit', $product['Product']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info','escape'=>false)); ?>
							<?php //echo $this->Html->link('<i class="fa fa-times text-white text"></i> ', array('action' => 'delete', $product['Product']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger ajax_delete', 'escape'=>false)); ?>
							<?php echo $this->Form->postLink('<i class="fa fa-times text-white text"></i>', array('action' => 'delete', $product['Product']['id']), array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger', 'escape'=>false), __('Are you sure?')); ?>
						</td>
					</tr>
					<?php $sl++; endforeach; ?>
							</tbody>
						</table>
						<?php if($this->Paginator->counter('{:pages}') > 1) : ?>
						<div class="panel-footer">
							<div class="row">
								<span class="col-md-5"> 
									<?php echo $this->Paginator->counter('page {:page} of pages {:pages}');?>
								</span>
								<span class="col-md-7 text-right">
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
	</div>
</div>