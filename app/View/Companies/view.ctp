     <main>
            <section class="well well__ins2 bg-light">
            <div class="container">
                 <h3 class="text-primary" style="font-weight: bold!important;"><?php echo $company['Company']['title']; ?></h3>
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-xs-12 center767">
                        <div id='cssmenu'>
                            <ul>
                               <li class='has-sub'><a href='#'><span>Product</span></a>
                                  <ul>
                                  <?php $product = $this->Custom->getProductCompany($company['Company']['id']);?>
                                  <?php if(!empty($product)){ foreach($product as $val1):?>
                                     <li> <a href="<?php echo $this->base.'/Products/view/'.$val1['Product']['id'].'/'.$val1['Product']['category_id'];?>" ><span><?php echo $val1['Product']['title'];  ?></span></a>
                                     </li>
                                     <?php  endforeach; }?>
                                   
                                  </ul>
                               </li>
                               <li class='has-sub'><a href='#'><span>Brand</span></a>
                                  <ul>
                                  <?php if(!empty($brands)){ foreach($brands as $brand):?>
                                     <li> <a href="<?php echo $this->base.'/categories/view/'.$brand['Brand']['category_id'].'/'.$brand['Brand']['id'];?>"> <?php echo $brand['Brand']['title'];  ?></span></a>
                                     </li>
                                     <?php  endforeach; }?>
                                   
                                  </ul>
                               </li>
                               <li class='has-sub'><a href='#'><span>Service</span></a>
                                  <ul>
                                   <?php if(!empty($services)){ foreach($services as $service):?>
                                     <li><a  href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_full_mission',$service['Mission']['id'])); ?>"><span><?php echo $service['Mission']['title'];  ?></span></a>
                                     </li>
                                      <?php  endforeach; }?>
                                   
                                  </ul>
                               </li>                             
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12 center767">
                            <?php  $image = $this->Custom->validImage($company['Company']['image'],'other'); ?>
                            <?php echo $this->Html->image($image,array('class'=>'img-add','alt'=>$company['Company']['title'])); ?>
                    </div>
                    <div class="col-md-7 col-sm-8 col-xs-12">
                    <?php echo $company['Company']['description']; ?>
                        <!--<a class="btn1" href="#">Learn more &gt;&gt;</a>-->
                    </div>
                </div>
            </div>
        </section>
            <section class="well well__ins2 bg-light">
                <div class="container">
                    <h3 class="text-primary">Product Line</h3>
                    <div class="row">
                        <?php foreach($datas as $key=>$value): ?>                    
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <ul class="marked-list">
                             <?php foreach($value['Item'] as $key1=>$value1):?>
                                <li><a href="<?php echo $this->base.'/Products/view/'.$value1['Product']['id'].'/'.$value1['Product']['category_id'];;?>" ><?php echo $value1['Product']['title']; ?></a></li>
                                 <?php endforeach; ?>   
                            </ul>
                        </div>
                         <?php endforeach; ?>   
                       
                    </div>
                </div>
            </section>
    </main>
