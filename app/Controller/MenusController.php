<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
class MenusController extends AppController {
	public $helpers = array('Js', 'Time');
	public $uses = array('Menu','Content');
	public $components = array('Paginator', 'RequestHandler','ImageUploader');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function admin_index() {
		//$this->Menu->recursive = 0;
		$logged_user = $this->Auth->user();
		$conditions = array();
		if($this->request->is('post')){
			$searchdata = $this->request->data;
			if(!empty($searchdata['Search']['fieldname']) & !empty($searchdata['Search']['value'])){
				$conditions[] = array($searchdata['Search']['fieldname'].' LIKE'=>'%'.$searchdata['Search']['value'].'%');
			}
		}
		
		$this->paginate = array(
			'conditions'=>array('Menu.status'=>'active'),
				'limit'=>15,
				'conditions'=>$conditions,
				'order'=>'Menu.created DESC'
		);	
		
		$data = $this->paginate('Menu');
		
		$this->set('menus',$data);
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
		$this->set('menu', $this->Menu->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$this->uploadValidFile('Menu','file','files/frontend/menu');
			$this->Menu->create();
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved.'), 'alert_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'), 'alert_error');
			}
		}

		
		$this->set('content_list',$this->get_content_list());		
		$this->set('menuList',$this->Menu->getMenuList()); // get Menu List
	}


	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$this->uploadValidFile('Menu','file','files/frontend/menu');
			
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved.'), 'alert_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'), 'alert_error');
			}
		} else {
			$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
			$this->request->data = $this->Menu->find('first', $options);
		}
		
		$this->set('content_list',$this->get_content_list());		
		$this->set('menuList',$this->Menu->getMenuList()); // get Menu List
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Menu->delete()) {
			$this->Session->delete('menu_data');
			$this->Session->setFlash(__('The menu has been deleted.'), 'alert_success');
		} else {
			$this->Session->setFlash(__('The menu could not be deleted. Please, try again.'), 'alert_error');
		}
		return $this->redirect(array('action' => 'index'));
	}

	private function get_contents(){
		return $this->Menu->PageMaker->find('list',
				array(
						'conditions' => array('status' => 'published')
				)
		);
	}

	private function get_pages(){
		return $this->Menu->PageMaker->find('list',
				array(
						'conditions' => array('status' => 'published')
				)
		);
	}


	
		private function get_content_list(){
		$logged_user = $this->Auth->user();	
		//pr($logged_user);exit;
		$data = $this->Content->find(
			'list',
			array(
				'fields' => array('id','title'),
				'conditions'=>array(
					'status'=>'Published'
				),
			)
		);
		
		return $data;
	}
	
}
