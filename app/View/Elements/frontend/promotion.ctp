<section class="section-top-65 section-bottom-70">
  <div class="shell">
    <div class="range range-sm-reverse">
      <div class="cell-sm-6 Swift">
        <div class="divider divider-2"></div>
        <h2 class="section-top-17 section-bottom-15">
        <?php echo $competitive_advantage['Content']['title']; ?>
        </h2>
        <?php echo $competitive_advantage['Content']['description']; ?>

        <div class="divider divider-2 offset-md-top-20"></div>
        <?php
        if(!empty($common_lasts)):
          foreach($common_lasts as $common_last):
            $image=$common_last['Notice']['image'];
          ?> 
          <div class="thumbnail offset-top-50 offset-sm-top-20">
            <?php echo $this->Html->image($image,array('class'=>'img-responsive')); ?>
            <div class="caption text-left">
              <h3><?php echo $common_last['Notice']['title']; ?></h3>
              <p>
              <?php echo String::truncate(strip_tags($common_last['Notice']['description']),320,array('ellipsis' => '..','exact' => false,'html'=>false)); ?>
              </p><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'notice_details',$common_last['Notice']['id'])); ?>" class="link link--effect-12">read more</a>
            </div>
          </div>
        <?php endforeach;   endif;  ?> 
      </div>
      <div class="cell-sm-6 offset-top-45 offset-sm-top-0">
        <?php
        if(!empty($common_firsts)):
          foreach($common_firsts as $common_first):
            $image=$common_first['Notice']['image'];
          ?>  
          <div class="thumbnail">
            <?php echo $this->Html->image($image,array('class'=>'img-responsive')); ?>
            <div class="caption text-left">
              <h3><?php echo $common_first['Notice']['title']; ?></h3>
              <p>
                <?php echo String::truncate(strip_tags($common_first['Notice']['description']),320,array('ellipsis' => '..','exact' => false,'html'=>false)); ?>
              </p><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'notice_details',$common_first['Notice']['id'])); ?>" class="link link--effect-12">read more</a>
            </div>
          </div>
        <?php endforeach;   endif;  ?> 
      </div>
    </div>
  </div>
</section>