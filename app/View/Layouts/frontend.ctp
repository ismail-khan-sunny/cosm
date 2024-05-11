<!DOCTYPE html>
<html lang="en" class="app">
<head data-baseurl="<?php echo $this->base;?>">
  <meta charset="utf-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="telephone=no" name="format-detection">
  <link style="height:36px;width:36px" rel="shortcut icon" href="<?php echo $this->webroot; ?>cosmosimpex-favicon.png" />
  <title>
    <?php 

    if(!empty($title_of_layout))
    {
      echo $title_of_layout;
    }

    else {
      echo $site_data['Configuration']['title'];
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
  <meta name="keywords" content="<?php echo $site_data['Configuration']['meta_keywords']; ?>">
  <meta name="description" content="<?php echo $site_data['Configuration']['meta_description']; ?>">

  <?php
  endif;
  ?>

  <?php
  echo $this->Html->css(
    array(
      'frontend/bootstrap',
      'frontend/style',
      'frontend/font-awesome.min'
      )
    ); 
    ?>

  </head>
  <body style="min-height:650px">
    <?php echo $this->element('frontend/header'); ?>
    <?php echo $this->fetch('content'); ?>
    <?php echo $this->element('frontend/footer'); ?>      

    <?php
    echo $this->Html->script(
      array(
        'frontend/core',
        'frontend/script'
        )
      );
      ?> 
    </body>
    </html>
