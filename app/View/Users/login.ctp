<section class="panel panel-default bg-white m-t-lg">
	<header class="panel-heading text-center">
		<strong>Sign in</strong>
	</header>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->Form->create('User',array('class'=>'panel-body wrapper-lg')); ?>
	<div class="form-group">
		<label class="control-label">Username</label>
		<?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'class'=>'form-control input-lg', 'placeholder'=>'Username')); ?>
	</div>
	<div class="form-group">
		<label class="control-label">Password</label>
		<?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'class'=>'form-control input-lg', 'placeholder'=>'Password')); ?>
	</div>

	<button type="submit" class="btn btn-primary">Sign in</button>
	<a class="pull-right" href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'forgot_password')) ?>">I forgot my password</a> 
	<?php echo $this->Form->end(); ?>
</section>
