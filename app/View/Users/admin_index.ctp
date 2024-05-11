<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('User List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?>
				</div>
			</div>
		
			<div class="btn-group">
				<div class="btn btn-sm btn-dark btn-icon">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add New User'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Members'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
						<p>
							<?php  $fields = array('User.username'=>'Username','User.email'=>'Email Address') ?>
					    	
					    	<?php echo $this->Form->create('Search',array('class'=>'form-inline','url'=>array('controller'=>'users','action'=>'admin_index'))); ?>
					    	<?php echo $this->Form->input('fieldname',array('type'=>'select','options'=>$fields,'class'=>'form-control','div'=>'form-group','label'=>false)); ?>
					    	<?php echo $this->Form->input('value',array('type'=>'text','class'=>'form-control','div'=>'form-group','placeholder'=>'Insert Search value','label'=>false)); ?>
						    <button type="submit" class="btn">Search</button>
						<?php echo $this->Form->end(); ?>
						</p>
						<table class="table table-striped table-bordered  table-hover">
							<thead>
								<tr>
									<th>Sl</th>
									
									<th><?php echo $this->Paginator->sort('username', null, array('class'=>'ajax_page')); ?></th>
									
									<th><?php echo $this->Paginator->sort('email', null, array('class'=>'ajax_page')); ?></th>
									<th><?php echo $this->Paginator->sort('role_id', null, array('class'=>'ajax_page')); ?></th>
									<th><?php echo $this->Paginator->sort('status', null, array('class'=>'ajax_page')); ?></th>
									<th><i class="fa fa-cog"></i></th>
								</tr>
							</thead>
							<tbody>
								<?php if(!empty($users)): ?>
								<?php $sl= $this->Paginator->counter('{:start}'); foreach ($users as $user): ?>
								<tr>
									<td><?php echo h($sl); ?>&nbsp;</td>
									
									<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
									
									<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
									<td><?php echo $this->Html->link($user['Role']['name'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?></td>
									<td><?php echo h($user['User']['status']); ?>&nbsp;</td>
									<td class="action">
										<?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('action' => 'view', $user['User']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary ', 'escape'=>false)); ?>
										<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('action' => 'edit', $user['User']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info', 'escape'=>false)); ?>
										<?php echo $this->Form->postLink('<i class="fa fa-times text-white text"></i>', array('action' => 'delete', $user['User']['id']), array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger', 'escape'=>false), __('Are you sure?')); ?>
									</td>
								</tr>
								<?php $sl++; endforeach; ?>
								<?php else: ?>
									<td colspan="9">No result found. </td>
								<?php endif; ?>
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
