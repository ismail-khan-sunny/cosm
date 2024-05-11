<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('News List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Add New News'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('News'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<p>
					<?php  $fields = array('News.title'=>'Title','News.description'=>'Description'); ?>
			    	
			    	<?php echo $this->Form->create('Search',array('class'=>'form-inline','url'=>array('controller'=>'News','action'=>'admin_index'))); ?>
				    	
				    	<?php echo $this->Form->input('fieldname',array('options'=>$fields,'class'=>'form-control','div'=>'form-group','label'=>false)); ?>
				    	<?php echo $this->Form->input('value',array('type'=>'text','class'=>'form-control','div'=>'form-group','placeholder'=>'Insert Search value','label'=>false)); ?>
					    <button type="submit" class="btn">Search</button>
					<?php echo $this->Form->end(); ?>
				</p>
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
						<table class="table table-striped table-bordered dataTable">
							<thead>
								<tr>
									<th><?php echo $this->Paginator->sort('id', null, array('class'=>'')); ?></th>
									
									<th><?php echo $this->Paginator->sort('type', null, array('class'=>'')); ?></th>
									<th><?php echo $this->Paginator->sort('title', null, array('class'=>'')); ?></th>
									<th><?php echo $this->Paginator->sort('image', null, array('class'=>'')); ?></th>
									<th><?php echo $this->Paginator->sort('file', null, array('class'=>'')); ?></th>
									<th><?php echo $this->Paginator->sort('start_date', null, array('class'=>'')); ?></th>
									<th><?php echo $this->Paginator->sort('end_date', null, array('class'=>'')); ?></th>
									<th>Status</th>
									<th><i class="fa fa-cog"></i></th>
								</tr>
							</thead>
							<tbody>
								<?php if(!empty($news)): ?>
								<?php $sl = $this->Paginator->counter('{:start}'); foreach ($news as $news): ?>
								<tr>
									<td><?php echo h($sl); ?>&nbsp;</td>
									
									<td><?php echo h($news['News']['type']); ?>&nbsp;</td>
									<td><?php echo h($news['News']['title']); ?>&nbsp;</td>
									<td>
										<?php 
											if(!empty($news['News']['image'])){
												echo $this->Html->image($news['News']['image'],array('class'=>'img-responsive','width'=>'150')); 
											}
										?>&nbsp;
									</td>
									<td>
										<?php 
											$file_image = $this->News->getFileIcon($news['News']['file']);
											if(!empty($file_image)){
												echo $this->Html->image($file_image,array('width'=>'50'));
											} 
											$start_time = strtotime($news['News']['start_date']);
											$end_time = strtotime($news['News']['end_date']);
										?>&nbsp;
									</td>
										
                
									<td>
 								
									<?php echo h(date("jS F Y", $start_time)); ?>&nbsp;</td>
									<td><?php echo h(date("jS F Y", $end_time)); ?>&nbsp;</td>
									<td><?php echo h($news['News']['status']); ?>&nbsp;</td>
									<td>
										<!-- <span>delete Image</span>
										<span>delete Filee</span> -->
										<?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('action' => 'view', $news['News']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary', 'escape'=>false)); ?>
										<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('action' => 'edit', $news['News']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info','escape'=>false)); ?>
										<?php //echo $this->Html->link('<i class="fa fa-times text-white text"></i> ', array('action' => 'delete', $news['News']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger ajax_delete', 'escape'=>false)); ?>
										<?php echo $this->Form->postLink('<i class="fa fa-times text-white text"></i>', array('action' => 'delete', $news['News']['id']), array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger', 'escape'=>false), __('Are you sure?')); ?>
									</td>
								</tr>
								<?php $sl++; endforeach; ?>
								<?php else: ?>
									<tr>
										<td colspan="10">No news found.</td>
									</tr>
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
<?php echo $this -> Html -> script('admin/nogoradmin/news'); ?>