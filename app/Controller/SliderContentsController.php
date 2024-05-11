<?php
App::uses('AppController', 'Controller');
/**
 * SliderContents Controller
 *
 * @property SliderContent $SliderContent
 * @property PaginatorComponent $Paginator
 */
class SliderContentsController extends AppController {
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
	public function admin_index($slider_id = null) {
		if($slider_id == null){
			$this->redirect(array('controller'=>'Sliders','action' => 'index'));
		}else{
			$this->Paginator->settings = array(
					'conditions' => array('slider_id' => $slider_id),
					'order' =>'caption asc',
					'limit' => 10,
			);

		}
		$this->SliderContent->recursive = 0;
		$this->set('sliderContents', $this->Paginator->paginate());
		$this->set('slider_id',$slider_id);
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->SliderContent->exists($id)) {
			throw new NotFoundException(__('Invalid slider content'));
		}
		$options = array('conditions' => array('SliderContent.' . $this->SliderContent->primaryKey => $id));
		$this->set('sliderContent', $this->SliderContent->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add($slider_id = null) {
		if($slider_id == null){
			return $this->redirect(array('controller'=>'Sliders','action' => 'index'));
		}
		$this->set('slider_id',$slider_id);
		
		
		if ($this->request->is('post')) {
			/** image upload code start **/
			$sliderinfo = $this->SliderContent->Slider->getSliderWidthHeight($this->request->data['SliderContent']['slider_id']);
			
			$this->uploadValidImage('SliderContent','image','img/frontend/slider_content',$sliderinfo['Slider']);
			
			$this->SliderContent->create();
			if ($this->SliderContent->save($this->request->data)) {
				$this->Session->setFlash(__('The slider content has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index',$this->request->data['SliderContent']['slider_id']));
			} else {
				$this->Session->setFlash(__('The slider content could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
				return $this->redirect(array('action' => 'add',$this->request->data['SliderContent']['slider_id']));
			}
		}
		$sliders = $this->SliderContent->Slider->find('list');
		$this->set(compact('sliders'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->SliderContent->exists($id)) {
			throw new NotFoundException(__('Invalid slider content'));
		}
		if ($this->request->is(array('post', 'put'))) {
			/** image upload code start **/
			
			$sliderinfo = $this->SliderContent->Slider->getSliderWidthHeight($this->request->data['SliderContent']['slider_id']);
			
			$this->uploadValidImage('SliderContent','image','img/frontend/slider_content',$sliderinfo['Slider']);

			if ($this->SliderContent->save($this->request->data)) {
				$this->Session->setFlash(__('The slider content has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index',$this->request->data['SliderContent']['slider_id']));
			} else {
				$this->Session->setFlash(__('The slider content could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('SliderContent.' . $this->SliderContent->primaryKey => $id));
			$this->request->data = $this->SliderContent->find('first', $options);
		}
		$sliders = $this->SliderContent->Slider->find('list');
		$this->set(compact('sliders'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->SliderContent->id = $id;
		if (!$this->SliderContent->exists()) {
			throw new NotFoundException(__('Invalid slider content'));
		}
		$this->request->onlyAllow('post', 'delete');
		$sliderid = $this->SliderContent->field('slider_id',array('SliderContent.id'=>$id));
		
		if ($this->SliderContent->delete()) {
			
			$this->Session->setFlash(__('The slider content has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The slider content could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('controller'=>'SliderContents','action' => 'index',$sliderid));
	}
}
