<?php
App::uses('AppModel', 'Model');
/**
 * Permission Model
 *
 * @property Role $Role
 * @property Dominion $Dominion
 * @property Process $Process
 */
class Permission extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
	public $actsAs = array('Containable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Dominion' => array(
			'className' => 'Dominion',
			'foreignKey' => 'dominion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Process' => array(
			'className' => 'Process',
			'foreignKey' => 'process_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function arrangeData($datas){
		
		$results = array();
		if(!empty($datas)){
			$role_id = $datas['Permission']['role_id'];
			unset($datas['Permission']['role_id']);
			
			foreach($datas['Permission'] as $data){
				$results = $this->processPermissionData($role_id,$data,$results);
			}
		}
		return $results;
	}
	
	function processPermissionData($role_id=null,$data,$results){

		if(!empty($data)){
			
			$dominion_id = $data['Dominion']['dominion_id'];
			unset($data['Dominion']['dominion_id']);
			
			foreach($data['Dominion']['process'] as $process){

				if($process['process_id']!=0){
					
					if(array_key_exists('id', $process)){
						$results[]['Permission'] = array(
							'id'=>$process['id'],
							'role_id'=>$role_id,
							'dominion_id'=>$dominion_id,
							'process_id'=>$process['process_id']
						);
					}else{
						$results[]['Permission'] = array(
							'role_id'=>$role_id,
							'dominion_id'=>$dominion_id,
							'process_id'=>$process['process_id']
						);
					}
					
				}
			}
			
		}
		return $results;
	}
	
	protected function generatePermissionList($role_id = null){
		$permission_list = array();
		$options = array(
				'conditions'=>array(
						'Permission.role_id'=>$role_id
				)
		);
		$db_permission_data = $this->find('all',$options);
		pr($db_permission_data);
		exit;
		
		if($db_permission_data){
			foreach ($db_permission_data as $key => $value) {
				$permission_list[] = strtolower($value['Dominion']['name'].'_'.$value['Process']['name']);
			}
			
		}
		return $permission_list;
	}
	

}
