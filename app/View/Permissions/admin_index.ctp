<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Permission List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?>
				</div>
			</div>
		
			<div class="btn-group">
				<div class="btn btn-sm btn-dark btn-icon">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add New Permission'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Panel -->
<section class="bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<?php echo __('Permissions'); ?>
			</div>
		</div>
		<div class="panel-body">search form</div>

		<!--Data tables-->
		<div class="table-responsive">
			<div class="dataTables_wrapper">
				<table class="table table-striped table-bordered  table-hover">
					<thead>
						<tr>
							<th>Sl</th>
							<th><?php echo $this->Paginator->sort('role_id', null, array('class'=>'')); ?></th>
							<th><i class="icon-large icon-cog "></i></th>
						</tr>
					</thead>
					<tbody>
						<?php $sl = 1; foreach ($permissions as $permission): ?>
							<tr>
								<td><?php echo h($sl); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link($permission['Role']['name'], array('controller' => 'roles', 'action' => 'view', $permission['Role']['id'])); ?>
								</td>
								<td>
									<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $permission['Permission']['role_id']),array('class'=>'btn btn-rounded btn-small btn-icon btn-primary', 'escape'=>false)); ?>
									<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('action' => 'edit', $permission['Permission']['role_id']),array('class'=>'btn btn-rounded btn-small btn-icon btn-info','escape'=>false)); ?>
									<?php echo $this->Form->postLink('<i class="fa fa-times text-white text"></i>', array('action' => 'delete', $permission['Permission']['role_id']), array('class'=>'btn btn-rounded btn-small btn-icon btn-danger', 'escape'=>false), __('Are you sure?')); ?>
								</td>
							</tr>
							<?php $sl ++; endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>


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
</section>
