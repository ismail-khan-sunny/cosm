<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left info">
				<p>
					<i class="glyphicon glyphicon-user"></i> Hello, <span class="text-green"><?php echo $logged_user['username']; ?> </span>
				</p>

			</div>
		</div>
		<?php //pr($admin_menu_data); ?>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<?php echo $this->CustomAuthorizedMenu->generateAuthorizedMenu($admin_menu_data, $navbarbar_class = 'nav-primary hidden-xs', $dropdown_class = 'sidebar-menu', $active_menu = '', $ajax_menu_class = ''); ?>
		
	</section>
	<!-- /.sidebar -->
</aside>