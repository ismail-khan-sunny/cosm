                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding-left: 0px; padding-right: 0px; ">

                                        <div class="middle-content" style="height: 534px;">
                                            <div class="notice" style="height: 480px;">
                                               <h3 class="addnotice-title" style="padding-top: 25px;">Addmission Notice</h3>

                                                 <?php if(!empty($addmission)){
                                                         foreach($addmission as $addmission):
                                                        $datetime=$addmission['Notice']['created'];
                                                                
                                                            $time = strtotime($datetime);
                                                                         ?>

                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                        <div class="months_date">
                                                            <?php
                                                            $today = date("jS M", $time);  
                                                            echo $today;
                                          
                                                            ?>
                                                            
                                                        </div>
                                                    </div>   
                                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                        <div class="months_text">
                                                           <a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_full_notice',$addmission['Notice']['slug'])); ?>">
                                                            <?php echo String::truncate(strip_tags($addmission['Notice']['title']),60,array('ellipsis' => ' ...','exact' => false,'html'=>false,'class'=>'ja-title')); ?>

                                                            </a>


                                                        </div>
                                                    </div>
                                                </div><!--row ends-->
                                                


                                                <div class="gnotice-last"></div>
                                                 <?php endforeach; ?>
                                                  <?php } ?>
                                                 
                                                    
                                                   
                                            </div>

                                             <div class="read_more">
                                                    <a style="padding-top: 0px;" class="text-success pull-right" href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_all_admission')) ?>">
                                                    View All Admission&nbsp;<i class="fa fa-plus"></i></a>
                                                    </div>
                                            <!--notice ends-->
                                            <!--<div class="addmission-notice">
                                                <h3 class="addnotice-title">Addmission Notice</h3>
                                                <div class="university_news_date">
                                                    <strong>Nov 20,2015</strong>
                                                </div>
                                                <div class="university_news_text">
                                                    <a class="text-muted" href="" taret="">AIBA has observed Parent's Day on 20 Nov, 2015 (Level-I Term-II, Fall, 2015)</a>
                                                </div>
                                                <div class="news_border_bottom"></div>
                                                <div class="university_news_date">
                                                    <strong>Nov 18,2015</strong>
                                                </div>
                                                <div class="university_news_text">
                                                    <a class="text-muted" href="#" taret="">Visit of UGC Chairman at AIBA on 18 November, 2015</a>
                                                </div>
                                                <div class="news_border_bottom"></div>
                                                <div class="university_news_date">
                                                <strong>Oct 27,2015</strong>
                                                </div>
                                                <div class="university_news_text">
                                                    <a class="text-muted" href="#" taret="">Certificate Award Giving Ceremony</a>
                                                </div>
                                                <div class="news_border_bottom"></div>
                                                <span class="read_more">
                                                    <a class="text-success pull-right" href="#">View All News</a>
                                                </span>
                                            </div>addmission-notice ends-->
                                        </div><!--middle-content ends-->
                                    </div><!--col-4-ends-->
                                </div>