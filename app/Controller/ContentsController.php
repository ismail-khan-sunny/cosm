<?php
App::uses('AppController', 'Controller');
class ContentsController extends AppController {

	/**
	 * Helpers
	 *
	 * @var array
	 */
	public $helpers = array('Js', 'Time');

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'RequestHandler','Uploader','ImageUploader');
	public $uses = array('Content');
	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		//$this->Content->recursive = 0;

		$logged_user = $this->Auth->user();
		$conditions = array();
		if($this->request->is('post')){
			$searchdata = $this->request->data;
			
			if(!empty($searchdata['Search']['fieldname']) & !empty($searchdata['Search']['value'])){
				$conditions[] = array($searchdata['Search']['fieldname'].' LIKE'=>'%'.$searchdata['Search']['value'].'%');
			}
		}
		
		$this->paginate = array(
				'limit'=>10,
				'conditions'=>$conditions,
				'order'=>'Content.created DESC'
		);
		$data = $this->paginate('Content');
		$this->set('contents',$data);
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'));
		}
		$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
		$content = $this->Content->find('first', $options);
		
		$this->set('content', $content);
	}
	

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add($redirect=null) {
		if ($this->request->is('post')) {

			$this->uploadValidImage('Content','image','img/frontend/content');

			$this->Content->create();
			if ($this->Content->save($this->request->data)) {					
				$this->Session->setFlash(__('The content has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				if(!empty($redirect)){
					return $this->redirect($this->referer()); 
				}
				
				return $this->redirect(array('action' => 'index'));
			} else {					
				$this->Session->setFlash(__('The content could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$this->uploadValidImage('Content','image','img/frontend/content');

			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash(__('The content has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
			$this->request->data = $this->Content->find('first', $options);
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
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Content->delete()) {			
			$this->Session->setFlash(__('The content has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The content could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_delete_image(){
		$this->layout = false;
		if($this->request->is('post')){
			$data = $this->request->data;
			$id = $data['contentid'];
			$this->Content->deleteContentImage($id);
		}
		exit;
	}
}
