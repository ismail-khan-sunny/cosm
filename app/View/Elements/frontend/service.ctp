<section>
  <div class="shell section-top-17">
    <div class="range">
      <div class="cell-md-4">
        <div class="divider divider-1">
        </div>
        <h1 class="divider-off text-uppercase section-md-27">Our<br class="hidden visible-md-block visible-lg-block"> Services
        </h1>
        <div class="divider divider-1">
        </div>
      </div>
      <?php
      $count = 1;
      foreach($services as $service) 
      {
        if ($count%2 == 1)
        {  
          echo '<div class="cell-md-2 cell-xs-6 section-xs-60 inset-md-left-40">';
        }
        ?>
        <div class="icon icon-lg border text-primary offset-top-45 offset-xs-top-0">
          <?php echo $this->Html->image($service['Service']['image'],array('style'=>'height:72px;width:auto !important')); ?>
        </div>
        <div class="text-md-left text-center offset-top-16" style="height:65px;">
        <a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'service_details',$service['Service']['id'])); ?>" class="h5">
            -<?php echo $service['Service']['title'];  ?>
          </a>
        </div>
        <?php
        if ($count%2 == 0)
        {
          echo "</div>";
        }
        $count++;
      }
      if ($count%2 != 1) echo "</div>";
      ?>
    </div>
  </div>
</section>    