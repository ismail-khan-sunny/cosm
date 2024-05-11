 <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-right: 0px; padding-left: 0px;">
                    <div class="border"></div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <h3 class="connect">Connect with us</h3>
                                <div class="connect-para">We're on Social Networks. Follow us & get in touch.</div>


                                <ul class="social-list">
                                <?php
                                  $social_links = $this->Session->read('social_links');
                                   foreach($social_links as $social): ?>

                                      <li>
                                      <a  title="<?php echo $social['SocialLink']['title']; ?>" href="<?php echo $social['SocialLink']['url']; ?>"><?php echo $social['SocialLink']['icon']; ?></a></li>
                                  <?php endforeach; ?>

                                  
                                </ul><!--social-list ends-->
                            </div><!--col-md-6 ends-->


                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <h3 class="connect" style="padding-left: 20px;">Contact Us</h3>
                                

                                <?Php  echo $contact['Content']['description']; ?>
                                </div>
                        </div><!--row ends-->
                </div><!--col-md-12 ends-->
            </div><!--row ends-->
        