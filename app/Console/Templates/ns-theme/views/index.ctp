<!-- Actions -->
<header class="header bg-light b-b b-light pull-right">
	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-list-alt"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo "<?php echo \$this->Html->link(__('List " . $singularHumanName . "'), array('action' => 'index'),array('class' => 'btn btn-sm btn-primary')); ?>\n"; ?>
		</div>
	</div>

	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon" type="button">
			<i class="fa fa-plus"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo "<?php echo \$this->Html->link(__('New " . $singularHumanName . "'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary')); ?>\n"; ?>
		</div>
	</div>
</header>

<!-- Panel -->
<section class="bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<?php echo "<?php echo __('{$pluralHumanName}'); ?>\n"; ?>
			</div>
		</div>
		<div class="panel-body">search form</div>

		<!--Data tables-->
		<div class="table-responsive">
			<div class="dataTables_wrapper">
				<table class="table table-striped">
					<thead>
						<tr>
							<?php foreach ($fields as $field): ?>
							<?php echo "<th><?php echo \$this->Paginator->sort('{$field}'); ?></th>\n"; ?>
							<?php endforeach;?>
							<th><i class="fa fa-cog"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php
						echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
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
								echo "\t\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
							}
						}

						echo "\t\t\t\t\t\t<td>\n";
						echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link('<i class=\"fa fa-edit\"></i> ', array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-default', 'escape'=>false)); ?>\n";
						echo "\t\t\t\t\t\t\t<?php echo \$this->Form->postLink('<i class=\"fa fa-times text-white text\"></i>', array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger', 'escape'=>false), __('Are you sure?')); ?>\n";
						echo "\t\t\t\t\t\t</td>\n";
						echo "\t\t\t\t\t</tr>\n";
						echo "\t\t\t\t\t<?php endforeach; ?>\n";
						?>
					</tbody>
				</table>
			</div>
		</div>


		<?php echo "<?php if(\$this->Paginator->counter('{:pages}') > 1) : ?>\n"; ?>
		<div class="panel-footer">
			<div class="row">
				<span class="col-md-5"> <?php echo "<?php echo \$this->Paginator->counter('page {:page} of pages {:pages}');?>\n";?>
				</span> <span class="col-md-7 text-right">
					<ul class="pagination pagination-sm ">
						<?php echo "<?php\n";
						echo "\t\t\t\t\techo \$this->Paginator->prev('&laquo;', array('tag'=>'li','escape'=>false), null, array('class' => 'disabled','tag'=>'li','disabledTag'=>'a','escape'=>false));\n";
						echo "\t\t\t\t\techo \$this->Paginator->numbers(array('separator' => '','tag'=>'li','currentTag'=>'a','currentClass'=>'active'));\n";
						echo "\t\t\t\t\techo \$this->Paginator->next('&raquo;', array('tag'=>'li','escape'=>false), null, array('class' => 'disabled','tag'=>'li','escape'=>false,'disabledTag'=>'a'));\n";
						echo "\t\t\t\t?>\n";
						?>
					</ul>
				</span>
			</div>
		</div>
		<?php echo "<?php endif; ?>\n"; ?>
	</div>
</section>
