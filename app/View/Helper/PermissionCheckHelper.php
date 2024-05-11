<?php
App::uses('AppHelper', 'View/Helper');
class PermissionCheckHelper extends AppHelper {

	public $helpers = array('Html', 'Form','Session');

	public function checkPermission($user_info = null, $controller='',$action = ''){
		$permission_list = array();
		
		if(isset($user_info['Role']['id'])){
			if($this->Session->read('permission_list')){
				$permission_list = $this->Session->read('permission_list'); //set permission_list to session for checking access any place
			}else {
				$permission_list = $this->generatePermissionList($user_info['Role']['id']);
				$this->Session->write('permission_list', $permission_list);
			}				
			if(isset($user_info['Role']['name']) and (strtolower($user_info['Role']['name']) == 'admin')){
				return true;
			}else {
				$check_all = strtolower($controller.'_all');
				$check_action = strtolower($controller.'_'.$action);
				if(in_array($check_all,$permission_list)){
					return true;
				}elseif(in_array($check_action,$permission_list)){
					return true;
				}else{
					return false;
				}
			}
		}
	}
	
	protected function generatePermissionList($role_id = null){
		$permission_list = array();
		$options = array(
				'conditions'=>array(
						'Permission.role_id'=>$role_id
				)
		);
		$db_permission_data = ClassRegistry::init('Permission')->find('all',$options);
	
		if($db_permission_data){
			foreach ($db_permission_data as $key => $value) {
				$permission_list[] = strtolower($value['Dominion']['name'].'_'.$value['Process']['name']);
			}
		}
		return $permission_list;
	}
}
