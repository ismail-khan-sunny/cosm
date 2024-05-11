<?php
App::uses('AppController', 'Controller');
/**
 * Achievements Controller
 *
 * @property Achievement $Achievement
 * @property PaginatorComponent $Paginator
 */
class AchievementsController extends AppController {

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
		$this->Achievement->recursive = 0;
		$this->set('achievements', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Achievement->exists($id)) {
			throw new NotFoundException(__('Invalid achievement'));
		}
		$options = array('conditions' => array('Achievement.' . $this->Achievement->primaryKey => $id));
		$this->set('achievement', $this->Achievement->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Achievement->create();
			if ($this->Achievement->save($this->request->data)) {
				$last_insert_id = $this->Achievement->getLastInsertID();
								$this->Session->setFlash(__('The achievement has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The achievement could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Achievement->exists($id)) {
			throw new NotFoundException(__('Invalid achievement'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Achievement->save($this->request->data)) {
				$this->Session->setFlash(__('The achievement has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The achievement could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Achievement.' . $this->Achievement->primaryKey => $id));
			$this->request->data = $this->Achievement->find('first', $options);
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
		$this->Achievement->id = $id;
		if (!$this->Achievement->exists()) {
			throw new NotFoundException(__('Invalid achievement'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Achievement->delete()) {
			$this->Session->setFlash(__('The achievement has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The achievement could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Achievement->recursive = 0;
		$this->set('achievements', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Achievement->exists($id)) {
			throw new NotFoundException(__('Invalid achievement'));
		}
		$options = array('conditions' => array('Achievement.' . $this->Achievement->primaryKey => $id));
		$this->set('achievement', $this->Achievement->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Achievement->create();
			if ($this->Achievement->save($this->request->data)) {
				$last_insert_id = $this->Achievement->getLastInsertID();
								$this->Session->setFlash(__('The achievement has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The achievement could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Achievement->exists($id)) {
			throw new NotFoundException(__('Invalid achievement'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Achievement->save($this->request->data)) {
				$this->Session->setFlash(__('The achievement has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The achievement could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Achievement.' . $this->Achievement->primaryKey => $id));
			$this->request->data = $this->Achievement->find('first', $options);
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
		$this->Achievement->id = $id;
		if (!$this->Achievement->exists()) {
			throw new NotFoundException(__('Invalid achievement'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Achievement->delete()) {
			$this->Session->setFlash(__('The achievement has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The achievement could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
