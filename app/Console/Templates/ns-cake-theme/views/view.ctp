<!-- Actions -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="btn-group hidden-nav-xs">			
					<?php echo "<?php echo \$this->Html->link(__('Back To " . $pluralHumanName . " List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default')); ?>"; ?> 
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo "<?php echo \$this->Html->link(__('Add " . $singularHumanName ."'), array('action' => 'add'),array('class' => 'btn btn-sm btn-info')); ?>\n"; ?>
				</div>
			</div>
			
			<div class="btn-group">
				<div class="btn btn-sm btn-info btn-icon">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo "<?php echo \$this->Html->link(__('Edit " . $singularHumanName ."'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class' => 'btn btn-sm btn-info')); ?>\n"; ?>
				</div>
			</div>
			
			
			
			<div class="btn-group">
				<div class="btn btn-sm btn-danger btn-icon">
					<i class="fa fa-times"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo "<?php echo \$this->Form->postLink(__('Delete " . $singularHumanName . "'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class' => 'btn btn-sm btn-danger'), __('Are you sure?')); ?>\n"; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo "<?php echo __('{$singularHumanName}'); ?>\n"; ?></h3>
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
							<?php				
							foreach ($fields as $field) {
								$isKey = false;
								if (!empty($associations['belongsTo'])) {				
									foreach ($associations['belongsTo'] as $alias => $details) {
										if ($field === $details['foreignKey']) {
											$isKey = true;
											echo "\t<tr>\n";
											echo "\t\t<td><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></td>\n";
											echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t&nbsp;\n\t\t</td>\n";
											echo "\t</tr>\n";
											break;
										}
									}
								}
								if ($isKey !== true) {
									echo "\t<tr>\n";
									echo "\t\t<td><?php echo __('" . Inflector::humanize($field) . "'); ?></td>\n";
									echo "\t\t<td>\n\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t&nbsp;\n\t\t</td>\n";
									echo "\t</tr>\n";
								}
							}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if (!empty($associations['hasOne'])) :  ?>
	<?php foreach ($associations['hasOne'] as $alias => $details): ?>
		<div class="row">
			<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
				<div class="box-tools pull-right">
					<div class="btn-group">
						<div class="btn btn-sm btn-default btn-icon">
							<i class="fa fa-list-alt"></i>
						</div>
						<div class="btn-group hidden-nav-xs">
							<?php echo "<?php echo \$this->Html->link(__('Edit " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>"; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
				<div class="box box-solid box-primary">
					<div class="box-header">
						<h3 class="box-title"><?php echo "<?php echo __('Related " . Inflector::humanize($details['controller']) . "'); ?>"; ?></h3>
						<div class="box-tools pull-right">
		                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
		                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
								<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
									<table class="table table-striped">
										<?php foreach($details['fields'] as $field): ?>
											<tr>
												<th><?php echo "\t\t<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>\n"; ?></th>
												<td><?php echo "\t\t<dd>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</dd>\n"; ?></td>
											</tr>
										<?php endforeach; ?>
									</table>
								<?php echo "<?php endif; ?>\n"; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<?php
if (empty($associations['hasMany'])) {
	$associations['hasMany'] = array();
}
if (empty($associations['hasAndBelongsToMany'])) {
	$associations['hasAndBelongsToMany'] = array();
}
$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
foreach ($relations as $alias => $details):
	$otherSingularVar = Inflector::variable($alias);
	$otherPluralHumanName = Inflector::humanize($details['controller']);
	?>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">
					<?php echo "<?php echo 'Related " . $otherPluralHumanName . "'; ?>"; ?>
					<?php echo " <span class='label label-success'><?php echo sizeof(\${$singularVar}['{$alias}']); ?> </span>"; ?>
				</h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
						<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
						<table class="table table-striped table-bordered dataTable">
							<tr>
								<?php
								foreach ($details['fields'] as $field) {
									echo "\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
								}
								?>
							<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
							</tr>
						<?php
							echo "\t<?php foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
							echo "\t\t<tr>\n";
								foreach ($details['fields'] as $field) {
									echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?></td>\n";
								}
								echo "\t\t\t<td class=\"actions\">\n";
								echo "\t\t\t\t<?php echo \$this->Html->link('<i class=\"fa fa-eye\"></i> ', array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-primary ajax_page', 'data-toggle'=>'modal', 'data-target'=> '#modal', 'escape'=>false)); ?>\n";
								echo "\t\t\t\t<?php echo \$this->Html->link('<i class=\"fa fa-edit\"></i> ', array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-info ajax_page', 'data-toggle'=>'modal', 'data-target'=> '#modal', 'escape'=>false)); ?>\n";
								echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link('<i class=\"fa fa-times text-white text\"></i> ', array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']),array('class'=>'btn btn-rounded btn-sm btn-icon btn-danger ajax_delete', 'escape'=>false)); ?>\n";
								echo "\t\t\t\t<?php //echo \$this->Form->postLink(__('Delete'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), null, __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
								echo "\t\t\t</td>\n";
							echo "\t\t</tr>\n";
							echo "\t<?php endforeach; ?>\n";
						?>
						</table>
					<?php echo "<?php endif; ?>\n\n"; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>

