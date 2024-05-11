<?php App::uses('String', 'Utility'); ?>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('New Content'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary ')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Contents'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<p>
					<?php  $fields = array('Content.title'=>'Title','Content.description'=>'Description'); ?>
			    	
			    	<?php echo $this->Form->create('Search',array('class'=>'form-inline','url'=>array('controller'=>'Contents','action'=>'admin_index'))); ?>
				    	<?php echo $this->Form->input('fieldname',array('options'=>$fields,'class'=>'form-control','div'=>'form-group','label'=>false)); ?>
				    	<?php echo $this->Form->input('value',array('type'=>'text','class'=>'form-control','div'=>'form-group','placeholder'=>'Insert Search value','label'=>false)); ?>
					    <button type="submit" class="btn">Search</button>
					<?php echo $this->Form->end(); ?>
				</p>
				<table class="table table-striped table-bordered  table-hover">
					<thead>
						<tr>
							<th>Sl</th>
							<th><?php echo $this->Paginator->sort('image', null); ?></th>
							<th><?php echo $this->Paginator->sort('title', null); ?></th>
							<th><?php echo $this->Paginator->sort('description', null); ?></th>
							<th><?php echo $this->Paginator->sort('status', null); ?></th>
							<th><i class="fa fa-cog"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($contents)): ?>
							<?php $sl = $this->Paginator->counter('{:start}'); foreach ($contents as $content): ?>
							<tr>
								<td  class="text-upr-first"><?php echo h($sl); ?>&nbsp;</td>
								<td  class="text-upr-first">
									<?php if(!empty($content['Content']['image'])): ?>
										<div class="row">
											<div class="col-md-12 display-image hover-cross">
												<?php echo $this->Html->image($content['Content']['image'],array('width'=>'150','id'=>'contentImage_'.$sl)); ?>
												<span onclick="deleteImageFromDb('<?php echo $this->Html->url(array('action'=>'admin_delete_image')) ?>','<?php echo $content['Content']['id'] ?>','contentImage_<?php echo $sl ?>')"><i class="fa fa-fw fa-times-circle"></i></span>
											</div>
										</div>
									<?php endif;?>&nbsp;
								</td>
								<td  class="text-upr-first"><?php echo h($content['Content']['title']); ?>&nbsp;</td>
								<td style="width: 60%;">
									<?php 
										echo String::truncate(strip_tags($content['Content']['description']),200,array('ellipsis' => ' ...','exact' => false,'html'=>false)); 
									?>&nbsp;
								</td>
								<td><?php echo h($content['Content']['status']); ?>&nbsp;</td>
								<td style="width: 15%;">
									<?php echo $this->Html->link('<i class="fa fa-file"></i> ', array('controller'=>'ContentFiles','action' => 'admin_index', $content['Content']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-default', 'escape'=>false)); ?>
									<?php echo $this->Html->link('<i class="fa fa-eye"></i> ', array('controller'=>'contents','action' => 'admin_view', $content['Content']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-default', 'escape'=>false)); ?>
									<?php echo $this->Html->link('<i class="fa fa-edit"></i> ', array('action' => 'edit', $content['Content']['id']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-default', 'escape'=>false)); ?>
									
									<?php
										if($content['Content']['is_delete_able']=='yes'):
									?>
									
									<?php echo $this->Form->postLink('<i class="fa fa-times text-white text"></i>', array('action' => 'delete', $content['Content']['id']), array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger', 'escape'=>false), __('Are you sure?')); ?>
									<?php
										endif;
									?>
								</td>
							</tr>
							<?php $sl++; endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="6">No Result Found</td>
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