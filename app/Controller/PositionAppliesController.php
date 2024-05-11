<?php
App::uses('AppController', 'Controller');
/**
 * PositionApplies Controller
 *
 * @property PositionApply $PositionApply
 * @property PaginatorComponent $Paginator
 */
class PositionAppliesController extends AppController {

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
		$this->PositionApply->recursive = 0;
		$this->set('positionApplies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PositionApply->exists($id)) {
			throw new NotFoundException(__('Invalid position apply'));
		}
		$options = array('conditions' => array('PositionApply.' . $this->PositionApply->primaryKey => $id));
		$this->set('positionApply', $this->PositionApply->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PositionApply->create();
			if ($this->PositionApply->save($this->request->data)) {
				$last_insert_id = $this->PositionApply->getLastInsertID();
								$this->Session->setFlash(__('The position apply has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The position apply could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->PositionApply->exists($id)) {
			throw new NotFoundException(__('Invalid position apply'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PositionApply->save($this->request->data)) {
				$this->Session->setFlash(__('The position apply has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The position apply could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('PositionApply.' . $this->PositionApply->primaryKey => $id));
			$this->request->data = $this->PositionApply->find('first', $options);
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
		$this->PositionApply->id = $id;
		if (!$this->PositionApply->exists()) {
			throw new NotFoundException(__('Invalid position apply'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PositionApply->delete()) {
			$this->Session->setFlash(__('The position apply has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The position apply could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PositionApply->recursive = 0;
		$this->set('positionApplies', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PositionApply->exists($id)) {
			throw new NotFoundException(__('Invalid position apply'));
		}
		$options = array('conditions' => array('PositionApply.' . $this->PositionApply->primaryKey => $id));
		$this->set('positionApply', $this->PositionApply->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PositionApply->create();
			if ($this->PositionApply->save($this->request->data)) {
				$last_insert_id = $this->PositionApply->getLastInsertID();
								$this->Session->setFlash(__('The position apply has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The position apply could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->PositionApply->exists($id)) {
			throw new NotFoundException(__('Invalid position apply'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PositionApply->save($this->request->data)) {
				$this->Session->setFlash(__('The position apply has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The position apply could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('PositionApply.' . $this->PositionApply->primaryKey => $id));
			$this->request->data = $this->PositionApply->find('first', $options);
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
		$this->PositionApply->id = $id;
		if (!$this->PositionApply->exists()) {
			throw new NotFoundException(__('Invalid position apply'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PositionApply->delete()) {
			$this->Session->setFlash(__('The position apply has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The position apply could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
