<?php
App::uses('AppController', 'Controller');
/**
 * Notices Controller
 *
 * @property Notice $Notice
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 */
class NoticesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Text');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Notice->recursive = 0;
		$conditions = array();
		if($this->request->is('post')){
			$searchdata = $this->request->data;
		}
		
		$this->paginate = array(
				'limit'=>10,
				'conditions'=>$conditions,
				'order'=>'Notice.created DESC'
		);
		
		$this->set('notices', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Notice->exists($id)) {
			throw new NotFoundException(__('Invalid notice'));
		}
		$options = array('conditions' => array('Notice.' . $this->Notice->primaryKey => $id));
		$this->set('notice', $this->Notice->find('first', $options));
	}
	public function admin_admission_index() {
		$this->Notice->recursive = 0;
		$conditions = array();
		if($this->request->is('post')){
			$searchdata = $this->request->data;
			

			if(!empty($searchdata['Search']['category'])){
				
				$conditions[] = array("NOT" => array("Notice.category" =>'Admission'),array('Notice.category'=>$searchdata['Search']['category']),array("Notice.status" =>'active'));
			}

			if(!empty($searchdata['Search']['fieldname']) & !empty($searchdata['Search']['value'])){

				
			
			$conditions[] = array(array("Notice.category" =>'Admission'),array($searchdata['Search']['fieldname'].' LIKE'=>'%'.$searchdata['Search']['value'].'%'));

			}
		}
		if(empty($conditions))
		{
			$conditions=array(array("Notice.status" =>'active'),array("Notice.category" =>'Admission'));
		}
		$this->paginate = array(
				'limit'=>10,
				'conditions'=>$conditions,
				'order'=>'Notice.created DESC'
		);
		
		$this->set('notices', $this->Paginator->paginate());
	}
public function admin_admission_view($id = null) {
		if (!$this->Notice->exists($id)) {
			throw new NotFoundException(__('Invalid notice'));
		}
		$options = array('conditions' => array('Notice.' . $this->Notice->primaryKey => $id));
		$this->set('notice', $this->Notice->find('first', $options));
	}
/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->uploadValidImage('Notice','image','img/frontend/notice');
			$this->Notice->create();
			if ($this->Notice->save($this->request->data)) {
				$last_insert_id = $this->Notice->getLastInsertID();
								$this->Session->setFlash(__('The notice has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The notice could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}
	public function admin_admission_add() {
		
		if ($this->request->is('post')) {

			$this->uploadValidImage('Notice','image','img/frontend/notice');
			$this->Notice->create();
			if ($this->Notice->save($this->request->data)) {
				$last_insert_id = $this->Notice->getLastInsertID();
								$this->Session->setFlash(__('The admission has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'admin_admission_view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The admission could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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

public function admin_admission_edit($id = null) {
		if (!$this->Notice->exists($id)) {
			throw new NotFoundException(__('Invalid notice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->uploadValidImage('Notice','image','img/frontend/notice');
			if ($this->Notice->save($this->request->data)) {
				$this->Session->setFlash(__('The admission has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'admin_admission_view',$id));
			} else {
				$this->Session->setFlash(__('The admission could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Notice.' . $this->Notice->primaryKey => $id));
			$this->request->data = $this->Notice->find('first', $options);
		}
	}
	public function admin_edit($id = null) {
		if (!$this->Notice->exists($id)) {
			throw new NotFoundException(__('Invalid notice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->uploadValidImage('Notice','image','img/frontend/notice');
			if ($this->Notice->save($this->request->data)) {
				$this->Session->setFlash(__('The notice has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The notice could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Notice.' . $this->Notice->primaryKey => $id));
			$this->request->data = $this->Notice->find('first', $options);
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
		$this->Notice->id = $id;
		if (!$this->Notice->exists()) {
			throw new NotFoundException(__('Invalid notice'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Notice->delete()) {
			$this->Session->setFlash(__('The notice has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The notice could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function admin_admission_delete($id = null) {
		$this->Notice->id = $id;
		if (!$this->Notice->exists()) {
			throw new NotFoundException(__('Invalid notice'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Notice->delete()) {
			$this->Session->setFlash(__('The admission has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The admission could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'admission_index'));
	}
	
	public function admin_delete_image(){
		$this->layout = false;
		if($this->request->is('post')){
			$data = $this->request->data;
			$id = $data['id'];
			$this->Notice->deleteContentImage($id);
		}
		exit;
	}
}
