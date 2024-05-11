<?php
App::uses('AppController', 'Controller');
/**
 * Permissions Controller
 *
 * @property Permission $Permission
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 */
class PermissionsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Text','Custom');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');
	
	
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Permission->recursive = 0;
		$this->paginate = array(
			'group'=>array('Permission.role_id')
		);
		
		$permissions = $this->Paginator->paginate();
		
		
		
		$this->set('permissions', $permissions);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($role_id = null) {
		$options = array('contain'=>false,'conditions' => array('Permission.role_id'=> $role_id));
		$results= $this->Permission->find('all', $options);
		
		$roles = $this->Permission->Role->find('list');
		$dominions = $this->Permission->Dominion->find(
			'all',
			array(
				'contain'=>array('Process')
			)
		);
		$processes = $this->Permission->Process->find('list');
		$this->set(compact('roles', 'dominions', 'processes'));
		
		$this->set('role_id',$role_id);
		$this->set('results',$results);
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			
			$data = $this->Permission->arrangeData($this->request->data);
			
			$this->Permission->create();
			if ($this->Permission->saveAll($data)) {
				$last_insert_id = $this->Permission->getLastInsertID();
								$this->Session->setFlash(__('The permission has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The permission could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$roles = $this->Permission->Role->find('list');
		$dominions = $this->Permission->Dominion->find(
			'all',
			array(
				'contain'=>array('Process')
			)
		);
		//$processes = $this->Permission->Process->find('list');
		$this->set(compact('roles', 'dominions', 'processes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($role_id = null) {
		
		if ($this->request->is(array('post', 'put'))) {
			$data = $this->Permission->arrangeData($this->request->data);
			$this->Permission->deleteAll(array('Permission.role_id'=>$role_id));
			if ($this->Permission->saveAll($data)) {
				$this->Session->setFlash(__('The permission has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$role_id));
			} else {
				$this->Session->setFlash(__('The permission could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('contain'=>false,'conditions' => array('Permission.role_id'=> $role_id));
			$this->request->data = $this->Permission->find('all', $options);
			
			$this->set('role_id',$role_id);

		}
		$roles = $this->Permission->Role->find('list');
		$dominions = $this->Permission->Dominion->find(
			'all',
			array(
				'contain'=>array('Process')
			)
		);
		$processes = $this->Permission->Process->find('list');
		$this->set(compact('roles', 'dominions', 'processes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($role_id = null) {

		$this->request->onlyAllow('post', 'delete');
		if ($this->Permission->deleteAll(array('Permission.role_id'=>$role_id))) {
			$this->Session->setFlash(__('The permission has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The permission could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
