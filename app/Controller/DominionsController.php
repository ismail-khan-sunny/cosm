<?php
App::uses('AppController', 'Controller');
/**
 * Dominions Controller
 *
 * @property Dominion $Dominion
 * @property PaginatorComponent $Paginator
 */
class DominionsController extends AppController { //Dominions

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator');

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->Dominion->recursive = 1;
		$this->set('dominions', $this->Paginator->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Dominion->exists($id)) {
			throw new NotFoundException(__('Invalid dominion'));
		}
		$options = array('conditions' => array('Dominion.' . $this->Dominion->primaryKey => $id));
		$this->set('dominion', $this->Dominion->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Dominion->create();
			$process = explode(',',$this->request->data['Process']['name']);
			$datas = array();
			foreach($process as $proces){
				$datas[] = array('name'=>$proces);
			}
			$this->request->data['Process']=$datas;
			
			if ($this->Dominion->saveAssociated($this->request->data)) {
				$last_insert_id = $this->Dominion->getLastInsertID();
				$this->Session->setFlash(__('The dominion has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The dominion could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Dominion->exists($id)) {
			throw new NotFoundException(__('Invalid dominion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if(!empty($this->request->data['More']['actionname'])){
				$process = explode(',',$this->request->data['More']['actionname']);
				foreach($process as $proces){
					$this->request->data['Process'][] = array('name'=>$proces);
				}
			}
			unset($this->request->data['More']);
			
			if ($this->Dominion->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The dominion has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The dominion could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Dominion.' . $this->Dominion->primaryKey => $id));
			$this->request->data = $this->Dominion->find('first', $options);
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
		$this->Dominion->id = $id;
		if (!$this->Dominion->exists()) {
			throw new NotFoundException(__('Invalid dominion'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Dominion->delete()) {
			$this->Session->setFlash(__('The dominion has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The dominion could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	
}
