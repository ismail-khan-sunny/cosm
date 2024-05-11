<?php
App::uses('AppController', 'Controller');
/**
 * Processes Controller
 *
 * @property Process $Process
 * @property PaginatorComponent $Paginator
 */
class ProcessesController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator');
	
	/*public function beforeFilter(){
		$this->Auth->allow('');
	}*/

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->Process->recursive = 0;
		$this->set('processes', $this->Paginator->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Process->exists($id)) {
			throw new NotFoundException(__('Invalid process'));
		}
		$options = array('conditions' => array('Process.' . $this->Process->primaryKey => $id));
		$this->set('process', $this->Process->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add($dominion_id = null) {
		$this->set('dominion_id',$dominion_id);
		if($dominion_id){

		}
		if ($this->request->is('post')) {
			
			$process = explode(',',$this->request->data['Process']['name']);
			$datas = array();
			foreach($process as $preces){
				$datas[] = array(
					'Process'=>array(
						'name'=>$preces,
						'dominion_id'=>$this->request->data['Process']['dominion_id']
					)
				);	
			}
			
			$this->Process->create();
			if ($this->Process->saveMany($datas)) {
				$last_insert_id = $this->Process->getLastInsertID();
				$this->Session->setFlash(__('The process has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				//return $this->redirect(array('action' => 'view',$last_insert_id));
				return $this->redirect(array('controller'=>'Dominions', 'action' => 'view',$this->request->data['Process']['dominion_id']));
			} else {
				$this->Session->setFlash(__('The process could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$dominions = $this->Process->Dominion->find('list');
		$this->set(compact('dominions'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->Process->exists($id)) {
			throw new NotFoundException(__('Invalid process'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Process->save($this->request->data)) {
				$this->Session->setFlash(__('The process has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				//return $this->redirect(array('action' => 'view',$id));
				return $this->redirect(array('controller'=>'Dominions', 'action' => 'view',$this->request->data['Process']['dominion_id']));
			} else {
				$this->Session->setFlash(__('The process could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Process.' . $this->Process->primaryKey => $id));
			$this->request->data = $this->Process->find('first', $options);
		}
		$dominions = $this->Process->Dominion->find('list');
		$this->set(compact('dominions'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null, $dominion_id = null) {
		$this->Process->id = $id;
		if (!$this->Process->exists()) {
			throw new NotFoundException(__('Invalid process'));
		}
		$this->request->onlyAllow('post', 'delete');
				
		if ($this->Process->delete()) {
			$this->Session->setFlash(__('The process has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The process could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		if($dominion_id){
			return $this->redirect(array('controller'=>'Dominions', 'action' => 'view', $dominion_id));
		}
		return $this->redirect(array('controller'=>'Dominions','action' => 'view',$dominion_id));
	}
	
	public function get_process($dominion_id=null){
		$this->layout = false;
		$process = $this->Process->find('list',array('conditions'=>array('Process.dominion_id'=>$dominion_id)));
		$this->set('process',$process);
	}
}
