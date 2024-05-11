<div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="well thumbnail">
                            <!-- Carousel
                            ================================================== -->            
                            <div id="myCarousel" class="carousel slide">
                                <div class="carousel-inner">
                                    

                                     <?php

                                     $i=0;
                                      foreach($datas as $data):
                                     
                                    if($i=="0")
                                    {
                                        $item="active";
                                    }
                                    else
                                    {
                                        $item="";

                                    }


                                      ?>
                                    <div class="item <?php echo $item;  ?>">


                                        <div class="row">
                                        <?php foreach($data as $result): ?>

                                            <div class="col-md-3">

                                            <a href="<?php echo $this->base.'/pages/get_all_album_photos/'.$result['PhotoGallery']['id'].'/'.$result['PhotoGallery']['title'];?>" class="thumbnail">
                                             <?php
                                                      $image = $this->Custom->validImage($result['PhotoGallery']['image'],'other');
                                                 
                                                    ?>
                                                    <?php echo $this->Html->image($image,array('class'=>'img-responsive hovereffect','style'=>'width:100%;height:129px;','alt'=>$result['PhotoGallery']['title'])); ?>
                                           
                                            </a>
                                            </div>
                                            <?php endforeach; ?>

                                            
                                        </div>
                                    </div>
                                     <?php $i++; endforeach; ?>




                                    

                                </div>
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                                
                                <ol class="carousel-indicators">
                                <?php
                                     $i=0;

                                      foreach($datas as $data):
                                     
                                    if($i=="0")
                                    {
                                        $item="active";
                                    }

                                      ?>
                                    <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $item;  ?>"></li>
                                     <?php $i++; endforeach; ?>
                                    
                                </ol>                
                            </div><!-- End Carousel --> 
                        </div><!-- End Well -->
                </div><!--col-md-12 ends-->
            </div><!--row ends-->


