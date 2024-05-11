<main class="page-content">
    <div class="shell section-80 section-md-0">
        <div class="range section-md-top-78 section-md-bottom-35">
            
        </div>
        <div class="range range-md-reverse range-md-right offset-top-0 range-xs-center">
            <div class="cell-md-6 cell-sm-6 text-left">
                <h1 class="offset-md-top-45 text-uppercase">Contact us</h1>
                <div class="contact-info-var-1">
                    <?php 
                        echo $contact['Contactus']['description'];
                        ?>
                </div>
            </div>
            <div class="cell-md-6">  <?php echo $contact['Contactus']['google_location']; ?>
            </div>
        </div>
        <div class="range offset-top-48 section-md-bottom-150">
            <div class="cell-md-4">
                <div class="divider divider-1"></div>
                <h1 class="divider-off text-uppercase section-md-27">Get in<br class="hidden visible-md-block visible-lg-block"> touch
                </h1>
                <div class="divider divider-1"></div>
            </div>
            <div class="cell-md-6 cell-md-preffix-1">

                <div class="rd-mailform-validate"></div>
                <?php                                         
                echo $this->Session->flash();
                echo $this->Form->create('Contactus',array('class'=>'rd-mailforms text-left','role'=>'form','id'=>'MessageContactUsForm'));
                ?>
                
                    <div class="mfInput"><input type="text" placeholder="Name" data-constraints="@NotEmpty" name="name"><div class="mfValidation"></div></div>
                    <div class="mfInput"><input type="text" placeholder="Phone" data-constraints="@Phone" name="phone"><div class="mfValidation"></div></div>
                    <div class="mfInput"><input type="text" placeholder="E-Mail" data-constraints="@NotEmpty @Email" name="email"><div class="mfValidation"></div></div>
                    <div class="mfInput"><textarea placeholder="Message" data-constraints="@NotEmpty" name="message" type="text"></textarea><div class="mfValidation"></div></div>
                    <button class="btn btn-primary btn-sm text-uppercase text-bold">Send</button>
                <?php 
                echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
</main>