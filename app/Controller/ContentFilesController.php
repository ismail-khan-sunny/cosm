<?php
App::uses('AppController', 'Controller');
/**
 * ContentFiles Controller
 *
 * @property ContentFile $ContentFile
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 */
class ContentFilesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Time');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Acl','FileUploader');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index($content_id=null) {
		$this->ContentFile->recursive = 0;
		$this->paginate = array(
			'conditions'=>array('ContentFile.content_id'=>$content_id)
		);
		
		$this->set('contentFiles', $this->Paginator->paginate());
		$this->set('content_id',$content_id);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ContentFile->exists($id)) {
			throw new NotFoundException(__('Invalid content file'));
		}
		$options = array('conditions' => array('ContentFile.' . $this->ContentFile->primaryKey => $id));
		$this->set('contentFile', $this->ContentFile->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($content_id=null) {
		if ($this->request->is('post')) {
			$this->ContentFile->create();
			$data = $this->upload_file();
			if ($this->ContentFile->save($data)) {
				$last_insert_id = $this->ContentFile->getLastInsertID();
								$this->Session->setFlash(__('The content file has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The content file could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$contents = $this->ContentFile->Content->find('list');
		$this->set(compact('contents'));
		$this->set('content_id',$content_id);
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ContentFile->exists($id)) {
			throw new NotFoundException(__('Invalid content file'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$data = $this->upload_file();
			if ($this->ContentFile->save($data)) {
				$this->Session->setFlash(__('The content file has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The content file could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('ContentFile.' . $this->ContentFile->primaryKey => $id));
			$this->request->data = $this->ContentFile->find('first', $options);
		}
		$contents = $this->ContentFile->Content->find('list');
		$this->set(compact('contents'));
		$this->set('content_id',$this->ContentFile->field('content_id',array('ContentFile.id'=>$id)));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ContentFile->id = $id;
		if (!$this->ContentFile->exists()) {
			throw new NotFoundException(__('Invalid content file'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ContentFile->delete()) {
			$this->Session->setFlash(__('The content file has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The content file could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function upload_file(){
		$data = $this->request->data;
		$valid_ext = $this->ContentFile->validate['content_file']['rule']['1'];
		if($data['ContentFile']['content_file']['size']>0){
			$pathinfo = pathinfo($data['ContentFile']['content_file']['name']);
			if(in_array($pathinfo['extension'], $valid_ext)){
				$config = array(
					'id'=>'content_file',
					'file'=>$data['ContentFile']['content_file'],
					'path'=>'files/content_file',
				);
				$data['ContentFile']['content_file'] = $this->FileUploader->uploadFile($config);
			}else{
				$this->request->data['ContentFile']['content_file']=$data['ContentFile']['content_file']['name'];
				$data['ContentFile']['content_file']=$data['ContentFile']['content_file']['name'];
			}
			
		}else{
			$data['ContentFile']['content_file'] = $data['ContentFile']['pre_content_file'];
		}
		return $data;
	}
}
