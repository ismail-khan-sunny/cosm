<!-- Panel -->
<section class="bg-white scrollable wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<?php echo __('Permissions'); ?>
			</div>
		</div>
		<div class="panel-body">
			<?php echo $this->Form->create('Permission',array('role'=>'form','class'=>'')); ?>
				<?php
					echo $this->Form->input('Permission.role_id',array('class'=>'form-control','div'=>'form-group col-md-6'));
				?>
				<div class="form-group col-md-12">
					<table class="table table-bordered">
						<tr>
							<th>Sl</th>
							<th>Dominion</th>
							<th>Process</th>
						</tr>
					<?php $sl = 0; foreach($dominions as $dominion): ?>
						<tr>
							<td><?php echo $sl+1; ?></td>
							<td><?php echo $dominion['Dominion']['name']; ?></td>
							<td>
								<?php $i = 0; foreach($dominion['Process'] as $process): ?>
								<?php echo $this->Form->input($sl.'.Dominion.dominion_id',array('type'=>'hidden','value'=>$dominion['Dominion']['id'])); ?>
								<label class="checkbox process-label">
									<?php echo $this->Form->input($sl.'.Dominion.process.'.$i.'.process_id',array('type'=>'checkbox','value'=>$process['id'],'label'=>false,'div'=>false)); ?>
									<span><?php echo $process['name']; ?></span>
								</label>
								<?php $i ++ ;endforeach; ?>
							</td>
						</tr>
					<?php $sl ++ ;endforeach; ?>
					</table>
					<?php
						echo $this->Form->submit('Submit',array('class'=>'btn btn-success','label'=>false,'div'=>false));
						echo $this->Form->input('Cancel',array('type'=>'reset','class'=>'btn btn-warning left-shift-reset','between'=>false,'after'=>false,'label'=>false,'div'=>false));
					?>
				</div>
				
				
		
				<?php echo $this->Form->end(); ?>
		</div>

	</div>
</section>
