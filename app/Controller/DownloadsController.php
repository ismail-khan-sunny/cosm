<?php
App::uses('AppController', 'Controller');
/**
 * Downloads Controller
 *
 * @property Download $Download
 * @property PaginatorComponent $Paginator
 */
class DownloadsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');
	public $helpers = array('Text','News');
	public $newstype = array('Content'=>'Content','File'=>'File');
/**
 * index method
 *
 * @return void
 */
public function beforeFilter(){
		$this->set('newstype',$this->newstype);
		parent::beforeFilter();
	}
	public function index() {
		$this->Download->recursive = 0;
		$this->set('downloads', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Download->exists($id)) {
			throw new NotFoundException(__('Invalid download'));
		}
		$options = array('conditions' => array('Download.' . $this->Download->primaryKey => $id));
		$this->set('download', $this->Download->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Download->create();
			if ($this->Download->save($this->request->data)) {
				$last_insert_id = $this->Download->getLastInsertID();
								$this->Session->setFlash(__('The download has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The download could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Download->exists($id)) {
			throw new NotFoundException(__('Invalid download'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Download->save($this->request->data)) {
				$this->Session->setFlash(__('The download has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The download could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Download.' . $this->Download->primaryKey => $id));
			$this->request->data = $this->Download->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Download->id = $id;
		if (!$this->Download->exists()) {
			throw new NotFoundException(__('Invalid download'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Download->delete()) {
			$this->Session->setFlash(__('The download has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The download could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Download->recursive = 0;
		$this->set('downloads', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Download->exists($id)) {
			throw new NotFoundException(__('Invalid download'));
		}
		$options = array('conditions' => array('Download.' . $this->Download->primaryKey => $id));
		$this->set('download', $this->Download->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
		
			$this->uploadValidFile('Download','file','files/frontend/download');
			$this->Download->create();
			if ($this->Download->save($this->request->data)) {
				$last_insert_id = $this->Download->getLastInsertID();
								$this->Session->setFlash(__('The download has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The download could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Download->exists($id)) {
			throw new NotFoundException(__('Invalid download'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->uploadValidFile('Download','file','files/frontend/download');
			
			if ($this->Download->save($this->request->data)) {
				$this->Session->setFlash(__('The download has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The download could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Download.' . $this->Download->primaryKey => $id));
			$this->request->data = $this->Download->find('first', $options);
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
		$this->Download->id = $id;
		if (!$this->Download->exists()) {
			throw new NotFoundException(__('Invalid download'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Download->delete()) {
			$this->Session->setFlash(__('The download has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The download could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
