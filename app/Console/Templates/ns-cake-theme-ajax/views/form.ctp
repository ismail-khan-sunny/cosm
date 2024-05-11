<!-- Panel -->
<section class="bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<?php echo "<?php echo __('{$pluralHumanName}'); ?>\n"; ?>
			</div>
		</div>
		<div class="panel-body">
			<?php echo "<?php echo \$this->Form->create('{$modelClass}',array('role'=>'form','class'=>'ajax_form')); ?>\n"; ?>

			<?php
			echo "<?php\n";
			foreach ($fields as $field) {
				if (strpos($action, 'add') !== false && $field == $primaryKey) {
					continue;
				} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
					echo "\t\t\techo \$this->Form->input('{$field}',array('class'=>'form-control','div'=>'form-group'));\n";
				}
			}
			if (!empty($associations['hasAndBelongsToMany'])) {
				foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
					echo "\t\t\techo \$this->Form->input('{$assocName}',array('class'=>'form-control','div'=>'form-group'));\n";
				}
			}
			echo "\t\t\techo \$this->Form->submit('Submit',array('class'=>'btn btn-success','label'=>false,'div'=>false));\n";
			echo "\t\t\techo \$this->Form->input('Cancel',array('type'=>'reset','class'=>'btn btn-warning left-shift-reset','label'=>false,'div'=>false));\n";
			echo "\t\t\t?>\n\n";
			?>
			<?php
			echo "<?php echo \$this->Form->end(); ?>\n";
			?>
		</div>

	</div>
</section>
