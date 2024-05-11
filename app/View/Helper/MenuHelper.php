<?php
App::uses('AppHelper', 'View/Helper');
 App::import('Model', 'Department');
class MenuHelper extends AppHelper {

	public $helpers = array('Html', 'Form');

	public function generateMenu($threaded, $navbarbar_class = 'navbar-defaults', $dropdown_class = 'nav navbar-navs', $enable_navbar = 0, $search = 0,$active_menu = '', $home_menu=1,$caret=null,$menu=null) {

		if (sizeof($threaded) > 0) {			
			$html = '';

			
			$homeActive = '';
			$asd = '';
			if($active_menu ==''){
				$homeActive = 'active';
				$asd="active";

			}
			if(!($menu=="2")){
				
				 $html .= "<ul class='rd-navbar-nav'>";
				
			}
			else
			{
			 $html .= "<ul class='rd-navbar-dropdown'>";


			}
			if($home_menu){
				$html .= '<li class="'.$homeActive.'">';

				$html .= $this->Html->link('Home',array('controller'=>'pages', 'action'=>'index', 'admin'=>false),array('class'=>$homeActive));
				
				$html .= '</li>';
			}
			
			foreach ($threaded as $key => $node) {
		
		
				if(!empty($active_menu) and ($node['Menu']['slug'] == $active_menu)){
					$active_class = 'active';
					$asd="color:#000";

				}else {
					$active_class = '';
					$asd="";

				}	

				if (isset($node['children'][0])) {
					$html .= '<li class="'.$active_class.'">';
					$is_parent_menu = 1;
				} else {
					$html .= '<li class="'.$active_class.'">';
					$is_parent_menu = 0;
				}

				foreach ($node as $type => $threaded) {
					//pr($threaded['parent_id']);
					if ($type !== 'children') {
						
						
						$menutitle = $threaded['title'];

						if ($is_parent_menu == 0) {						
							if ($threaded['type'] == 'content') {
								if($threaded['parent_id']=='58bfd27b-39a4-4d7a-bdc7-1ec0f8defb25'){
									$html .= $this -> Html -> link("{$menutitle}", "/pages/service_view/{$threaded['slug']}", array("class" => " trigger {$active_class}"));
								}else{
									$html .= $this -> Html -> link("{$menutitle}", "/pages/content_details/{$threaded['slug']}", array("class" => " trigger {$active_class}"));
								}
							} elseif($threaded['type'] == 'external_link') {
								$external_url = $this->getExternalLink($threaded['url']);
								$html .= $this -> Html -> link("{$menutitle}", "{$external_url}", array("class" => " trigger {$active_class}"));								
							}elseif($threaded['type'] == 'file'){
								$html .= $this -> Html -> link("{$menutitle}", "{$threaded['file']}", array("class" => " trigger {$active_class}"));	
							}elseif($threaded['type'] == 'department'){
								$html .= $this -> Html -> link("{$menutitle}", "/departments/index/{$threaded['slug']}", array("class" => " trigger {$active_class}"));	
							}

						} else {
							if($threaded['id']=='58bfd27b-39a4-4d7a-bdc7-1ec0f8defb25'){
								$html .= $this -> Html -> link("{$menutitle}", "/pages/service_details/11", array("class" => "dropdown-toggle {$active_class}"));
							}else{
								$html .= $this -> Html -> link("{$menutitle}", "/pages/content_details/{$threaded['id']}", array("class" => "dropdown-toggle {$active_class}", "data-toggle" => "dropdown", "data-hover" => "dropdown", 'escape' => false));
							}
						
						}
					} else {
						if (!empty($threaded)) {
							$html .= $this -> generateMenu($threaded, '', 'dropdown-menu', 0, 0,$active_menu,$home_menu=0, '<span class="caret"></span>',$menu="2");
						}
					}
				}
				$html .= '</li>';
				//$html .= '<li class="divider"></li>';
			}

			
			$html .= '</ul>';

			if ($enable_navbar == 1) {
				$html .= '</div></div>';
			}
			return $html;
		} else {
			return FALSE;
		}
	}
	public function generateSitemap($threaded, $navbarbar_class = 'navbar-defaults', $dropdown_class = 'nav navbar-navs', $enable_navbar = 0, $search = 0,$active_menu = '', $home_menu=1,$caret=null,$menu=null) {

		if (sizeof($threaded) > 0) {			
			$html = '';
			if(!($menu=="2")){
				
				$html .= "<ul>";
				$carets="";
				
			}
			else
			{
				$html .= '<ul style="line-height:30px;margin-left:20px">';
			    $carets='<i class="fa fa-arrow-right" aria-hidden="true" style="padding-right:5px;"></i>';

			}
			
			if($home_menu){
				$html .= '<li>';
				$html .= $this->Html->link('Home',array('controller'=>'pages', 'action'=>'index', 'admin'=>false));
				
				$html .= '</li>';
			}
			foreach ($threaded as $key => $node) {
				$active_class = '';
				
				if (isset($node['children'][0])) {
					$html .= '<li class="'.$active_class.'">';
					$is_parent_menu = 1;
				} else {
					$html .= '<li>';
					$is_parent_menu = 0;
				}

				foreach ($node as $type => $threaded) {

					if ($type !== 'children') {
						
						
						$menutitle = $threaded['title'];

						if ($is_parent_menu == 0) {						
							if ($threaded['type'] == 'content') {
								$html .=$carets.$this -> Html -> link("{$menutitle}", "/pages/content_details/{$threaded['slug']}", array("class" => " trigger {$active_class}"));
							} elseif($threaded['type'] == 'external_link') {
								$external_url = $this->getExternalLink($threaded['url']);
								$html .= $carets.$this -> Html -> link("{$menutitle}", "{$external_url}", array("class" => " trigger {$active_class}"));								
							}elseif($threaded['type'] == 'file'){
								$html .= $carets.$this -> Html -> link("{$menutitle}", "{$threaded['file']}", array("class" => " trigger {$active_class}"));	
							}elseif($threaded['type'] == 'department'){
								$html .= $this -> Html -> link("{$carets} {$menutitle}", "/departments/index/{$threaded['slug']}", array("class" => " trigger {$active_class}"));	
							}

						} else {
							$html .= $this -> Html -> link("{$carets}{$menutitle}", "/pages/content_details/{$threaded['id']}", array("class" => "dropdown-toggle {$active_class}", "data-toggle" => "dropdown", "data-hover" => "dropdown", 'escape' => false));
						
						}
					} else {
						if (!empty($threaded)) {
							$html .= $this -> generateSitemap($threaded, '', 'dropdown-menu', 0, 0,$active_menu,$home_menu=0, '<span class="caret"></span>',"2");
						}
					}
				}
				$html .= '</li>';
				//$html .= '<li class="divider"></li>';
			}

			
			$html .= '</ul>';

			
			return $html;
		} else {
			return FALSE;
		}
	}

	public function getExternalLink($url){
        if(!empty($url)){
            if(!filter_var($url, FILTER_VALIDATE_URL)){
                $explodes = explode('/',$url);
                if(in_array('localhost',$explodes)){
                    $project_url = 'http://';
                }else{
                    $project_url = '';
                }
               
                foreach($explodes as $exp){
                    if(empty($exp)){
                        continue;
                    }else{
                        $project_url .='/'.$exp;
                    }
                }
                return $project_url;
            }else{
                return $url;
            }
        }
    }


public function generateMenuDept($threaded, $navbarbar_class = 'navbar-default', $dropdown_class = 'nav navbar-nav', $enable_navbar = 0, $search = 0,$active_menu = '', $home_menu=1,$caret=null) {
		if (sizeof($threaded) > 0) {			
			$html = '';
			if ($enable_navbar == 1) {
				$html .= "<nav class='navbar {$navbarbar_class}' role='navigation'>";
				$html .= '<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>';
				$html .= '</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">';
			}
			$homeActive = '';
			if($active_menu ==''){
				$homeActive = 'active';
			}

			$html .= "<ul class='{$dropdown_class}'>";

			if($home_menu){
				$html .= '<li class="'.$homeActive.'">';
				$html .= $this->Html->link('Home',array('controller'=>'pages', 'action'=>'index', 'admin'=>false));
				$html .= '</li>';
			}
			
			foreach ($threaded as $key => $node) {				
				if (isset($node['children'][0])) {
					$html .= '<li class="dropdown">';
					$is_parent_menu = 1;
				} else {
					$html .= '<li>';
					$is_parent_menu = 0;
				}

				foreach ($node as $type => $threaded) {
					if ($type !== 'children') {
						if(!empty($active_menu) and ($threaded['slug'] == $active_menu)){
							$active_class = 'active';
						}else {
							$active_class = '';
						}

						if ($is_parent_menu == 0) {						
							if ($threaded['type'] == 'content') {
								$html .= $this -> Html -> link("{$threaded['title']}", "/departments/content_details/{$threaded['slug']}", array("class" => " trigger {$active_class}"));
							} elseif($threaded['type'] == 'external_link') {
								$html .= $this -> Html -> link("{$threaded['title']}", "http://{$threaded['url']}", array("class" => " trigger {$active_class}"));								
							}elseif($threaded['type'] == 'file'){
								$html .= $this -> Html -> link("{$threaded['title']}", "{$threaded['image']}", array("class" => " trigger {$active_class}"));	
							}

						} else {
							$html .= $this -> Html -> link("{$threaded['title']} {$caret}", "/departments/content_details/{$threaded['id']}", array("class" => "dropdown-toggle", "data-toggle" => "dropdown", "data-hover" => "dropdown", 'escape' => false));
						}
					} else {
						if (!empty($threaded)) {
							$html .= $this -> generateMenuDept($threaded, '', 'dropdown-menu dropdown-menu-custom', 0, 0,$active_menu,$home_menu=0, '<i class="fa fa-caret-right"></i>');
						}
					}
				}
				$html .= '</li>';
				$html .= '<li class="divider"></li>';
			}
			$html .= '</ul>';
			if ($search == 1) {
				$html .= '<div class="search-widget hidden-xs hidden-sm">
				<div class="search">' . $this -> Form -> create('Search', array('id' => 'SearchContentDetailsForm', 'url' => array('controller' => 'pages', 'action' => 'search'))) . $this -> Form -> input('keyword', array('type' => 'text', 'div' => false, 'label' => false, 'placeholder' => 'Search', 'class' => 'search-query')) . $this -> Form -> end();

				$html .= '</div><a href="javascript:void(0)" onclick="submit_search_form()"><div class="social-box"><i class="mukam-search"></i></div></a>
				</div>';
			}
			if ($enable_navbar == 1) {
				$html .= '</div></div>';
			}
			return $html;
		} else {
			return FALSE;
		}
	}


	public function generateSortableMenu($threaded) {
		if (sizeof($threaded) > 0) {
			$html = '';

			$html .= '<ul class="custom-list-unstyled sortable">';
			foreach ($threaded as $key => $node) {
				$html .= '<li class="ui-state-default ">';
				$html .= "<input type='hidden' value='{$node['Menu']['id']}' name='order[]'>";
				foreach ($node as $type => $threaded) {
					if ($type !== 'children') {

						$html .= $threaded['title'];
					} else {
						if (!empty($threaded)) {
							$html .= $this -> generateSortableMenu($threaded);
						}
					}
				}
				$html .= '</li>';
			}
			$html .= '</ul>';
			return $html;
		} else {
			return 'No menu is found.';
		}
	}


	public function generateSidebarMenu($threaded, $navbarbar_class = 'navbar-default', $dropdown_class = 'nav navbar-nav', $enable_navbar = 1, $search = 1,$active_menu = '', $home_menu=1, $ajax_menu_class = 'ajax_page') {
		
		if (sizeof($threaded) > 0) {			
			$html = '';
			if ($enable_navbar == 1) {
				$html .= "<nav class='navbar {$navbarbar_class}' role='navigation'>";
				$html .= '<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>';
				$html .= '</div><div class="collapse navbar-collapse navbar-ex1-collapse">';
			}
			$homeActive = '';
			if($active_menu ==''){
				$homeActive = 'active';					
			}
			$html .= '<div class="widget side-menu-bar">';
			$html .= '<div class="widget-header "><h3> Sidebar</h3></div>';
			$html .= '<div class="widget-content">';
			$html .= "<ul class='{$dropdown_class}'>";

			if($home_menu){
				$html .= '<li class="'.$homeActive.'">';
				$html .= $this->Html->link('Home',array('controller'=>'pages', 'action'=>'index'),array('class'=>' '.$ajax_menu_class));
				$html .= '</li>';
			}

			foreach ($threaded as $key => $node) {
				if (isset($node['children'][0])) {
					$html .= '<li class="dropdown">';
					$is_parent_menu = 1;
				} else {
					$html .= '<li>';
					$is_parent_menu = 0;
				}

				foreach ($node as $type => $threaded) {
					if ($type !== 'children') {						
						if(!empty($active_menu) and ($threaded['slug'] == $active_menu)){
							$active_class = 'active';
						}else {
							$active_class = '';
						}
						$ajax_class = $ajax_menu_class;
						if($threaded['is_ajax_page'] == '0'){
							$ajax_class = '';
						}

						if ($is_parent_menu == 0) {
							if ($threaded['type'] != 'external_link') {
								$html .= $this -> Html -> link("{$threaded['title']}", "/details/{$threaded['slug']}", array("class" => " trigger {$active_class} {$ajax_class}"));
							} else {
								$html .= $this -> Html -> link("{$threaded['title']}", "http://{$threaded['url']}", array("class" => " trigger {$active_class} {$ajax_class}"));								
							}

						} else {
							$html .= $this -> Html -> link("{$threaded['title']}<b class='caret'></b>", "/details/{$threaded['id']}", array("class" => "dropdown-toggle", "data-toggle" => "dropdown", "data-hover" => "dropdown", 'escape' => false));
						}
					} else {
						if (!empty($threaded)) {
							$html .= $this -> generateMenu($threaded, '', 'dropdown-menu', 0, 0,$active_menu,$home_menu=0);
						}
					}
				}
				$html .= '</li>';
			}
			$html .= '</ul>';
			$html .= '</div>';
			$html .= '<div class="shadow-right-side-menu"></div>';
			$html .= '</div>';
			
			if ($search == 1) {
				$html .= '<div class="search-widget hidden-xs hidden-sm">
				<div class="search">' . $this -> Form -> create('Search', array('id' => 'SearchContentDetailsForm', 'url' => array('controller' => 'pages', 'action' => 'search'))) . $this -> Form -> input('keyword', array('type' => 'text', 'div' => false, 'label' => false, 'placeholder' => 'Search', 'class' => 'search-query')) . $this -> Form -> end();

				$html .= '</div><a href="javascript:void(0)" onclick="submit_search_form()"><div class="social-box"><i class="mukam-search"></i></div></a>
				</div>';
			}
			if ($enable_navbar == 1) {
				$html .= '</div></div>';
			}
			return $html;
		} else {
			return FALSE;
		}
	}
}
