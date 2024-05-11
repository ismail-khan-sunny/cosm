<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
<body data-baseurl="<?php echo $this->base;?>">
	<section class="vbox">
		<header class="bg-dark dk header navbar navbar-fixed-top-xs">
			<!-- Logo -->
			<?php echo $this -> element('logo'); ?>
			<!-- Auth User tools -->
			<?php echo $this -> element('auth_user', array('data' => 'data')); ?>
		</header>

		<section>
			<section class="hbox stretch">
				<?php echo $this -> element('main_nav'); ?>
				<section id="content" class="">
					<?php echo $this->Session->flash(); ?>
					<section class="vbox">
						<?php echo $this->fetch('content'); ?>
					</section>
				</section>
			</section>
		</section>
	</section>
	<?php echo $this->element('admin/modal'); ?>
	<footer class="clearfix">
		<div id='0100111001101111011001110110111101110010'></div>
	</footer>

	<?php echo $this -> Html -> script(array(
			'bootstrap.min',
			'jquery-ui/jquery-ui',
			'app',
			'app.plugin',			
			'slimscroll/jquery.slimscroll.min.js',
			'adminjs'
					)); ?>

	<div class="clearfix">
		<div class="clearfix">
			<?php echo $this->element('sql_dump'); ?>
		</div>
	</div>
</body>
</html>
