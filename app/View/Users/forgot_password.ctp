<section class="panel panel-default bg-white m-t-lg">
	<header class="panel-heading text-center">
		<strong>Forgot Password</strong>
	</header>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->Form->create('User',array('class'=>'panel-body wrapper-lg')); ?>
	<div class="form-group">
		<label class="control-label">Email Address</label>
		<?php echo $this->Form->input('email',array('type'=>'email','required'=>true,'div'=>false,'label'=>false,'class'=>'form-control input-lg', 'placeholder'=>'Email')); ?>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
	<a class="pull-right" href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'login')) ?>">Login</a>
	<?php echo $this->Form->end(); ?>
</section>
