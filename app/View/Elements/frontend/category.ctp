 <section class="well bg-light border">
    <div class="container">
        <div class="row">
           <?php
           
                if(!empty($categories)):
                  foreach($categories as $category):
                     $image = $this->Custom->valid_contact_Image($category['Category']['image'],'news');
                  $products = $this->Custom->getProduct($category['Category']['id']);

              ?>               
            <div class="col-md-4 col-sm-4 col-xs-6 wow fadeInUp">
                <div class="box">
                    <div class="box_aside">
                      
                        <?php echo $this->Html->image($image,array('alt'=>$category['Category']['title'],'class'=>'img-circle')); ?>
                    </div>
                    <div class="box_cnt box_cnt__no-flow">
                        <h5 class="strong"><?php echo $category['Category']['title']; ?></h5>
                    </div>
                </div>
                <br>
               <ul class="bxslider">
                <?php
           
                if(!empty($products)):
                  foreach($products as $product):
                     $images = $this->Custom->valid_contact_Image($product['Product']['image'],'other');
                ?> 
                  <li>
                  <?php echo $this->Html->image($images,array('title'=>$product['Product']['title'],'class'=>'img-responsive')); ?>
                  </li>
                 
             <?php
             endforeach;
              endif;
              ?>                           
                </ul>
                <p class="big">
                <?php 
                    echo $product['Category']['description']; 
                ?> 
               </p>
               <?php
                 $action='details';
                 if($product['Category']['using_brand']=='1'){
                    $action='view';
                 }
                 ?>
                  <a class="learn" href="<?php echo $this->base.'/categories/'.$action.'/'.$category['Category']['id'];?>" >
                Learn more &gt;&gt;</a>
            </div>
            
            <?php
             endforeach;
              endif;
              ?>  
        </div>
    </div>
</section>