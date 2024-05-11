<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" type="<?php echo $this->webroot; ?>img/fabicon.jpg" href="<?php echo $this->webroot; ?>img/fabicon.jpg"/>
    <title>Bangladesh Eco-friendly Industrial Park Ltd </title>
	
    <?php
		echo $this->Html->css(
			array(
				'frontend/bootstrap.min',
				'frontend/bootstrap-theme.min',
				'frontend/prettyPhoto',
				'frontend/style',
                'frontend/custom',
				'frontend/jquery.smartmenus.bootstrap',
				'modern-tricker/theme',
				'modern-tricker/modern-ticker',
				'advanced-news-tricker/newsTicker',
				'frontend/font-awesome/css/font-awesome.min',
				'frontend/font-awesome/css/font-awesome'

			)
		);
		
	?>
	<?php
		echo $this->Html->script(
			array(
				'frontend/jquery-1.11.0.min',
				
			)
		);
		?>
	
   

 <script src="<?php echo $this->webroot; ?>js/modern-tricker/jquery.modern-ticker.min.js" type="text/javascript"></script>
<script type="text/javascript">
 $(function(){$(".ticker1").modernTicker({
 effect:"scroll",
 scrollType:"continuous",
 scrollStart:"inside",
 scrollInterval:20,
 transitionTime:500,
 autoplay:true,
 linksEnabled: true,
    });
 
})

 </script>
 

        <?php
		echo $this->Html->script(
			array(
				'frontend/jquery.prettyPhoto',
				'frontend/bootstrap.min',
               // 'frontend/jquery',
                'frontend/jquery.smartmenus',
                'frontend/jquery.marquee',
                'frontend/jquery.smartmenus',
                'frontend/jquery.marquee',
                'frontend/jquery.smartmenus.bootstrap',
				'frontend/script',
				'frontend/jquery.pause',
				//'newsticker-jcarousellite/jquery-latest.pack',
				//'newsticker-jcarousellite/jcarousellite_1.0.1c4',
				
				
             
				
			)
		);
		?>
 

       
</head>

<div class="row">
	<div class="col-md-12">
		<?php echo $this->Html->image('404.png',array('class'=>'img-responsive')); ?>
	</div>
</div>