

<header class="page-head">
    <div class="row">
        <div class="conatainer">
            <div class="rd-navbar-wrap">
                <nav data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fullwidth" data-lg-layout="rd-navbar-static" class="rd-navbar rd-navbar-static">
                    <div class="rd-navbar-inner">
                        <div class="rd-navbar-panel">
                            <button data-rd-navbar-toggle=".rd-navbar-nav-wrap" class="rd-navbar-toggle"><span></span></button>
                            <div class="rd-navbar-brand"><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'index')); ?>" class="brand-name"><img class="img-responsive" src="<?php echo $this->webroot; ?>img/logo.jpg"></a></div>
                        </div>
                        <div class="rd-navbar-nav-wrap">
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
                                if($this->params['controller']=='Products' & $this->params['action']=='view'){
                                    $active_menu = $this->Custom->getCustomFunctionSlug('producrgroup');
                                }
                                if($this->params['controller']=='categories' & $this->params['action']=='view'){
                                    $active_menu = $this->Custom->getCustomFunctionSlug('producrgroup');
                                }
                                if($this->params['controller']=='pages' & $this->params['action']=='service_details'){
                                    if($this->params['pass']['0']=='11'){
                                        $active_menu = "apparel-services";
                                    }
                                }
                                if($this->params['controller']=='companies' & $this->params['action']=='view'){
                                    $active_menu = 'about-us';
                                }

                            }

                            echo $this->Menu->generateMenu($menu_data['header'], $navbarbar_class = 'navbar-default', $dropdown_class = 'nav navbar-nav navbar-nav-custom', $enable_navbar = 0, $search = 0,$active_menu, $home_menu=1,$caret=""); ?>

                        </div>
                    </div>
                </nav>
                <nav data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fullwidth" data-lg-layout="rd-navbar-static" class="rd-navbar rd-navbar--is-clone rd-navbar-static rd-navbar--is-stuck">
                    <div class="rd-navbar-inner">
                        <div class="rd-navbar-panel">
                            <button data-rd-navbar-toggle=".rd-navbar-nav-wrap" class="rd-navbar-toggle"><span></span></button>
                            <div class="rd-navbar-brand"><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'index')); ?>" class="brand-name"><img class="img-responsive" src="<?php echo $this->webroot; ?>img/logo.jpg"></a></div>
                        </div>
                        <div class="rd-navbar-nav-wrap">

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
                                if($this->params['controller']=='Products' & $this->params['action']=='view'){
                                    $active_menu = $this->Custom->getCustomFunctionSlug('producrgroup');
                                }
                                if($this->params['controller']=='categories' & $this->params['action']=='view'){
                                    $active_menu = $this->Custom->getCustomFunctionSlug('producrgroup');
                                }
                                if($this->params['controller']=='pages' & $this->params['action']=='service_details'){
                                    if($this->params['pass']['0']=='11'){
                                        $active_menu = "apparel-services";
                                    }
                                }
                                if($this->params['controller']=='companies' & $this->params['action']=='view'){
                                    $active_menu = 'about-us';
                                }

                            }

                            echo $this->Menu->generateMenu($menu_data['header'], $navbarbar_class = 'navbar-default', $dropdown_class = 'nav navbar-nav navbar-nav-custom', $enable_navbar = 0, $search = 0,$active_menu, $home_menu=1,$caret=""); ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>