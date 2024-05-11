<section class="bg-tundora">
    <div class="shell section-80">
        <div class="range range-xs-center">
            <div class="cell-md-4 text-center">
                <div class="divider divider-6"></div>
                <h2 class="text-white text-bold text-uppercase divider-off offset-top-20 border-bottom text-mercury">Get In Touch With Us</h2>
                <div class="divider-bottom divider-5"></div>
                <div class="contact-info">
                    <?php echo $contact['Contactus']['description']; ?>
                </div>
                <ul class="list-inline list-inline-md">
                <?php
                        $n=0;
                        $social_data = $this->Session->read('social_data');
                        foreach($social_data['header'] as $social):
                       
                    ?>
                    <li><a href="<?php echo $social['SocialLink']['url']; ?>" class="<?php echo $social['SocialLink']['icon']; ?> icon icon-xs"></a></li>
                <?php  $n++; endforeach; ?>  
                </ul>
            </div>
        </div>
    </div>
</section>