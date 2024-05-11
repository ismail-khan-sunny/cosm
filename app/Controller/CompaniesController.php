<?php
App::uses('AppController', 'Controller');
/**
 * Companies Controller
 *
 * @property Company $Company
 * @property PaginatorComponent $Paginator
 */
class CompaniesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
		public $uses = array('Company','ProductBrand','Configuration','Download','PhotoGallery','Photo','SliderContent','User','Profile','Slider','Notice',
	'RelatedLink','SocialLink','News','Contactus','Mission','Category','Product','Service','Brand');
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
		$this->Company->recursive = 0;
		$this->set('companies', $this->Paginator->paginate());
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
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
		$this->set('company', $this->Company->find('first', $options));
		$this->Product->recursive = 0;
 		$this->paginate = array(
				//'fields'=>array('id','title','created','category'),
				'conditions'=>array(
						//'ProductBrand.brand_id'=>$brand[0]['Brand']['id'],
						'Product.company_id'=>$id),
				'limit'=>12,
				
				'order'=>'Product.created DESC'
		);
		$Product = $this->paginate('Product');	
		$datas = array();
		$item= array();
		$i=1;
		$total = count($Product);
			foreach($Product as $event){
				$item[] = $event;
				if($i%4==0 || $i==$total){
					$datas[]['Item'] =  $item;
					$item= array();
				}
				$i++;
			}		
		$this->set('datas', $datas);
		$service = $this->Mission->find(
			'all',
			array(
				'conditions'=>array('Mission.status'=>'active','Mission.company_id'=>$id),
				//'contain' => array('SliderContent'=>array('order'=>'SliderContent.order ASC')) 
			)
		);
			$i=0;
			$list= array();
			foreach ($Product as $key1=>$value1){
				$list[$i] = $value1['Product']['id'];
				
				$i++;
			}
		// pr($list);		
		// pr($Product);
		// die();

		$conditions = array();
		$conditions[] = array('ProductBrand.product_id'=>$list,'Brand.status'=>'active');
		$brand = $this->ProductBrand->find(
			'all',
			array(
				'conditions'=>$conditions,
				'group'=>array('ProductBrand.brand_id'),
				//'contain' => array('SliderContent'=>array('order'=>'SliderContent.order ASC')) 
			)
		);	
		// pr($brand);		
		// pr($Product);
		// die();		
		// pr($brand);
		// die();					
		$this->set('services', $service);
		$this->set('brands', $brand);
		// pr($service);
		// die();
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Company->create();
			if ($this->Company->save($this->request->data)) {
				$last_insert_id = $this->Company->getLastInsertID();
								$this->Session->setFlash(__('The company has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The company could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Company->save($this->request->data)) {
				$this->Session->setFlash(__('The company has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The company could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
			$this->request->data = $this->Company->find('first', $options);
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
		$this->Company->id = $id;
		if (!$this->Company->exists()) {
			throw new NotFoundException(__('Invalid company'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Company->delete()) {
			$this->Session->setFlash(__('The company has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The company could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Company->recursive = 0;
		$this->set('companies', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
		$this->set('company', $this->Company->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Company->create();
			$this->uploadValidImage('Company','image','img/frontend/company',array('width'=>'370','height'=>'340'));
			if ($this->Company->save($this->request->data)) {
				$last_insert_id = $this->Company->getLastInsertID();
								$this->Session->setFlash(__('The company has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The company could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->uploadValidImage('Company','image','img/frontend/company',array('width'=>'370','height'=>'340'));
	
			//$this->uploadValidImage('Category','image','img/frontend/category',array('width'=>'370','height'=>'340'));
			if ($this->Company->save($this->request->data)) {
				$this->Session->setFlash(__('The company has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The company could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
			$this->request->data = $this->Company->find('first', $options);
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
		$this->Company->id = $id;
		if (!$this->Company->exists()) {
			throw new NotFoundException(__('Invalid company'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Company->delete()) {
			$this->Session->setFlash(__('The company has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The company could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
