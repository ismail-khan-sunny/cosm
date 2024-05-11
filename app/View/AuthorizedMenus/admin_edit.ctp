<!-- Panel -->
<section class="bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<?php echo __('Authorized Menus'); ?>
			</div>
		</div>
		<div class="panel-body">
			<?php echo $this->Form->create('AuthorizedMenu',array('role'=>'form','class'=>'')); ?>
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<?php
						echo $this->Form->input('id');
						echo $this->Form->input('parent_id',array('type'=>'select','options'=>$parentAuthorizedMenus,'empty'=>'Select One','class'=>'form-control', 'div'=>'form-group col-md-6'));
						echo $this->Form->input('name',array('class'=>'form-control', 'div'=>'form-group col-md-6'));
						echo $this->Form->input('plugin',array('type'=>'select','options'=>$plugings,'empty'=>'Select One','class'=>'form-control', 'div'=>'form-group col-md-4'));
						echo $this->Form->input('dominion_id',array('empty'=>'Select One','class'=>'form-control', 'div'=>'form-group col-md-4','onchange'=>'get_process(this,"AuthorizedMenuProcessId")'));
						echo $this->Form->input('process_id',array('empty'=>'Select One','class'=>'form-control', 'div'=>'form-group col-md-4'));
						echo $this->Form->input('icon',array('class'=>'form-control', 'div'=>'form-group col-md-6'));
						echo $this->Form->input('position',array('class'=>'form-control', 'div'=>'form-group col-md-6'));
						echo $this->Form->input('status',array('type'=>'select','options'=>$status,'empty'=>'Select One','class'=>'form-control', 'div'=>'form-group col-md-3'));
					?>
					<div class="form-group col-md-12">
						<?php
							echo $this->Form->submit('Submit',array('class'=>'btn btn-success','label'=>false,'div'=>false));
							echo $this->Form->input('Cancel',array('type'=>'reset','class'=>'btn btn-warning left-shift-reset','label'=>false,'div'=>false));
						?>
					</div>
				</div>
				
			</div>
			<div class="col-md-6">
				<h3>Select Role</h3>
				<div class="form-group">
					<div class="controls">
						
						<?php $i= 0 ; foreach($roles as $role_id=>$role): ?>
							<label class="checkbox">
								<?php 
									$checked = '';
									if($this->Custom->authorizeMenuIsCheckedRole($role_id,$this->data['AuthorizedMenu']['role_id'])){
										echo $this->Form->input('AuthorizedMenu.role_id.'.$i,array('type'=>'checkbox','class'=>'form-control','checked'=>'checked','value'=>$role_id,'div'=>false,'label'=>false)); 
									}else{
										echo $this->Form->input('AuthorizedMenu.role_id.'.$i,array('type'=>'checkbox','class'=>'form-control','value'=>$role_id,'div'=>false,'label'=>false));
									} 
								?>
								<?php echo '<span>'.$role.'</span>'; ?>
							</label>
						<?php $i++; endforeach; ?>
						
					</div>
				</div>
			</div>
		</div>
		

		<?php echo $this->Form->end(); ?>
		</div>

	</div>
</section>
