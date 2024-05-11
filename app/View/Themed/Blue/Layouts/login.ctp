<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title><?php echo $title_for_layout; ?></title>
<meta name="keywords" content="nogor solutions cms" />
<meta name="description" content="nogor solutions cms" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--[if lt IE 9]>
		<script src="js/ie/html5shiv.js"></script>
		<script src="js/ie/respond.min.js"></script>
		<script src="js/ie/excanvas.js"></script>
		<![endif]-->
<?php
echo $this -> Html -> meta('icon');

//add all css here
echo $this -> Html -> css(array(
		'bootstrap.min',
		'jquery-ui/jquery-ui',
		'animate',
		'datepicker',
		'font-awesome.min',
		'font',
		'app',
		'custom'
));

//Add jquery.min others all js added in footer
echo $this -> Html -> script(array('jquery.min'));

echo $this -> fetch('meta');
echo $this -> fetch('css');
echo $this -> fetch('script');
?>
<script src="<?php echo $this->webroot; ?>ckeditor/ckeditor.js"></script>
</head>
<body class="bg-dark js no-touch no-android no-chrome firefox no-iemobile no-ie no-ie10 no-ie11 no-ios">
	<section class="m-t-lg wrapper-md animated fadeInUp" id="content">
		<div class="container aside-xxl">
			<div class="text-center">
					<?php echo $this -> Html -> link($this -> Html -> image('logo.png', array('class' => 'm-r-sm', 'escape' => false)), '/', array('class' => 'navbar-brand', 'escape' => false)); ?>			
			</div>
			<?php echo $this->fetch('content'); ?>
		</div>
	</section>
	<footer class="clearfix">
		<div id='0100111001101111011001110110111101110010'></div>
	</footer>
	<?php echo $this->element('admin/modal'); ?>
	<?php echo $this -> Html -> script(array(
			'bootstrap.min',
			'jquery-ui/jquery-ui',
			'app',
			'app.plugin',
			'datepicker/bootstrap-datepicker',
			'slimscroll/jquery.slimscroll.min.js',
			'adminjs'
					)); ?>

	<div class="clearfix">
		<div class="clearfix">
			<?php //echo $this->element('sql_dump'); ?>
		</div>
	</div>
</body>
</html>
