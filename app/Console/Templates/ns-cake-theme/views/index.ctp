<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo "<?php echo \$this->Html->link(__('" . $singularHumanName . " List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>\n"; ?>
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo "<?php echo \$this->Html->link(__('Add New " . $singularHumanName . "'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary')); ?>\n"; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo "<?php echo __('{$pluralHumanName}'); ?>\n"; ?></h3>
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
									<?php foreach ($fields as $field): ?>
										<?php echo "<th><?php echo \$this->Paginator->sort('{$field}', null, array('class'=>'')); ?></th>\n"; ?>
									<?php endforeach;?>
									<th><i class="fa fa-cog"></i></th>
								</tr>
							</thead>
							<tbody>
								<?php
								echo "<?php \$sl = \$this->Paginator->counter('{:start}'); foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
								echo "\t\t\t\t\t<tr>\n";
									foreach ($fields as $field) {
										$isKey = false;
										if (!empty($associations['belongsTo'])) {
											foreach ($associations['belongsTo'] as $alias => $details) {
												if ($field === $details['foreignKey']) {
													$isKey = true;
													echo "\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t\t\t\t</td>\n";
													break;
												}
											}
										}
										if ($isKey !== true) {
											if($field=='id'){
												echo "\t\t\t\t\t\t<td><?php echo h(\$sl); ?>&nbsp;</td>\n";
											}else{
												echo "\t\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
											}
											
										}
									}
							
								echo "\t\t\t\t\t\t<td>\n";
								echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link('<i class=\"fa fa-eye\"></i> ', array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary', 'escape'=>false)); ?>\n";
								echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link('<i class=\"fa fa-edit\"></i> ', array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info','escape'=>false)); ?>\n";
								echo "\t\t\t\t\t\t\t<?php //echo \$this->Html->link('<i class=\"fa fa-times text-white text\"></i> ', array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger ajax_delete', 'escape'=>false)); ?>\n";
								echo "\t\t\t\t\t\t\t<?php echo \$this->Form->postLink('<i class=\"fa fa-times text-white text\"></i>', array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger', 'escape'=>false), __('Are you sure?')); ?>\n";
								echo "\t\t\t\t\t\t</td>\n";
								echo "\t\t\t\t\t</tr>\n";
								echo "\t\t\t\t\t<?php \$sl++; endforeach; ?>\n";
								?>
							</tbody>
						</table>
						<?php echo "<?php if(\$this->Paginator->counter('{:pages}') > 1) : ?>\n"; ?>
						<div class="panel-footer">
							<div class="row">
								<span class="col-md-5"> 
									<?php echo "<?php echo \$this->Paginator->counter('page {:page} of pages {:pages}');?>\n";?>
								</span>
								<span class="col-md-7 text-right">
									<ul class="pagination pagination-sm ">
									<?php echo "<?php\n";
										echo "\t\t\t\t\techo \$this->Paginator->prev('&laquo;', array('tag'=>'li','escape'=>false,'class' => 'ajax_page'), null, array('class' => 'disabled','tag'=>'li','disabledTag'=>'a','escape'=>false));\n";
										echo "\t\t\t\t\techo \$this->Paginator->numbers(array('separator' => '','tag'=>'li','currentTag'=>'a','currentClass'=>'active','class' => 'ajax_page'));\n";
										echo "\t\t\t\t\techo \$this->Paginator->next('&raquo;', array('tag'=>'li','escape'=>false,'class' => 'ajax_page'), null, array('class' => 'disabled','tag'=>'li','escape'=>false,'disabledTag'=>'a'));\n";
										echo "\t\t\t\t?>\n";
									?>
									</ul>
								</span>
							</div>
						</div>
						<?php echo "<?php endif; ?>\n"; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
