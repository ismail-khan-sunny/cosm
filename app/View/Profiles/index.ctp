<!-- Actions -->
<header class="header bg-light b-b b-light right">

	<div class="btn-group">
		<div class="btn btn-sm btn-default btn-icon">
			<i class="fa fa-list-alt"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Profile List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
		</div>
	</div>

	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-plus"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Add New Profile'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary ajax_page','data-toggle'=>'modal', 'data-target'=>'#modal')); ?>
		</div>
	</div>
</header>

<!-- Panel -->
<section class="bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<?php echo __('Profiles'); ?>
			</div>
		</div>
		<div class="panel-body">search form</div>

		<!--Data tables-->
		<div class="table-responsive">
			<div class="dataTables_wrapper">
				<table class="table table-striped table-bordered  table-hover">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><?php echo $this->Paginator->sort('user_id', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><?php echo $this->Paginator->sort('first_name', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><?php echo $this->Paginator->sort('last_name', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><?php echo $this->Paginator->sort('address', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><?php echo $this->Paginator->sort('city', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><?php echo $this->Paginator->sort('state', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><?php echo $this->Paginator->sort('zip', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><?php echo $this->Paginator->sort('phone', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><?php echo $this->Paginator->sort('skypee', null, array('class'=>'ajax_page')); ?>
							</th>
							<th><i class="fa fa-cog"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($profiles as $profile): ?>
						<tr>
							<td><?php echo h($profile['Profile']['id']); ?>&nbsp;</td>
							<td><?php echo $this->Html->link($profile['User']['id'], array('controller' => 'users', 'action' => 'view', $profile['User']['id'])); ?>
							</td>
							<td><?php echo h($profile['Profile']['first_name']); ?>&nbsp;</td>
							<td><?php echo h($profile['Profile']['last_name']); ?>&nbsp;</td>
							<td><?php echo h($profile['Profile']['address']); ?>&nbsp;</td>
							<td><?php echo h($profile['Profile']['city']); ?>&nbsp;</td>
							<td><?php echo h($profile['Profile']['state']); ?>&nbsp;</td>
							<td><?php echo h($profile['Profile']['zip']); ?>&nbsp;</td>
							<td><?php echo h($profile['Profile']['phone']); ?>&nbsp;</td>
							<td><?php echo h($profile['Profile']['skypee']); ?>&nbsp;</td>
							<td><?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('action' => 'view', $profile['Profile']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary ajax_page', 'escape'=>false)); ?>
								<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('action' => 'edit', $profile['Profile']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info ajax_page', 'data-toggle'=>'modal', 'data-target'=> '#modal', 'escape'=>false)); ?>
								<?php echo $this->Html->link('<i class="fa fa-times text-white text"></i> ', array('action' => 'delete', $profile['Profile']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger ajax_delete', 'escape'=>false)); ?>
								<?php //echo $this->Form->postLink('<i class="fa fa-times text-white text"></i>', array('action' => 'delete', $profile['Profile']['id']), array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger', 'escape'=>false), __('Are you sure?')); ?>
							</td>
						</tr>
						<?php endforeach; ?>
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
