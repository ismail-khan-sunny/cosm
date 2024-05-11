<?php
App::uses('AppController', 'Controller');
/**
 * Roles Controller
 *
 * @property Role $Role
 * @property PaginatorComponent $Paginator
 */
class RolesController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator');

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->Role->recursive = 0;
		$this->set('roles', $this->Paginator->paginate());
	}
	
	public function admin_permission($id = null) {
		if (!$this->Role->exists($id)) {
			throw new NotFoundException(__('Invalid role'));
		}
		
		$this->set('role_id',$id);
		$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
		$this->set('role', $this->Role->find('first', $options));
		
		$permission_array = ClassRegistry::init('Dominion')->find('all');
		$this->set('permission_array', $permission_array);
		
		
		
		$added_permission_array_options = array('fields' => array('Permission.*'));
		$db_added_permission_array = ClassRegistry::init('Permission')->find('all', $added_permission_array_options);
		
		$new_added_permission_array = array();
		if(!empty($db_added_permission_array)){
			foreach($db_added_permission_array as $added_permission){
				$new_added_permission_array[] = $added_permission['Permission']['role_id'].'_'.$added_permission['Permission']['dominion_id'].'_'.$added_permission['Permission']['process_id'];
			}	
		}		
		$this->set('added_permission_array', $new_added_permission_array);		
		
	}
	
	public function admin_setpermission(){
		$result = array();
		$data['Permission'] = $this->request->data;
		
		
		$options = array('conditions' => array(
				'Permission.role_id'=>$data['Permission']['role_id'],
				'Permission.dominion_id'=>$data['Permission']['dominion_id'],
				'Permission.process_id'=>$data['Permission']['process_id'],
				
			));
		
		$foundData = ClassRegistry::init('Permission')->find('first', $options);
		if(empty($foundData)){
			if(ClassRegistry::init('Permission')->save($data)){
				$result['success'] = true;
				$result['msg'] = "Successfully Save";
			}else{
				$result['success'] = false;
				$result['msg'] = "Data Not Save";
			}
		}else{
			if($data['Permission']['actionType'] == 'delete'){
				if(ClassRegistry::init('Permission')->delete($foundData['Permission']['id'])){
					$result['success'] = true;
					$result['msg'] = "Successfully Delete";
				}else{
					$result['success'] = false;
					$result['msg'] = "Data Cannot Delete";
				}
			}else{
				$result['success'] = false;
				$result['msg'] = "Data Already Save";
			}
		}
		echo json_encode($result);
		exit;
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Role->exists($id)) {
			throw new NotFoundException(__('Invalid role'));
		}
		$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
		$this->set('role', $this->Role->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Role->create();
			if ($this->Role->save($this->request->data)) {
				$last_insert_id = $this->Role->getLastInsertID();
				$this->Session->setFlash(__('The role has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The role could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->Role->exists($id)) {
			throw new NotFoundException(__('Invalid role'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Role->save($this->request->data)) {
				$this->Session->setFlash(__('The role has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The role could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
			$this->request->data = $this->Role->find('first', $options);
		}
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->Role->id = $id;
		if (!$this->Role->exists()) {
			throw new NotFoundException(__('Invalid role'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Role->delete()) {
			$this->Session->setFlash(__('The role has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The role could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
