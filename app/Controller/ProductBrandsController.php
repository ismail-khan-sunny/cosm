<?php
App::uses('AppController', 'Controller');
/**
 * ProductBrands Controller
 *
 * @property ProductBrand $ProductBrand
 * @property PaginatorComponent $Paginator
 */
class ProductBrandsController extends AppController {

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
		$this->ProductBrand->recursive = 0;
		$this->set('productBrands', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProductBrand->exists($id)) {
			throw new NotFoundException(__('Invalid product brand'));
		}
		$options = array('conditions' => array('ProductBrand.' . $this->ProductBrand->primaryKey => $id));
		$this->set('productBrand', $this->ProductBrand->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductBrand->create();
			if ($this->ProductBrand->save($this->request->data)) {
				$last_insert_id = $this->ProductBrand->getLastInsertID();
								$this->Session->setFlash(__('The product brand has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The product brand could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$products = $this->ProductBrand->Product->find('list');
		$brands = $this->ProductBrand->Brand->find('list');
		$this->set(compact('products', 'brands'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProductBrand->exists($id)) {
			throw new NotFoundException(__('Invalid product brand'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductBrand->save($this->request->data)) {
				$this->Session->setFlash(__('The product brand has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The product brand could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('ProductBrand.' . $this->ProductBrand->primaryKey => $id));
			$this->request->data = $this->ProductBrand->find('first', $options);
		}
		$products = $this->ProductBrand->Product->find('list');
		$brands = $this->ProductBrand->Brand->find('list');
		$this->set(compact('products', 'brands'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProductBrand->id = $id;
		if (!$this->ProductBrand->exists()) {
			throw new NotFoundException(__('Invalid product brand'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProductBrand->delete()) {
			$this->Session->setFlash(__('The product brand has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The product brand could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ProductBrand->recursive = 0;
		$this->set('productBrands', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ProductBrand->exists($id)) {
			throw new NotFoundException(__('Invalid product brand'));
		}
		$options = array('conditions' => array('ProductBrand.' . $this->ProductBrand->primaryKey => $id));
		$this->set('productBrand', $this->ProductBrand->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProductBrand->create();
			if ($this->ProductBrand->save($this->request->data)) {
				$last_insert_id = $this->ProductBrand->getLastInsertID();
								$this->Session->setFlash(__('The product brand has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The product brand could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$products = $this->ProductBrand->Product->find('list');
		$brands = $this->ProductBrand->Brand->find('list');
		$this->set(compact('products', 'brands'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ProductBrand->exists($id)) {
			throw new NotFoundException(__('Invalid product brand'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductBrand->save($this->request->data)) {
				$this->Session->setFlash(__('The product brand has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The product brand could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('ProductBrand.' . $this->ProductBrand->primaryKey => $id));
			$this->request->data = $this->ProductBrand->find('first', $options);
		}
		$products = $this->ProductBrand->Product->find('list');
		$brands = $this->ProductBrand->Brand->find('list');
		$this->set(compact('products', 'brands'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ProductBrand->id = $id;
		if (!$this->ProductBrand->exists()) {
			throw new NotFoundException(__('Invalid product brand'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProductBrand->delete()) {
			$this->Session->setFlash(__('The product brand has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The product brand could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
