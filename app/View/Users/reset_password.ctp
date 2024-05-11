<section class="panel panel-default bg-white m-t-lg">
	<header class="panel-heading text-center">
		<strong>Reset Password</strong>
	</header>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->Form->create('User',array('class'=>'panel-body wrapper-lg')); ?>
	<div class="form-group">
		<label class="control-label">Password</label>
		<?php echo $this->Form->input('password',array('type'=>'password','id'=>'password1','required'=>true,'div'=>false,'label'=>false,'class'=>'form-control input-lg', 'placeholder'=>'New Password')); ?>
	</div>
	<?php  echo $this->Form->hidden('rand_number',array('value'=>$rand_num)); ?>
	<div class="form-group">
		<label class="control-label">Confirm Password</label>
		<?php echo $this->Form->input('password_confirm',array('type'=>'password','id'=>'password2','required'=>true,'div'=>false,'label'=>false,'class'=>'form-control input-lg', 'placeholder'=>'Confirm Password')); ?>
	</div>	
	<button type="submit" class="btn btn-primary">Submit</button>
	<a class="pull-right" href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'login')) ?>">Login</a>
	<?php echo $this->Form->end(); ?>
</section>

<script type="text/javascript">
window.onload = function () {
    document.getElementById("password1").onchange = validatePassword;
    document.getElementById("password2").onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("password2").value;
var pass1=document.getElementById("password1").value;
if(pass1!=pass2)
    document.getElementById("password2").setCustomValidity("Passwords Don't Match");
else
    document.getElementById("password2").setCustomValidity(''); 
//empty string means no validation error
}
</script>