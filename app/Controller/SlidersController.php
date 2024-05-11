<?php
App::uses('AppController', 'Controller');
/**
 * Sliders Controller
 *
 * @property Slider $Slider
 * @property PaginatorComponent $Paginator
 */
class SlidersController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator');
	public $uses = array('Slider','Department');

	protected $sliderpositions = array(
		'home_page_top'=>'Home Page Top',
		
	);



	public function beforeFilter(){
		$this->set('sliderpositions',$this->sliderpositions);
		parent::beforeFilter();

	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$logged_user = $this->Auth->user();
		$this->paginate = array(
				'limit'=>10,
				'order'=>'Slider.created DESC'
		);	

		$data = $this->paginate('Slider');
		$this->set('sliders', $data);
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Slider->exists($id)) {
			throw new NotFoundException(__('Invalid slider'));
		}

		$options = array('conditions' => array('Slider.' . $this->Slider->primaryKey => $id));
		$this->set('slider', $this->Slider->find('first', $options));
		$this->set('slider_id', $id);
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Slider->create();
			if ($this->Slider->save($this->request->data)) {
				$this->Session->setFlash(__('The slider has been saved.'),'alert_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The slider could not be saved. Please, try again', 'alert_success');
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
		if (!$this->Slider->exists($id)) {
			throw new NotFoundException(__('Invalid slider'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Slider->save($this->request->data)) {
				$this->Session->setFlash(__('The slider has been saved.'),'alert_success',null);
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slider could not be saved. Please, try again.'),'alert_error',null);
			}
		} else {
			$options = array('conditions' => array('Slider.' . $this->Slider->primaryKey => $id));
			$this->request->data = $this->Slider->find('first', $options);
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
		$this->Slider->id = $id;
		if (!$this->Slider->exists()) {
			throw new NotFoundException(__('Invalid slider'));
		}
		$this->request->onlyAllow('post', 'delete');

		if ($this->Slider->delete()) {
			
			$this->Session->setFlash(__('The slider has been deleted.'));
		} else {
			$this->Session->setFlash(__('The slider could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
