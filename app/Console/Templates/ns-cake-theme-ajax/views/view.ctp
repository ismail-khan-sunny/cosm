<!-- Actions -->
<header class="header bg-light b-b b-light right">
	<div class="btn-group">
		<div class="btn btn-sm btn-default btn-icon">
			<i class="fa fa-arrow-left"></i>
		</div>
		<div class="btn-group hidden-nav-xs">			
			<?php echo "<?php echo \$this->Html->link(__('Back To " . $pluralHumanName . " List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>"; ?> 
		</div>
	</div>
	
	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-edit"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo "<?php echo \$this->Html->link(__('Edit " . $singularHumanName ."'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class' => 'btn btn-sm btn-info ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?>\n"; ?>
		</div>
	</div>
	
	
	
	

	<?php echo "<!--uncomment for php delete if ajax delete is not working."; ?>	
	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo "<?php echo \$this->Form->postLink(__('Delete " . $singularHumanName . "'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n"; ?>
		</div>
	</div>
	<?php echo "-->"; ?>
	
	
		
	
	<?php $done = array(); 
		foreach ($associations as $type => $data) {
			foreach ($data as $alias => $details) {
				if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
	?>
		
		<div class="btn-group">
			<div class="btn btn-sm btn-dark btn-icon">
				<i class="fa fa-bars"></i>
			</div>
			<div class="btn-group hidden-nav-xs">			
				<?php echo "<?php echo \$this->Html->link(__('" . Inflector::humanize($details['controller']) . " List'), array('controller' => '{$details['controller']}', 'action' => 'index'),array('class' => 'btn btn-sm btn-primary ajax_page')); ?>"; ?> 
			</div>
		</div>
		
		<div class="btn-group">
			<div class="btn btn-sm btn-dark btn-icon">
				<i class="fa fa-plus"></i>
			</div>
			<div class="btn-group hidden-nav-xs">			
				<?php echo "<?php echo \$this->Html->link(__('Add New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'),array('class' => 'btn btn-sm btn-primary ajax_page','data-toggle'=>'modal', 'data-target'=> '#modal')); ?>"; ?> 
			</div>
		</div>
	
	<?php
		$done[] = $details['controller'];
				}
			}
		}
	?>	
	
	<div class="btn-group">
		<div class="btn btn-sm btn-dark btn-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo "<?php echo \$this->Html->link(__('Delete " . $singularHumanName . "'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class' => 'btn btn-sm btn-danger ajax_delete')); ?>\n"; ?>
		</div>
	</div>
</header>
<section class="<?php echo $pluralVar; ?> view bg-white scrollable wrapper">
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<div class="panel-title pull-left">	
			<?php echo "<?php echo __('{$singularHumanName}'); ?>"; ?>
	</div>
	</div>
	
	<div class="panel-body">
		<div class="table-responsive">
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

<?php
if (!empty($associations['hasOne'])) :
	foreach ($associations['hasOne'] as $alias => $details): ?>
	<div class="related">
		<h3><?php echo "<?php echo __('Related " . Inflector::humanize($details['controller']) . "'); ?>"; ?></h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
		<dl>
	<?php
			foreach ($details['fields'] as $field) {
				echo "\t\t<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>\n";
				echo "\t\t<dd>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</dd>\n";
			}
	?>
		</dl>
	<?php echo "<?php endif; ?>\n"; ?>
		<div class="actions">
			<ul>
				<li><?php echo "<?php echo \$this->Html->link(__('Edit " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></li>\n"; ?>
			</ul>
		</div>
	</div>
	<?php
	endforeach;
endif;
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
<div class="related table-responsive">
	<h4>
		<?php echo "<?php echo 'Related " . $otherPluralHumanName . "'; ?>"; ?>
		<?php echo " <span class='label label-success'><?php echo sizeof(\${$singularVar}['{$alias}']); ?> </span>"; ?>
	</h4>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
	<table class="table table-striped table-bordered  table-hover">
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
<?php endforeach; ?>
</section>
