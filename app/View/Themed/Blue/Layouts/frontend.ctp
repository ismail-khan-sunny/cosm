<!DOCTYPE html>
<html lang="en" class="app">
<head>
<?php echo $this->Html->charset(); ?>
<title><?php echo $title_for_layout; ?></title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta property="og:title" content="Nogor Solutions CMS" />
<meta property="og:type" content="website" />
<meta property="og:image" content="" />
<meta property="og:site_name" content="Nogor Solutions CMS" />


<!--[if lt IE 9]>
<script src="js/ie/html5shiv.js"></script>
<script src="js/ie/respond.min.js"></script>
<script src="js/ie/excanvas.js"></script>
<![endif]-->



<?php
echo $this -> Html -> meta('icon');

//css
echo $this -> Html -> css(array(
		'css/bootstrap.min',
		'font-awesome.min',
		'font',
		'css/style'
));

echo $this -> Html -> script(array('jquery.min'));
echo $this -> fetch('meta');
echo $this -> fetch('css');
echo $this -> fetch('script');
?>


<!-- <script src="<?php echo $this->webroot; ?>ckeditor/ckeditor.js"></script> -->
</head>
<body data-baseurl="<?php echo $this->base;?>">
	<!-- forntend header -->
	<?php echo $this -> element('frontend/header'); ?>

	<!-- Content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="container">
					<div class="row">
						<section id="page-container">
							<?php echo $this->Session->flash(); ?>
							<?php echo $this->fetch('content'); ?>
						</section>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- forntend footer -->
	<?php echo $this -> element('frontend/footer'); ?>

	<?php //echo $this->element('sql_dump'); ?>

</body>
</html>
