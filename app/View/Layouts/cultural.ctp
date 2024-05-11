<!DOCTYPE html>
<html lang="en" class="app">
<head>
<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>	
	
	
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>DPC Group </title>
<meta name="keywords" content="nogor solutions cms" />
<meta name="description" content="nogor solutions cms" />
<link rel="shortcut icon" type="<?php echo $this->webroot; ?>img/favicon.ico" href="<?php echo $this->webroot; ?>img/favicon.ico"/>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--[if lt IE 9]>
		<script src="js/ie/html5shiv.js"></script>
		<script src="js/ie/respond.min.js"></script>
		<script src="js/ie/excanvas.js"></script>
<![endif]-->
<?php
echo $this -> Html -> meta('icon');

//add all css here
echo $this -> Html -> css(array(
		'admin/bootstrap.min',
		'admin/font-awesome.min',
		'admin/ionicons.min',
		'admin/morris/morris',
		'admin/jvectormap/jquery-jvectormap-1.2.2',
		'admin/datepicker/datepicker3',
		'admin/daterangepicker/daterangepicker-bs3',
		'admin/admin',
		'admin/custom.css',
));

//Add jquery.min others all js added in footer

echo $this -> fetch('meta');
echo $this -> fetch('css');
echo $this -> fetch('script');
?>
<script src="<?php echo $this->webroot; ?>ckeditor/ckeditor.js"></script>

</head>
<body class="skin-blue" data-baseurl="<?php echo $this->base;?>">
	<?php echo $this->element('admin/header'); ?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php echo $this->element('admin/cultural_household_sidebar'); ?>
		<!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <small>Control panel</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
            	<?php echo $this->Session->flash(); ?>
            	<?php echo $this->fetch('content'); ?>
            </section>
    	</aside>
	</div>
	
	
	<?php //echo $this->element('admin/modal'); ?>
	
	<div class="clearfix">
		<div class="clearfix">
			<?php echo $this->element('sql_dump'); ?>
		</div>
	</div>
	<?php
		echo $this -> Html -> script(
			array(
				'admin/jquery.min',
				'admin/bootstrap.min',
				'admin/jquery-ui.min',
				'admin/raphael-min',
				'admin/plugins/morris/morris.min',
				'admin/plugins/daterangepicker/daterangepicker',
				'admin/plugins/datepicker/bootstrap-datepicker',
				'admin/nogoradmin/app',
				//'admin/nogoradmin/dashboard',
				'admin/nogoradmin/demo',
				//'admin/nogoradmin/jquery.autosize',
				'admin/nogoradmin/custom',
			)
		); 
				
	?>
</body>
</html>
