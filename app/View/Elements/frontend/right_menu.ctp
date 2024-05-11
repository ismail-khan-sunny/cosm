
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
  <div id="cssmenu">
    <ul>
      <li class="active"><a href="#"><span><?php echo $category_details['Category']['name']; ?></span></a>
      </li>
      <?php if(!empty($categories)): ?>
        <?Php $i=0;foreach ($categories as $key => $category) :
        $params = $this->params;
        $has="";
        $display="";
        $pass = $params['pass'][0];
        if($pass==$category['Category']['id']){
          $has="active";
          $display="display: block;"; 
        }
        ?>
          <li class="has-sub <?php echo $has; ?>"><a href="<?php echo $this->base.'/categories/view/'.$category['Category']['id'];?>" ><span><?php echo $category['Category']['name']; ?></span></a></a>
            <ul style="<?php echo $display; ?>">
              <?php
                $activehover="";
               foreach($category['children'] as $category_ch):
                if(!empty($params['pass'][1])){
                  if($category_ch['Category']['id']==$params['pass'][1]){
                   $activehover="activehover"; 
                  }
                }
                ?>
                <li class="<?php echo $activehover; ?>">
                  <a href="<?php echo $this->base.'/categories/view/'.$category_ch['Category']['parent_id'].'/'.$category_ch['Category']['id'];?>" > <span><?php echo $category_ch['Category']['name']; ?></span>
                  </a>
                </li>
              <?Php $activehover=""; endforeach; ?> 
            </ul>
          </li>
        <?Php $has=""; $i++; endforeach; ?> 
     <?Php endif; ?> 
    </ul>
  </div>
</div>
<style type="text/css">
.activehover > a {
    color: #0c72ba !important;
}
</style>