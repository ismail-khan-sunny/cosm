<?php
App::uses('AppController', 'Controller');
/**
 * Photos Controller
 *
 * @property Photo $Photo
 * @property PaginatorComponent $Paginator
 */
class PhotosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','ImageUploader');

/**
 * index method
 *
 * @return void
 */
	public function admin_index($album_id = null,$album_title = null) {

		if($album_id==null){
			$this->redirect(array('controller'=>'PhotoGalleries','action'=>'index'));
			}else{
				$this->paginate = array(
					'conditions'=>array('photo_gallery_id'=>$album_id),
					'order' =>'Photo.created desc',
					'limit' =>'3'
				);
				}
				
				
		$this->Photo->recursive = 0;
		$data = $this->paginate('Photo');
		$this->set('photos', $data);
		$this->set('album_id',$album_id);
		$this->set('album_title',$album_title);
	
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Photo->exists($id)) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
		$this->set('photo', $this->Photo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add($album_id = null,$album_title = null) {
	
		if ($this->request->is('post')) {
			$thumb_size = array(
				'width'=>150,
				'height'=>150
			);
			
			$this->uploadValidImage('Photo','image','img/frontend/album_photo',$thumb_size);
			$this->Photo->create();
			if ($this->Photo->save($this->request->data)) {
				$this->Session->setFlash(__('The Album Photo has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'),'default',array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index',$this->request->data['Photo']['photo_gallery_id'],$album_title));

			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
			}
		}
		$photoGalleries = $this->Photo->PhotoGallery->find('list');
		$this->set(compact('photoGalleries'));
		$this->set('album_id',$album_id);
		$this->set('album_title',$album_title);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null,$album_id = null,$album_title = null) {
		if (!$this->Photo->exists($id)) {
			throw new NotFoundException(__('Invalid photo'));
		}
				
		if ($this->request->is(array('post', 'put'))) {
			
			$thumb_size = array(
				'width'=>150,
				'height'=>150
			);
			
			$this->uploadValidImage('Photo','image','img/frontend/album_photo',$thumb_size);			
			
			if ($this->Photo->save($this->request->data)) {
				$this->Session->setFlash(__('The Album Photo has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'),'default',array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index',$this->request->data['Photo']['photo_gallery_id'],$album_title));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
			$this->request->data = $this->Photo->find('first', $options);
		}
		$photoGalleries = $this->Photo->PhotoGallery->find('list');
		$this->set(compact('photoGalleries'));
		$this->set('album_title',$album_title);
		$this->set('photo_id',$id);
		$this->set('album_id',$album_id);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Photo->id = $id;
		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Invalid photo'));
		}
		
		$data = $this->Photo->find(
			'all',
				array(
					'conditions'=>array('Photo.id'=>$id),
					'recursive'=>-1
				)
			
		);
		
		
		if(file_exists(WWW_ROOT.$data[0]['Photo']['image'])){
			$path = WWW_ROOT.$data[0]['Photo']['image'];
			unlink($path);
		}

		$img_path = str_replace("/thumb", "", $data[0]['Photo']['image']);
		if(file_exists(WWW_ROOT.$img_path)){
			unlink(WWW_ROOT.$img_path);
		}			
		
		
		$this->request->onlyAllow('post', 'delete');
		if ($this->Photo->delete()) {
				$this->Session->setFlash(__('The Photo has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'),'default',array('class'=>'alert alert-danger'));
				return $this->redirect(array('action' => 'index'));	

		} else {
			$this->Session->setFlash(__('The photo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
