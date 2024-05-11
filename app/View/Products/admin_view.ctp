<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="btn-group hidden-nav-xs">			
					<?php echo $this->Html->link(__('Back To Directory List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?> 
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add Directory'), array('action' => 'add'),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Edit Directory'), array('action' => 'edit', $product['Product']['id']),array('class' => 'btn btn-sm btn-info')); ?>
				</div>
			</div>
			
			
			
			<div class="btn-group">
				<div class="btn btn-sm btn-danger btn-icon">
					<i class="fa fa-times"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Form->postLink(__('Delete Directory'), array('action' => 'delete', $product['Product']['id']),array('class' => 'btn btn-sm btn-danger'), __('Are you sure?')); ?>
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
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
						<table class="table table-striped  table-bordered table-hover ">
			  				<tr>
			  					<td>Field Name</td>
			  					<td>Value</td>
			  				</tr>
								<tr>
										<td><?php echo __('Id'); ?></td>
										<td>
											<?php echo h($product['Product']['id']); ?>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td><?php echo __('Category'); ?></td>
										<td>
											<?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
											&nbsp;
										</td>
									</tr>

									<tr>
										<td><?php echo __('Title'); ?></td>
										<td>
											<?php echo h($product['Product']['title']); ?>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td><?php echo __('image'); ?></td>
										<td>
											<?php 
						
								if(!empty($product['Product']['image'])){
									echo $this->Html->image($product['Product']['image'],array('class'=>'img-responsive','width'=>'150')); 
								}
							?>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td><?php echo __(' Description'); ?></td>
										<td>
											<?php echo ($product['Product']['description']); ?>
											&nbsp;
										</td>
									</tr>
									
									
									<tr>
										<td><?php echo __('Status'); ?></td>
										<td>
											<?php echo h($product['Product']['status']); ?>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td><?php echo __('Created'); ?></td>
										<td>
											<?php echo h($product['Product']['created']); ?>
											&nbsp;
										</td>
									</tr>
									<tr>
										<td><?php echo __('Modified'); ?></td>
										<td>
											<?php echo h($product['Product']['modified']); ?>
											&nbsp;
										</td>
									</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if (!empty($product['ProductImage'])): ?>

<div class="box pattern pattern-sandstone">
    <div class="box-header">
      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<i class="fa fa-eye fa-2x"></i>
        	<h5><?php echo 'Related Product Images'; ?>  <span class='label label-success'><?php echo sizeof($product['ProductImage']); ?> </span></h5>
      	</div>
    </div>
    <div class="box-content box-table">
    	<div class="data-form">
			<table class="table table-condensed table-bordered table-striped tablesorter data-table">
				<thead>
					<tr>
						<th><?php echo __('Id'); ?></th>
						<th><?php echo __('Image'); ?></th>
						
					</tr>
				</thead>
				<tbody>
					<?php $sl = 1; foreach ($product['ProductImage'] as $productImage): ?>
						<tr>
							<td><?php echo $sl; ?></td>
							<td><?php echo $this->Html->image($productImage['image'],array('width'=>'80')); ?>
								
							</td>
						
							
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
    </div>
</div>
<?php endif; ?>

