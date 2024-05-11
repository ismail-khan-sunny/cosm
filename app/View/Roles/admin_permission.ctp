<?php 
//pr($permission_array); exit;
?>
<!-- Actions -->
<header class="header bg-light b-b b-light right">
	<div class="btn-group">
		<div class="btn btn-sm btn-default btn-icon">
			<i class="fa fa-arrow-left"></i>
		</div>
		<div class="btn-group hidden-nav-xs">
			<?php echo $this->Html->link(__('Back To Roles List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
		</div>
	</div>
	
</header>	
<section class="roles view bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading  clearfix">
			<div class="panel-title text-left">
				<?php echo "Set Permission For ".h($role['Role']['name']); ?>
			</div>
		</div>

		<div class="panel-body">
			
			<?php foreach ($permission_array as $key=>$permission):?>
				<?php if(isset($permission['Process']) and !empty($permission['Process'])){?>
					<div id="accordion2" class="panel-group m-b col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="#<?php echo $permission['Dominion']['id']?>" data-parent="#accordion2"
									data-toggle="collapse" class="accordion-toggle collapsed">
									<?php echo $permission['Dominion']['name']?> </a>
							</div>
							<div class="panel-collapse collapse" id="<?php echo $permission['Dominion']['id']?>" style="height: 0px;">
								<div class="panel-body text-sm">
									<?php foreach ($permission['Process'] as $pKey=>$value) { ?>
																					
											<div class="row">
												<div class="col-md-7 capitalize"><?php echo $value['name'];?></div>
												<div class="col-md-5">
													<label class="switch">
														<?php 
														$checked = '';
														$checkPermissionKey = $role['Role']['id'].'_'.$permission['Dominion']['id'].'_'.$value['id'];
														if(in_array($checkPermissionKey,$added_permission_array)){
															$checked = 'checked';
														}	?> 
														<input <?php echo $checked;?> class="setPermissionForRole" type="checkbox" data-role_id="<?php echo $role['Role']['id'];?>" data-dominion_id="<?php echo $permission['Dominion']['id']?>" data-process_id="<?php echo $value['id'];?>"> 
														<span></span>
													</label>
												</div>
											</div>
											<div class="line line-dashed pull-in"></div>
										
									<?php }?>
									
								</div>
							</div>
						</div>				
					</div>
				<?php } ?>
			<?php endforeach;?>
		</div>
	</div>
</section>
