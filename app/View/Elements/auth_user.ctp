<ul class="nav navbar-nav navbar-right hidden-xs nav-user">
	<!-- User details -->
	<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">  
		<?php if(isset($logged_user)){ echo $logged_user['Profile']['name']; }?> 
		<b class="caret"></b>
	</a>
		<ul class="dropdown-menu animated fadeInRight">
			<span class="arrow top"></span>
			<li>				
				<?php echo $this->Html->link('<i class="fa fa-smile-o"></i> <span>Profile</span>',array('controller'=>'users','action'=>'view',$logged_user['id']),array('class'=>'','escape'=>false));?>
			</li>
			<li>
				<?php echo $this->Html->link('<i class="fa fa-key"></i> <span>Change Password</span>',array('controller'=>'users','action'=>'edit',$logged_user['id']),array('class'=>'','escape'=>false));?>
			</li>
			<li class="divider"></li>
			<li>
			<?php echo $this->Html->link('<i class="fa fa-power-off"></i> <span>Logout </span>','/logout',array('class'=>'','escape'=>false));?>
			</li>
		</ul>
	</li>
</ul>
