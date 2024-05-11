<?php
App::uses('AppController', 'Controller');
/**
 * Brands Controller
 *
 * @property Brand $Brand
 * @property PaginatorComponent $Paginator
 */
class BrandsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('Brand','ProductBrand','Configuration','Download','PhotoGallery','Photo','SliderContent','User','Profile','Slider','Notice',
	'RelatedLink','SocialLink','News','Contactus','Mission','Category');
	public function beforeFilter(){
		parent::beforeFilter();
		
		$this->Auth->allow();	
		$this->layout = 'admin';
		$this->set('logged_user',$this->Auth->user());
		$this->set('logged_user_info',$this->Auth->user('id'));
		$this->set('logged_user',$this->Auth->user());

		$this -> site_config = $this -> Configuration -> find('all');
		$this->Session->write('site_array',$this -> site_config[0]);
		$this -> set('site_setting', $this -> site_config);

		$contact = $this -> Contactus -> find('all',array('fields'=>array('email','shortdes','mobile','google_location')));
		
		$this->Session->write('contact',$contact);
		$this -> set('contact', $contact);

		
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'frontend';
		$this->Brand->recursive = 0;
		$brand = $this->paginate('Brand');	

		$datas = array();
		$item= array();
		$i=1;
		$total = count($brand);
		foreach($brand as $event){
			$item[] = $event;
			
			if($i%3==0 || $i==$total){
				$datas[]['Item'] =  $item;
				$item= array();
			}
			

			$i++;
		}
		
		$this->set('datas', $datas);
	}

	public function view_all_brand() {
		$this->layout = 'frontend';
		$this->Brand->recursive = 0;
		$brand = $this->paginate('Brand');	

		$datas = array();
		$item= array();
		$i=1;
		$total = count($brand);
		foreach($brand as $event){
			$item[] = $event;
			
			if($i%4==0 || $i==$total){
				$datas[]['Item'] =  $item;
				$item= array();
			}
			

			$i++;
		}
		
		$this->set('datas', $datas);
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'frontend';
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException(__('Invalid brand'));
		}
		$this->ProductBrand->recursive = 0;
 		$this->paginate = array(
				//'fields'=>array('id','title','created','category'),
				'conditions'=>array(
						'ProductBrand.brand_id'=>$id,
						),
				'limit'=>15,
				
				//'order'=>'ProductBrand.created DESC'
		);
		
		$ProductBrand = $this->paginate('ProductBrand');	
		$datas = array();
		$item= array();
		$i=1;
		$total = count($ProductBrand);
			foreach($ProductBrand as $event){
				$item[] = $event;
				if($i%4==0 || $i==$total){
					$datas[]['Item'] =  $item;
					$item= array();
				}
				$i++;
			}	
		// pr($datas);
		// die();	
		$options = array('conditions' => array('Brand.' . $this->Brand->primaryKey => $id));
		$this->set('brand', $this->Brand->find('first', $options));
		$this->set('datas', $datas);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Brand->create();
			if ($this->Brand->save($this->request->data)) {

				$last_insert_id = $this->Brand->getLastInsertID();
								$this->Session->setFlash(__('The brand has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
	public function edit($id = null) {
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException(__('Invalid brand'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Brand->save($this->request->data)) {
				$this->Session->setFlash(__('The brand has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Brand.' . $this->Brand->primaryKey => $id));
			$this->request->data = $this->Brand->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Brand->id = $id;
		if (!$this->Brand->exists()) {
			throw new NotFoundException(__('Invalid brand'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Brand->delete()) {
			$this->Session->setFlash(__('The brand has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The brand could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Brand->recursive = 0;
		$this->set('brands', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException(__('Invalid brand'));
		}
		$options = array('conditions' => array('Brand.' . $this->Brand->primaryKey => $id));
		$this->set('brand', $this->Brand->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Brand->create();
			$this->uploadValidImage('Brand','image','img/frontend/brand',array('width'=>'370','height'=>'289'));
			if ($this->Brand->save($this->request->data)) {
				$last_insert_id = $this->Brand->getLastInsertID();
								$this->Session->setFlash(__('The brand has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$categories = $this->Category->find('list');
	
		$this->set(compact('categories'));
	}
	public function admin_related() {
		//$this->layout = false;
				$products_info = $this->Brand->find('all');
				
				$related_itag_array = array();
				$i=0;
				foreach($products_info as $productstag):
					
						$related_itag_array[$i]['key'] = $productstag['Brand']['id'];
						$related_itag_array[$i]['value'] = $productstag['Brand']['title'];
				$i++;
				endforeach;
				$this->set('related_itag_array',$related_itag_array);
			}
	public function related() {
		$this->layout = false;
				$products_info = $this->Brand->find('all');
				
				$related_itag_array = array();
				$i=0;
				foreach($products_info as $productstag):
					
						$related_itag_array[$i]['key'] = $productstag['Brand']['id'];
						$related_itag_array[$i]['value'] = $productstag['Brand']['title'];
				$i++;
				endforeach;
				$this->set('related_itag_array',$related_itag_array);		
		}
/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException(__('Invalid brand'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->uploadValidImage('Brand','image','img/frontend/brand',array('width'=>'370','height'=>'289'));
			if ($this->Brand->save($this->request->data)) {
				$this->Session->setFlash(__('The brand has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Brand.' . $this->Brand->primaryKey => $id));
			$this->request->data = $this->Brand->find('first', $options);
			
		}
		$categories = $this->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Brand->id = $id;
		if (!$this->Brand->exists()) {
			throw new NotFoundException(__('Invalid brand'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Brand->delete()) {
			$this->Session->setFlash(__('The brand has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The brand could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
