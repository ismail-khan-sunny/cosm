<?php
App::uses('AppController', 'Controller');

/**
 * AuthorizedMenus Controller
 *
 * @property AuthorizedMenu $AuthorizedMenu
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 */
class AuthorizedMenusController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Text');
	
	public $status = array('Draft'=>'Draft','Active'=>'Active');
	
	public $plugings = array('News'=>'News','Event'=>'Event','Jobs'=>'Jobs','NsRelatedLink'=>'NsRelatedLink');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');
	
	public function beforeFilter() {
		$this->set('logged_user', $this->Auth->user());
		$this->set('loggedIn', true);
		$this->set('status',$this->status);
		$this->set('plugings',$this->plugings);
	}
	
	
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AuthorizedMenu->recursive = 0;
		$conditions = array();
		if($this->request->is('post')){
			$role_id =$this->request->data['Search']['role_id'];
			$conditions[] = array('AuthorizedMenu.role_id'=>$role_id) ;
		}
		$this->paginate = array(
			'conditions'=>$conditions
		);
		$this->set('authorizedMenus', $this->Paginator->paginate());
		$this->set('roles', ClassRegistry::init('Role')->find('list'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->AuthorizedMenu->exists($id)) {
			throw new NotFoundException(__('Invalid authorized menu'));
		}
		$options = array('conditions' => array('AuthorizedMenu.' . $this->AuthorizedMenu->primaryKey => $id));
		$this->set('authorizedMenu', $this->AuthorizedMenu->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AuthorizedMenu->create();
			
			$data = $this->request->data;
			$data['AuthorizedMenu']['role_id'] = $this->AuthorizedMenu->getRoleArrayToString($data['AuthorizedMenu']['role_id']);
			
			if ($this->AuthorizedMenu->save($data)) {
				$last_insert_id = $this->AuthorizedMenu->getLastInsertID();
								$this->Session->setFlash(__('The authorized menu has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The authorized menu could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$roles = $this->AuthorizedMenu->Role->find('list');
		//$parentAuthorizedMenus = $this->AuthorizedMenu->ParentAuthorizedMenu->find('list');
		$parentAuthorizedMenus = $this->AuthorizedMenu->authorizedMenuList();
		$dominions = $this->AuthorizedMenu->Dominion->find('list');
		$processes = $this->AuthorizedMenu->Process->find('list');
		$this->set(compact('roles', 'parentAuthorizedMenus', 'dominions', 'processes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->AuthorizedMenu->exists($id)) {
			throw new NotFoundException(__('Invalid authorized menu'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$data = $this->request->data;
			$data['AuthorizedMenu']['role_id'] = $this->AuthorizedMenu->getRoleArrayToString($data['AuthorizedMenu']['role_id']);
			
			if ($this->AuthorizedMenu->save($data)) {
				$this->Session->setFlash(__('The authorized menu has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The authorized menu could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('AuthorizedMenu.' . $this->AuthorizedMenu->primaryKey => $id));
			$this->request->data = $this->AuthorizedMenu->find('first', $options);
		}
		$roles = $this->AuthorizedMenu->Role->find('list');
		$parentAuthorizedMenus = $this->AuthorizedMenu->ParentAuthorizedMenu->find('list');
		$dominions = $this->AuthorizedMenu->Dominion->find('list');
		$processes = $this->AuthorizedMenu->Process->find('list');
		$this->set(compact('roles', 'parentAuthorizedMenus', 'dominions', 'processes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->AuthorizedMenu->id = $id;
		if (!$this->AuthorizedMenu->exists()) {
			throw new NotFoundException(__('Invalid authorized menu'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AuthorizedMenu->delete()) {
			$this->Session->setFlash(__('The authorized menu has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The authorized menu could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	
	public function changeprocessselectoption(){
		$this->layout = 'ajax';
		if($this->request->is('post')){
			$data = $this->request->data;
			$processes = $this->AuthorizedMenu->Process->find('list',array('conditions'=>array('Process.dominion_id'=>$data['dominion_id'])));
			$this->set(compact('processes'));
		}
	}
}
