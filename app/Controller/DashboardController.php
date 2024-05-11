<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('String', 'Utility');
class DashboardController extends AppController {
	public $helpers = array('Html','Crumb');
	public $uses = array();
	public $components = array("Paginator","RequestHandler","ImageUploader");
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow();	
		$this->set('logged_user',$this->Auth->user());
		$this->layout = 'admin';
	}
	
	public function admin_index(){
		$user = $this->Auth->user();
		$dashboard_menus = array('54cca9d2-8fb4-47f5-b371-0bf0f8defb25');
		ClassRegistry::init('AuthorizedMenu')->contain(array('Dominion','Process'));
		$dashboard_menu_datas = ClassRegistry::init('AuthorizedMenu')->find(
				'threaded',
				array(
						'recursive'=>-1,
						'conditions'=>array(
								'AuthorizedMenu.status' => 'Active',
								'AuthorizedMenu.role_id' => $user['role_id'],
								'AuthorizedMenu.parent_id' => $dashboard_menus,
						),
						'order'=>array('AuthorizedMenu.position ASC')
				)
		);
				
		
		
		$dashboard_datas = array();
		foreach($dashboard_menu_datas as $data){
			$model = Inflector::singularize($data['Dominion']['name']);
			$totaldata = ClassRegistry::init($model)->find('count');
			$dashboard_datas[] = array(
				'name'=>$data['AuthorizedMenu']['name'],
				'controller'=>$data['Dominion']['name'],
				'action'=>$data['Process']['name'],
				'icon'=>$data['AuthorizedMenu']['icon'],
				'total_data'=>$totaldata,
			);
		}
		
		$this->set('title_for_layout','Dashboard');	
		$this->set('dashboard_datas',$dashboard_datas);	
	}
	
}
?>
