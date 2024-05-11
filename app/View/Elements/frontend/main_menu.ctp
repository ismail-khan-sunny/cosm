<?php 
$z_index="1";
if($this->params['controller']=='products' & $this->params['action']=='details'){ 
$z_index="99999";
}
?>

 <nav id="main-nav" role="navigation" class="navbar navbar-default shadow-navbar" style="margin-bottom: 20px; z-index:<?php echo $z_index;  ?>;">
      <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="cart.html" class="btn btn-default btn-cart-xs visible-xs pull-right">
              <i class="fa fa-shopping-cart"></i>
            </a>
          </div>
  <?php

    if($this->params['controller']=='pages' & $this->params['action']=='index'){
                                $active_menu = '';
                            }else{
                                $active_menu = '';
                                if(!empty($this->params['pass'])){
                                  $active_menu = $this->Custom->getActiveSlug($this->params['pass']['0']);
                                }else{
                                  $active_menu = $this->Custom->getCustomFunctionSlug($this->params['action']);
                                }
                            }

     echo $this->Menu->generateMenu($menu_data['header'], $navbarbar_class = 'navbar-default', $dropdown_class = 'nav navbar-nav navbar-nav-custom', $enable_navbar = 0, $search = 0,$active_menu, $home_menu=1,$caret=""); ?>
      </div>
    </nav>

<div class="clearfix"></div>
<?php if($this->params['controller']!='pages' || $this->params['action']!='index'): ?>
<div class="breadcrumb-panel paddingbradcam">
<div class="container breadcumb-background">
<?php
      echo $list = $this->Html->getCrumbList(
        array('class'=>'breadcrumb'),
        array(
          'text' => 'Home',
          'url' => array('controller' => 'pages', 'action' => 'index', 'home'),
          'escape' => false
          )
        );
        ?>
</div>
</div>
<?php endif; ?>
   <style type="text/css">
     .dropdown-menu {
    background-clip: padding-box;
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.176);
    display: none;
    float: left;
    font-size: 14px;
    left: 0;
    list-style: outside none none;
    margin: 2px 0 0;
    min-width: 160px;
    padding: 5px 0;
    position: absolute;
    text-align: left;
    top: 100%;
    z-index: 99999999999999 !important;
}
.input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group {
    margin-left: -1px;
    z-index: 2147483647 !important;
}
.input-group-btn{
  z-index: 999 !important;
}
</style>