<!-- header logo: style can be found in header.less -->
<header class="header">
	<a class="logo" href="<?php echo $this->Html->url(array('controller'=>'Dashboard','action'=>'index')); ?>">
		<!-- Add the class icon to your logo image or logo icon to add the margining --> 
		Cosmosimpex
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-user"></i> <span><?php echo $logged_user['username']; ?> <i class="caret"></i></span> </a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header bg-light-blue">
							<?php 
								$img = 'profile.jpg';
								if(!empty($logged_user['Profile']['image'])){
									$img = $logged_user['Profile']['image'];
								}
								echo $this->Html->image($img,array('class'=>'img-circle','alt'=>'User Image')); 
							?>
							<!-- <img src="img/avatar3.png" class="img-circle" alt="User Image" /> -->
							<p>
								<?php echo $logged_user['username']; ?>
							</p>
						</li>
						
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_view',$logged_user['id'])) ?>" class="btn btn-default btn-flat btn-header-top">Profile</a>
							</div>
							<div class="pull-left">
								<a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_change_password')) ?>" class="btn btn-default btn-flat btn-header-top">Change Password</a>
							</div>
							<div class="pull-right">
								<a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'logout','prefix'=>false,'admin'=>false)) ?>" class="btn btn-default btn-flat btn-header-top">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>