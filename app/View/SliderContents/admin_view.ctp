<div class="sliderContents view">
	<h2>
		<?php echo __('Slider Content'); ?>
	</h2>
	<dl>
		<dt>
			<?php echo __('Id'); ?>
		</dt>
		<dd>
			<?php echo h($sliderContent['SliderContent']['id']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Slider'); ?>
		</dt>
		<dd>
			<?php echo $this->Html->link($sliderContent['Slider']['title'], array('controller' => 'sliders', 'action' => 'view', $sliderContent['Slider']['id'])); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Caption'); ?>
		</dt>
		<dd>
			<?php echo h($sliderContent['SliderContent']['caption']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Description'); ?>
		</dt>
		<dd>
			<?php echo h($sliderContent['SliderContent']['description']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Image'); ?>
		</dt>
		<dd>
			<?php echo h($sliderContent['SliderContent']['image']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Width'); ?>
		</dt>
		<dd>
			<?php echo h($sliderContent['SliderContent']['width']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Height'); ?>
		</dt>
		<dd>
			<?php echo h($sliderContent['SliderContent']['height']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Status'); ?>
		</dt>
		<dd>
			<?php echo h($sliderContent['SliderContent']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3>
		<?php echo __('Actions'); ?>
	</h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Slider Content'), array('action' => 'edit', $sliderContent['SliderContent']['id'])); ?>
		</li>
		<li><?php echo $this->Form->postLink(__('Delete Slider Content'), array('action' => 'delete', $sliderContent['SliderContent']['id']), null, __('Are you sure you want to delete # %s?', $sliderContent['SliderContent']['id'])); ?>
		</li>
		<li><?php echo $this->Html->link(__('List Slider Contents'), array('action' => 'index')); ?>
		</li>
		<li><?php echo $this->Html->link(__('New Slider Content'), array('action' => 'add')); ?>
		</li>
		<li><?php echo $this->Html->link(__('List Sliders'), array('controller' => 'sliders', 'action' => 'index')); ?>
		</li>
		<li><?php echo $this->Html->link(__('New Slider'), array('controller' => 'sliders', 'action' => 'add')); ?>
		</li>
	</ul>
</div>
