
<div class="well connect" style="padding-bottom: 7px; margin-top: 15px; ">
    



<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <div class="well-contact history" id="heightfixed">
       
        <h5 class="convoc"><strong><?php  echo $seminar['Content']['title']; ?></strong></h5>
        <div class="container_text_message">
            <a href='<?php echo $this->base.'/pages/content_detail/'.$seminar['Content']['slug'];?>'>
        <?php echo String::truncate(strip_tags($seminar['Content']['description']),150); ?></a></div>
		
        </div>
        <div class="well-contact history" id="heightfixed">
        <h5 class="convoc"><strong><?php  echo $convocation['Content']['title']; ?></strong></h5>
        <div class="container_text_message">
            <a href='<?php echo $this->base.'/pages/content_detail/'.$convocation['Content']['slug'];?>'>
        <?php echo String::truncate(strip_tags($convocation['Content']['description']),150); ?></a></div>
          
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <div class="well-contact history" style="padding-bottom: 0px;height:264px;">
              <?php
			  /*
         echo "<pre>";
		print_r($link);
		echo "<pre>";
		die();
		*/
        ?>
        <?php
        //pr($menus);
    ?>
    
        <h5 class="menu-acd"><strong>Links</strong></h5>
        <ul class="widget ac">
        <?php foreach($link as $links):
		
		 ?>
            <li style="min-height:40px">
            <?php
        if(!empty($links['RelatedLink']['image'])){
            echo $this->Html->image($links['RelatedLink']['image'],array('width'=>'20'));
        }
    ?>
                <?php
                    $url = $links['RelatedLink']['url'];
                   
                    echo $this -> Html -> link($links['RelatedLink']['title'], "{$url}");                             
                ?>
            </li>
        <?php endforeach; ?>
        </ul>
 
        
              </div>
        </div>
        </div>
        </div>

<div class="row" style="border:0px solid #F00">
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        
        <div class="well connect" style="padding-bottom: 7px; min-height:502px;">
    <h4 class="menu-connect"><strong>CONTACT US</strong></h4>
    <?php echo $contact['Content']['description']; ?>
</div>
    </div>
    
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3636.9573502883613!2d89.01244817175424!3d24.27822016991878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xade0dc92173fbe32!2sQadirabad+Cantonment+Sapper+College!5e0!3m2!1sen!2sbd!4v1433919539575" style="border:0" frameborder="0" height="497" width="100%"></iframe>
        </div>
    </div>
    
</div>