<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon" type="button">
					<i class="fa fa-edit"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__(' Edit Configurations'), array('action' => 'edit', $configuration['Configuration']['id']),array('class' => 'btn btn-sm btn-primary ajax_page')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Configurations'); ?></h3>
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
			  					<th width="15%">Field Name</th>
			  					<th>Value</th>
			  				</tr>
			  				<tr>
			  					<th>Logo</th>
			  					<td>
			  						<?php 
			  							if(!empty($configuration['Configuration']['image'])){
			  								echo $this->Html->image($configuration['Configuration']['image'], array('class'=>''));
			  							}
			  							 
			  						?>
			  							&nbsp;
			  					</td>
			  				</tr>
			  				<tr>
			  					<th><?php echo __('Title'); ?></th>
			  					<td><?php echo h($configuration['Configuration']['title']); ?>&nbsp;</td>
			  				</tr>
			  				<tr>
			  					<th><?php echo __('Slogan'); ?></th>
			  					<td><?php echo h($configuration['Configuration']['slogan']); ?>&nbsp;</td>
			  				</tr>
			  			
			  				<tr>
			  					<th><?php echo __('Phone'); ?></th>
			  					<td><?php echo h($configuration['Configuration']['phone']); ?>&nbsp;</td>
			  				</tr>
			  				<tr>
			  					<th><?php echo __('Email'); ?></th>
			  					<td><?php echo h($configuration['Configuration']['fax']); ?>&nbsp;</td>
			  				</tr>
			  				<tr>
			  					<th><?php echo __('Meta Keywords'); ?></th>
			  					<td><?php echo h($configuration['Configuration']['meta_keywords']); ?>&nbsp;</td>
			  				</tr>
			  				<tr>
			  					<th><?php echo __('Meta Description'); ?></th>
			  					<td><?php echo h($configuration['Configuration']['meta_description']); ?>&nbsp;</td>
			  				</tr>
			  				
			  				<tr>
			  					<th><?php echo __('Google analytics'); ?></th>
			  					<td><?php echo ($configuration['Configuration']['google_analytics']); ?>&nbsp;</td>
			  				</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
