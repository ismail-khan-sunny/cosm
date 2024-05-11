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
		</div>
	</div>
</div>
<!-- Panel -->
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
						<?php echo "<?php echo \$this->Form->create('{$modelClass}',array('role'=>'form','class'=>'')); ?>\n"; ?>
						<?php
						echo "<?php\n";
						foreach ($fields as $field) {
							if (strpos($action, 'add') !== false && $field == $primaryKey) {
								continue;
							} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
								echo "\t\t\techo \$this->Form->input('{$field}',array('class'=>'form-control','div'=>'form-group col-md-12'));\n";
							}
						}
						if (!empty($associations['hasAndBelongsToMany'])) {
							foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
								echo "\t\t\techo \$this->Form->input('{$assocName}',array('class'=>'form-control','div'=>'form-group col-md-12'));\n";
							}
						}
						echo "\t\t\t?>\n\n";
						?>
						<div class="form-group col-md-12">
							<?php 
								echo "<?php\n";
								echo "\t\t\techo \$this->Form->submit('Submit',array('class'=>'btn btn-success','label'=>false,'div'=>false));\n";
								echo "\t\t\techo \$this->Form->input('Cancel',array('type'=>'reset','class'=>'btn btn-warning left-shift-reset','label'=>false,'div'=>false));\n";
								echo "\t\t\t?>\n\n" ;
							?>
						</div>
						<?php
						echo "<?php echo \$this->Form->end(); ?>\n";
						?>
				</div>
			</div>
		</div>
	</div>
</div>
