<?php
App::uses('AppController', 'Controller');
/**
 * Careers Controller
 *
 * @property Career $Career
 * @property PaginatorComponent $Paginator
 */
class CareersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Career->recursive = 0;
		$this->set('careers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Career->exists($id)) {
			throw new NotFoundException(__('Invalid career'));
		}
		$options = array('conditions' => array('Career.' . $this->Career->primaryKey => $id));
		$this->set('career', $this->Career->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Career->create();
			if ($this->Career->save($this->request->data)) {
				$last_insert_id = $this->Career->getLastInsertID();
								$this->Session->setFlash(__('The career has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The career could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$positionApplies = $this->Career->PositionApply->find('list');
		$this->set(compact('positionApplies'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Career->exists($id)) {
			throw new NotFoundException(__('Invalid career'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Career->save($this->request->data)) {
				$this->Session->setFlash(__('The career has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The career could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Career.' . $this->Career->primaryKey => $id));
			$this->request->data = $this->Career->find('first', $options);
		}
		$positionApplies = $this->Career->PositionApply->find('list');
		$this->set(compact('positionApplies'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Career->id = $id;
		if (!$this->Career->exists()) {
			throw new NotFoundException(__('Invalid career'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Career->delete()) {
			$this->Session->setFlash(__('The career has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The career could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Career->recursive = 0;
		$this->set('careers', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Career->exists($id)) {
			throw new NotFoundException(__('Invalid career'));
		}
		$options = array('conditions' => array('Career.' . $this->Career->primaryKey => $id));
		$this->set('career', $this->Career->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->uploadValidFile('Career','file','img/frontend/Career/file');
			$this->Career->create();
			if ($this->Career->save($this->request->data)) {
				$last_insert_id = $this->Career->getLastInsertID();
								$this->Session->setFlash(__('The career has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The career could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$positionApplies = $this->Career->PositionApply->find('list');
		$this->set(compact('positionApplies'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Career->exists($id)) {
			throw new NotFoundException(__('Invalid career'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->uploadValidFile('Career','file','img/frontend/Career/file');
			if ($this->Career->save($this->request->data)) {
				$this->Session->setFlash(__('The career has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The career could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Career.' . $this->Career->primaryKey => $id));
			$this->request->data = $this->Career->find('first', $options);
		}
		$positionApplies = $this->Career->PositionApply->find('list');
		$this->set(compact('positionApplies'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Career->id = $id;
		if (!$this->Career->exists()) {
			throw new NotFoundException(__('Invalid career'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Career->delete()) {
			$this->Session->setFlash(__('The career has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The career could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
