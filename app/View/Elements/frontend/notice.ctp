

<div class="row addmission-notice" style="min-height: 241px;">

                               
                                        <h3 class="addnotice-title">General Notice</h3>

                                         <?php 
                                         if(!empty($notices))
                                         {
                                         foreach($notices as $notice):
                
                                          $datetime=$notice['Notice']['created'];
                                              
                                          $time = strtotime($datetime);
                                          ?>
                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                            <div class="university_news_date">
                                                <strong>
                                                <?php  $today = date("M jS  Y", $time);  
                                                            echo $today;
                                        
                                                            ?>
                                                </strong>
                                            </div>
                                            <div class="university_news_text">
                                                 <a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_full_notice',$notice['Notice']['slug'])); ?>"><?php echo String::truncate(strip_tags($notice['Notice']['title']),80,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?></a>
                                            </div>
                                            
                                        </div><!--col-md-4 ends-->
                                         <?php endforeach; 
                                         ?>

                                        <div class="read_more">
                                        <a style="padding-top: 15px;" class="text-success pull-right" href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_all_notice')) ?>">
                                            View All Notice&nbsp;<i class="fa fa-plus"></i></a>
                                        </div>
                                        <?php
                                      }
                                      
                                      else
                                         {
                                         ?>
                                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                         <h3>There is no notice</h3>
                                         </div>
                                         <?php
                                       }
                                       ?>
                                        <!--col-md-4 ends-->
                                        <!--read_more ends-->
                                   
                                </div><!--row ends-->

                            </div>
         