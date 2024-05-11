<?php
App::uses('AppController', 'Controller');

class ConfigurationsController extends AppController {

	public $helpers = array('Js', 'Time');
	public $components = array('Paginator','Uploader');

	

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view() {
		$configurations = $this->Configuration->find('first');
		$this->set('configuration', $configurations);
	}

	

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->Configuration->exists($id)) {
			throw new NotFoundException(__('Invalid configuration'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->upoadLogo();
			
			if ($this->Configuration->save($this->request->data)) {
				$this->Session->setFlash(__('The configuration has been saved.'),'alert_success');
				return $this->redirect(array('action' => 'view'));
			} else {
				$this->Session->setFlash(__('The configuration could not be saved. Please, try again.'),'alert_error');
			}
		} else {
			$options = array('conditions' => array('Configuration.' . $this->Configuration->primaryKey => $id));
			$this->request->data = $this->Configuration->find('first', $options);
		}
	}

	public function upoadLogo(){
		$image_info = $this->request->data['Configuration']['image'];
		
		$pathinfo = pathinfo($image_info['name']);
		$valid_ext = $this->Configuration->validate['image']['rule']['1'];
		if($image_info['size']>0){
			if(in_array($pathinfo['extension'], $valid_ext)){
				if(move_uploaded_file($image_info['tmp_name'], WWW_ROOT.'/img/logo.png')){
					$this->request->data['Configuration']['image']='/img/logo.png';
				}
			}else{
				$this->request->data['Configuration']['image']=$this->request->data['Configuration']['image']['name'];
			}
		}else{
			$this->request->data['Configuration']['image'] = $this->request->data['Configuration']['pre_image'];
		}
	}

}