<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";
window.onhashchange=function(){window.location.hash="no-back-button";}
</script>
<section class="m-t-lg wrapper-md animated fadeInUp" id="content">
	<div class="container aside-xxl">
		<a href="index.html" class="navbar-brand block">Notebook</a>
		<section class="panel panel-default bg-white m-t-lg">
			<header class="panel-heading text-center">
				<strong>Sign in</strong>
			</header>			
			<?php echo $this->Form->create('User',array('class'=>'panel-body wrapper-lg')); ?>
			<div class="form-group">
				<label class="control-label">Username</label>
				<?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'class'=>'form-control input-lg', 'placeholder'=>'Username')); ?>
			</div>
			<div class="form-group">
				<label class="control-label">Password</label>
				<?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'class'=>'form-control input-lg', 'placeholder'=>'Password')); ?>
			</div>
			<div class="checkbox">
				<label> <input type="checkbox"> Keep me logged in
				</label>
			</div>
			<a href="#" class="pull-right m-t-xs"><small>Forgot password?</small>
			</a>
			<button type="submit" class="btn btn-primary">Sign in</button>
			<div class="line line-dashed"></div>
			<p class="text-muted text-center">
				<small>Do not have an account?</small>
			</p>
			<a href="signup.html" class="btn btn-default btn-block">Create an
				account</a>
			<?php echo $this->Form->end(); ?>
		</section>
	</div>
</section>