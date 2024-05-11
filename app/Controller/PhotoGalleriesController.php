<?php
App::uses('AppController', 'Controller');
/**
 * PhotoGalleries Controller
 *
 * @property PhotoGallery $PhotoGallery
 * @property PaginatorComponent $Paginator
 */
class PhotoGalleriesController extends AppController {

	public $components = array('Paginator','ImageUploader');
	public $uses = array('PhotoGallery','Department');
	
	
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$logged_user = $this->Auth->user();
		
		$this->paginate = array(
				'limit'=>10,
				'order'=>'PhotoGallery.created DESC'
		);	
		
		
		$data = $this->paginate('PhotoGallery');
		$this->set('photoGalleries', $data);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PhotoGallery->exists($id)) {
			throw new NotFoundException(__('Invalid photo gallery'));
		}
		$options = array('conditions' => array('PhotoGallery.' . $this->PhotoGallery->primaryKey => $id));
		$this->set('photoGallery', $this->PhotoGallery->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {

		if ($this->request->is('post')) {
			
			$thumb_size = array(
				'width'=>202,
				'height'=>129
			);
			
			$this->uploadValidImage('PhotoGallery','image','img/frontend/album',$thumb_size);			
			
			$this->PhotoGallery->create();
			if ($this->PhotoGallery->save($this->request->data)) {
				$this->Session->setFlash(__('The Photo Gallery has been saved.'),'alert_success');
				return $this->redirect(array('action' => 'index'));
				
			} else {
				$this->Session->setFlash(__('The photo gallery could not be saved. Please, try again.'),'alert_error');
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
	public function admin_edit($id = null) {

		if (!$this->PhotoGallery->exists($id)) {
			throw new NotFoundException(__('Invalid photo gallery'));
		}
		if ($this->request->is(array('post', 'put'))) {
		
			$thumb_size = array(
				'width'=>202,
				'height'=>129
			);
			
			$this->uploadValidImage('PhotoGallery','image','img/frontend/album',$thumb_size);			
			
			if ($this->PhotoGallery->save($this->request->data)) {
				$this->Session->setFlash(__('The Photo Gallery has been saved.'),'alert_success');
				return $this->redirect(array('action' => 'index'));


			} else {
				$this->Session->setFlash(__('The photo gallery could not be saved. Please, try again.'),'alert_error');
			}
		} else {
			$options = array('conditions' => array('PhotoGallery.' . $this->PhotoGallery->primaryKey => $id));
			$this->request->data = $this->PhotoGallery->find('first', $options);
		}
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->PhotoGallery->id = $id;
		if (!$this->PhotoGallery->exists()) {
			throw new NotFoundException(__('Invalid photo gallery'));
		}
		
		$data = $this->PhotoGallery->find(
			'all',
				array(
					'conditions'=>array('PhotoGallery.id'=>$id),
					'recursive'=>-1
				)
			
		);
		
		
		if(file_exists(WWW_ROOT.$data[0]['PhotoGallery']['image'])){
			$path = WWW_ROOT.$data[0]['PhotoGallery']['image'];
			unlink($path);
		}

		$img_path = str_replace("/thumb", "", $data[0]['PhotoGallery']['image']);
		if(file_exists(WWW_ROOT.$img_path)){
			unlink(WWW_ROOT.$img_path);
		}		
		
		$this->request->onlyAllow('post', 'delete');
		if ($this->PhotoGallery->delete()) {	
				$this->Session->setFlash(__('The Album has been deleted.'),'alert_success');
				return $this->redirect(array('action' => 'index'));	

		} else {
			$this->Session->setFlash(__('The photo gallery could not be deleted. Please, try again.'),'alert_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
