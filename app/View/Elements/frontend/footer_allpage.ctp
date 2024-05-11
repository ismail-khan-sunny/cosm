<footer id="welcome" class="navbar-default">
        <div class="container">
            <div class="row"></div>
            <?php if($this->params['controller']=='pages' & $this->params['action']=='index'){
            echo $welcome['Content']['title']; 
            }
             ?>
             </div>
        </div>
    </footer>
        <footer style="display: block;" id="bottom_link" class="navbar-default" style="position:absolute">
        <div class="container">
            <div class="row">
                <ul class="linkk">
                <?php


             if(!empty($menu_data['footer'])):  ?>
           
              <?php foreach($menu_data['footer'] as $footermenu):?>
                <?php
                 
                  if($footermenu['Menu']['type']=='content'){
                    $url = $this->Html->url(array('controller'=>'pages','action'=>'content_details',$footermenu['Menu']['slug']));
                  }elseif($footermenu['Menu']['type']=='external_link'){
                    $url = $this->Menu->getExternalLink($footermenu['Menu']['url']);
                  }elseif($footermenu['Menu']['type']=='file'){
                    $url = $footermenu['Menu']['file'];
                  }

                ?>
                   <li><a href="<?php echo $url; ?>">
                   <?php echo $footermenu['Menu']['title']; ?></a></li>
              <?php endforeach; ?>
            <?php endif; ?>
            </ul>
            </div>
        </div>
    </footer>
    
   
    <footer id="fix_footer" class="navbar-default c_footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 text-left">Copyright © <?php echo date("Y"); ?> DPC-GROUP. All Rights Reserved.</div>
                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12 text-center" style="width:16% !important;"></div>
                    <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 text-right" style="width:50% !important;"><div class="credit">
                    Developed by <a href="#" title="Nogor Solutions">Nogor Solutions</a>
                </div></div>

            </div>
        </div>
    </footer>