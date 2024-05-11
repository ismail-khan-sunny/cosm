   <div class="title">News & Event:</div>
                        <div id="amazingcarousel-container-1">
                        <div id="amazingcarousel-1" style="display:none;position:relative;width:100%;max-width:240px;margin:0px auto 0px;">
                            <div class="amazingcarousel-list-container">
                                <ul class="amazingcarousel-list">
                                   <?php if(!empty($news)){?>
                                  <?php foreach($news as $news_data): ?>
                                                                        <?php
                                          $image = $this->Custom->valid_contact_Image($news_data['News']['image'],'news');

                                          $url = $this->Html->url(array('controller'=>'news','action'=>'view',$news_data['News']['slug']));
                                          if($news_data['News']['type']=='File'){
                                              $image = $this->News->getFileIcon($news_data['News']['file']);
                                              $url = $this->base.$news_data['News']['file'];
                                          }
                                      ?>                               
                                      <li class="amazingcarousel-item">
                                        <div class="amazingcarousel-item-container">
                                          <div class="amazingcarousel-image"><a href="images/c3-lightbox.jpg" title="c3"  class="html5lightbox"> <?php echo $this->Html->image($image,array('class'=>'img-circle','alt'=>$news_data['News']['title'],'style'=>'width:80px;height:58px')); ?></a></div>
                                          <div class="amazingcarousel-text">
                                              <div class="amazingcarousel-title">
                                                <a  href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'view_full_news',$news_data['News']['id'])); ?>">
                                              <?php echo String::truncate(strip_tags($news_data['News']['title']),20,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>
                                              </a>

                                              </div>
                                              <div class="amazingcarousel-description"><?php echo String::truncate(strip_tags($news_data['News']['description']),30,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?></div>
                                          </div>
                                          <div style="clear:both;"></div>         
                                     </div>
                                    </li>
                                     <?php endforeach; }?>  
                                </ul>
                                <div class="amazingcarousel-prev"></div>
                                <div class="amazingcarousel-next"></div>
                            </div>
                            <div class="amazingcarousel-nav"></div>