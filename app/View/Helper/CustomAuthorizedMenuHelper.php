<?php
App::uses('AppHelper', 'View/Helper');
class CustomAuthorizedMenuHelper extends AppHelper {

	public $helpers = array('Html', 'Form','Session','Custom');

	public function generateAuthorizedMenu($threaded, $navbarbar_class = 'nav-primary hidden-xs', $dropdown_class = 'nav', $active_menu = '', $ajax_menu_class = '') {
		
		if (sizeof($threaded) > 0) {
			$html = '';			
			$html .= "<ul class='{$dropdown_class}'>";
				
			foreach ($threaded as $key => $node) {				
				$active_class = '';
				$treeview = '';
				if (isset($node['children'][0])) {
					$childrenIcon = '<i class="fa fa-angle-left pull-right"></i>';				
					$treeview = 'treeview';
				}else{
					$childrenIcon = '';
				}
				
				if ($node['Dominion']['name']) {
									
					if($this->Custom->canAccess($node['Dominion']['name'],$node['Process']['name'])){
						$child_active = '';
						if($this->params['controller']==$node['Dominion']['name'] || $this->parentController($this->params['controller'])==$node['Dominion']['name']){
							$child_active = 'active';
						}
						
						
						$html .= '<li class="'.$treeview.' '.$child_active.'">';
						$html .= '<a class="'.$ajax_menu_class.'" href="'.$this->Html->url(array('controller'=>$node['Dominion']['name'],'action'=>$node['Process']['name'],'prefix'=>'admin','admin'=>true)).'"  >'.$node['AuthorizedMenu']['icon'].' <span>'.$node['AuthorizedMenu']['name'].'</sapn>'.$childrenIcon.'</a>';
						if (isset($node['children'][0])) {
							$html .= $this -> generateAuthorizedMenu($node['children'], '', 'treeview-menu', $active_menu,$ajax_menu_class);
						}	
						$html .= '</li>';
					}
				} else {
					
					if (isset($node['children'][0])) {
						$controller_list = $this->controllerlist($node);
						
						$parent_active = '';
						if(in_array($this->params['controller'], $controller_list)){
							$parent_active = 'active';
						}
						$html .= '<li class="'.$treeview.' '.$parent_active.'">';
						$html .= '<a href="javascript:void(0)" >'.$node['AuthorizedMenu']['icon'].$childrenIcon.' <span>'.$node['AuthorizedMenu']['name'].'</sapn></a>';
						$html .= $this -> generateAuthorizedMenu($node['children'], '', 'treeview-menu', $active_menu,$ajax_menu_class);
						$html .= '</li>';
					}
					
				}
				
			}
			$html .= '</ul>';
			return $html;
		} else {
			return FALSE;
		}
	}

	public function controllerlist($menus){
		
		$controllerlist = array();
		foreach($menus['children'] as $menu){
			if(key_exists('Dominion', $menu)){
				$controllerlist[] = $menu['Dominion']['name'];
			}
		}
		
		if($menus['AuthorizedMenu']['name']=='Cms'){
			$controllerlist[] = 'Photos';
			$controllerlist[] = 'SliderContents';
			$controllerlist[] = 'ContentFiles';
		}
		
		return $controllerlist;
	}
	
	public function parentController($controllername){
		$controller = '';
		$controllerarray = array('SliderContents'=>'Sliders','Photos'=>'PhotoGalleries','ContentFiles'=>'Contents');
		if(key_exists($controllername, $controllerarray)){
			$controller = $controllerarray[$controllername];
		}
		return $controller;
	}
}