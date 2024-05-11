<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-arrow-left"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Back to Slider List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
				</div>
			</div>
		
			<?php if($this->Custom->canAccess($this->params['controller'],$action='admin_add')):?>
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon" type="button">
					<i class="fa fa-plus"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('New Slider'), array('action' => 'add'),array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
			<?php endif;?>
			<?php if($this->Custom->canAccess($this->params['controller'],$action='admin_edit')):?>
			<div class="btn-group">
				<div class="btn btn-sm btn-primary btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Edit Slider'), array('action' => 'edit', $slider['Slider']['id']) ,array('class' => 'btn btn-sm btn-primary ajax_page', 'data-toggle'=>'modal', 'data-target'=>'#modal')); ?>
				</div>
			</div>
			<?php endif;?>
			<?php if($this->Custom->canAccess($this->params['controller'],$action='admin_delete')): ?>
			<div class="btn-group">
				<div class="btn btn-sm btn-danger btn-icon">
					<i class="fa fa-times text-white text"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Form->postLink('Delete Slider', array('action' => 'delete', $slider['Slider']['id']), array('class'=>'btn btn-sm btn-danger', 'escape'=>false), __('Are you sure you want to delete Slider: %s?', $slider['Slider']['title'])); ?>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Slider'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
						<dl>
							<dt>
								<?php echo __('Title'); ?>
							</dt>
							<dd>
								<?php echo h($slider['Slider']['title']); ?>
								&nbsp;
							</dd>
							<dt>
								<?php echo __('Status'); ?>
							</dt>
							<dd>
								<?php echo h($slider['Slider']['status']); ?>
								&nbsp;
							</dd>
							<dt>
								<?php echo __('Created'); ?>
							</dt>
							<dd>
								<?php echo h($slider['Slider']['created']); ?>
								&nbsp;
							</dd>
						</dl>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
						<div class="related">
							<h3><?php echo __('Related Slider Contents'); ?></h3>
							<?php if (!empty($slider['SliderContent'])): ?>
							<div class="row">
								<?php foreach ($slider['SliderContent'] as $sliderContent): ?>
								<div class="col-sm-6 col-md-3">
									<div class="thumbnail">
										<?php echo $this->Html->image($sliderContent['image']); ?>
										<div class="caption">
											<h3><?php echo $sliderContent['caption']; ?></h3>
											<p><?php echo $sliderContent['description']; ?></p>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
