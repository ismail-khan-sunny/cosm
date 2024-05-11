<!DOCTYPE html>
<html class=" desktop landscape" lang="en" adlesseunifierdata="["{\"w\":false,\"galleryBuild\":true,\"id\":\"{6C8B07BF-0F6D-4EA4-B96F-FF1CCBAAE553}\",\"name\":\"FastestTube\",\"isComponentMode\":true}"]">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="telephone=no" name="format-detection">
    <link rel="shortcut icon" type="<?php echo $this->webroot; ?>img/frontend/basumati-favicon.jpg" href="<?php echo $this->webroot; ?>img/frontend/basumati-favicon.jpg"/>
      <title>
        <?php 
        
        if(!empty($title_of_layout))
        {
          echo $title_of_layout;
        }
        
        else {
          echo $site_setting[0]['Configuration']['slogan'];
        }
        ?>
     </title>
     <?php
        if(!empty($meta_keys) && !empty($meta_description)):
          
      ?>  
      <meta name="keywords" content="<?php echo $meta_keys;?>">   
      <meta name="description" content="<?php echo $meta_description;?>">
      
      <?php
        else:
        
      ?>
      <meta name="keywords" content="<?php echo $site_setting[0]['Configuration']['meta_keywords']; ?>">
      <meta name="description" content="<?php echo $site_setting[0]['Configuration']['meta_description']; ?>">
      
      <?php
        endif;
      ?>

      <?php
        echo $this->Html->css(
                        array(
                      'frontend/bootstrap',
                      'frontend/search',
                      'frontend/tm_docs',
                      'frontend/tm_panel',
                      'frontend/camera',
                      'frontend/animate',
                      'frontend/mailform',
                      'frontend/font-awesome/css/font-awesome.min',
                      'frontend/style',
                      'frontend/carouselengine/initcarousel-1',
                      'frontend/jquery.bxslider'
                     
            )
          ); 
        ?>
    <?php
    echo $this->Html->script(
      array(
        'frontend/jquery.min',
        
      )
    );
    ?>
     <?php
      echo $this->Html->script(
                        array(
                     'frontend/jquery-migrate-1.2.1.min',
                     'frontend/device.min',
                     'frontend/jsclient',
                     'frontend/jquery-1.10.2',
                     'frontend/jquery.bxslider.min',
                     
          )
        );
      ?>    
</head>
<body>

<div class="page">
    <!--========================================================
                              HEADER
    =========================================================-->
    <?php echo $this->element('frontend/header');?>      
      <!--========================================================
                              SLIDER
    =========================================================--> 
    <?php //echo $this->element('frontend/banner_slider');?>           
    <!--========================================================
                              CONTENT
    =========================================================-->
    <?php echo $this->fetch('content');?>  
    <!--========================================================
                            FOOTER
  =========================================================-->
    <?php echo $this->element('frontend/footer');?> 
</div>
<?php if($this->params['controller']=='pages' & $this->params['action']=='contact'){ ?>
  <?php
      echo $this->Html->script(
      array(
        'tm-scripts1'
       )
     );
    ?> 
<?php
}else{
?>
  <?php
      echo $this->Html->script(
      array(
        'tm-scripts1'
       )
     );
    ?>


    <?php
    }
      echo $this->Html->script(
      array(
        'frontend/bootstrap.min',
        'tm-scripts1',
        'frontend/carouselengine/amazingcarousel',
        'frontend/carouselengine/initcarousel-1',
        'frontend/jcarousellite_1.0.1c4' 
       )
     );
    ?> 


</body>
</html>
