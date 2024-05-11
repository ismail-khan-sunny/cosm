<?php
App::uses('AppController', 'Controller');
/**
 * RelatedLinks Controller
 *
 * @property RelatedLink $RelatedLink
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 */
class RelatedLinksController extends AppController {

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
		$this->RelatedLink->recursive = 0;
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
				'order'=>'RelatedLink.id DESC'
		);
		$data = $this->paginate('RelatedLink');
		$this->set('relatedLinks',$data);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->RelatedLink->exists($id)) {
			throw new NotFoundException(__('Invalid related link'));
		}
		$options = array('conditions' => array('RelatedLink.' . $this->RelatedLink->primaryKey => $id));
		$this->set('relatedLink', $this->RelatedLink->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->uploadValidImage('RelatedLink','image','img/frontend/relatedlink',array('width'=>'20','height'=>'20'));
			$this->RelatedLink->create();
			if ($this->RelatedLink->save($this->request->data)) {
				$last_insert_id = $this->RelatedLink->getLastInsertID();
				$this->Session->setFlash(__('The related link has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The related link could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->RelatedLink->exists($id)) {
			throw new NotFoundException(__('Invalid related link'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->uploadValidImage('RelatedLink','image','img/frontend/relatedlink',array('width'=>'20','height'=>'20'));
			if ($this->RelatedLink->save($this->request->data)) {
				$this->Session->setFlash(__('The related link has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The related link could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('RelatedLink.' . $this->RelatedLink->primaryKey => $id));
			$this->request->data = $this->RelatedLink->find('first', $options);
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
		$this->RelatedLink->id = $id;
		
		
		if (!$this->RelatedLink->exists()) {
		throw new NotFoundException(__('Invalid RelatedLink'));
		}
		$data = $this->RelatedLink->find(
			'all',
				array(
					'conditions'=>array('RelatedLink.id'=>$id),
					'recursive'=>-1
				)
			
		);
		
		
		if(file_exists(WWW_ROOT.$data[0]['RelatedLink']['image'])){
			$path = WWW_ROOT.$data[0]['RelatedLink']['image'];
			unlink($path);
		}

		$img_path = str_replace("/thumb", "", $data[0]['RelatedLink']['image']);
		if(file_exists(WWW_ROOT.$img_path)){
			unlink(WWW_ROOT.$img_path);
		}
		
		$this->request->onlyAllow('post', 'delete');
	if ($this->RelatedLink->delete()) {	
				$this->Session->setFlash(__('The Album has been deleted.'),'alert_success');
				return $this->redirect(array('action' => 'index'));	

		} else {
			$this->Session->setFlash(__('The photo gallery could not be deleted. Please, try again.'),'alert_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function admin_delete_image(){
		$this->layout = false;
		if($this->request->is('post')){
			$data = $this->request->data;
			$id = $data['contentid'];
			$this->RelatedLink->deleteRelatedImage($id);
		}
		exit;
	}
}
