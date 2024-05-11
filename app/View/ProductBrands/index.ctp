<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Product Brand List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add New Product Brand'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Product Brands'); ?>
</h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
						<table class="table table-striped table-bordered dataTable">
							<thead>
								<tr>
																			<th><?php echo $this->Paginator->sort('id', null, array('class'=>'')); ?></th>
																			<th><?php echo $this->Paginator->sort('product_id', null, array('class'=>'')); ?></th>
																			<th><?php echo $this->Paginator->sort('brand_id', null, array('class'=>'')); ?></th>
																		<th><i class="fa fa-cog"></i></th>
								</tr>
							</thead>
							<tbody>
								<?php $sl = $this->Paginator->counter('{:start}'); foreach ($productBrands as $productBrand): ?>
					<tr>
						<td><?php echo h($sl); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($productBrand['Product']['title'], array('controller' => 'products', 'action' => 'view', $productBrand['Product']['id'])); ?>
						</td>
						<td>
							<?php echo $this->Html->link($productBrand['Brand']['title'], array('controller' => 'brands', 'action' => 'view', $productBrand['Brand']['id'])); ?>
						</td>
						<td>
							<?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('action' => 'view', $productBrand['ProductBrand']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary', 'escape'=>false)); ?>
							<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('action' => 'edit', $productBrand['ProductBrand']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info','escape'=>false)); ?>
							<?php //echo $this->Html->link('<i class="fa fa-times text-white text"></i> ', array('action' => 'delete', $productBrand['ProductBrand']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger ajax_delete', 'escape'=>false)); ?>
							<?php echo $this->Form->postLink('<i class="fa fa-times text-white text"></i>', array('action' => 'delete', $productBrand['ProductBrand']['id']), array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger', 'escape'=>false), __('Are you sure?')); ?>
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
