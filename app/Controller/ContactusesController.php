<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('String', 'Utility');

/**
 * Contactuses Controller
 *
 * @property Contactus $Contactus
 * @property PaginatorComponent $Paginator
 */
class ContactusesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $helpers = array('Html','Crumb');
	public $components = array("Paginator","RequestHandler","ImageUploader");
	public $uses = array('Contactus','Content','Menu','Configuration','PhotoGallery','Photo','SliderContent','User','Profile','Slider','Notice',
	'RelatedLink','SocialLink','News');
	public function beforeFilter(){
		parent::beforeFilter();
		
		$this->Auth->allow();	
		$this->Auth->allow('add','edit');
		$this->set('logged_user',$this->Auth->user());
		$this->set('logged_user_info',$this->Auth->user('id'));
		$this->set('logged_user',$this->Auth->user());

		$this -> site_config = $this -> Configuration -> find('all');
		$this->Session->write('site_array',$this -> site_config[0]);
		$this -> set('site_setting', $this -> site_config);
		
	}
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Contactus->recursive = 0;
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Contactus->exists($id)) {
			throw new NotFoundException(__('Invalid contactus'));
		}
		$options = array('conditions' => array('Contactus.' . $this->Contactus->primaryKey => $id));
		$this->set('contactus', $this->Contactus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'frontend';
		if($this->request->is('post')){

			$data = $this->request->data;

			$admin_info = $this->Configuration->find('all');
			$admin_email = $admin_info[0]['Configuration']['contact_email'];
			
			if(!empty($data) && !empty($admin_email)){
				$this -> sent_my_mails(
					array(
						'to' => $admin_email,
						'from_email' => $data['email'],
						'from_name' => $data['name'], 
						'subject' => $data['subject'], 
						'template' => 'contact',
					    'data' => array(
					    	'message' =>$data['message']
						)
					)
				);
				$this -> Session -> setFlash('Your mail successfully send !','default',array('class'=>'alert alert-success'));		
				$this->redirect(array('controller'=>'pages','action'=>'contact'));	
			}else {
				$this->Session->setFlash(__('The contactus could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}

		$this->set('contactuses', $this->Paginator->paginate());
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Contactus->exists($id)) {
			throw new NotFoundException(__('Invalid contactus'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contactus->save($this->request->data)) {
				$this->Session->setFlash(__('The contactus has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The contactus could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Contactus.' . $this->Contactus->primaryKey => $id));
			$this->request->data = $this->Contactus->find('first', $options);
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
		$this->Contactus->id = $id;
		if (!$this->Contactus->exists()) {
			throw new NotFoundException(__('Invalid contactus'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Contactus->delete()) {
			$this->Session->setFlash(__('The contactus has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The contactus could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'admin';
		$this->Contactus->recursive = 0;
		$this->set('contactuses', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->layout = 'admin';
		if (!$this->Contactus->exists($id)) {
			throw new NotFoundException(__('Invalid contactus'));
		}
		$options = array('conditions' => array('Contactus.' . $this->Contactus->primaryKey => $id));
		$this->set('contactus', $this->Contactus->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'admin';
		if ($this->request->is('post')) {
			$this->Contactus->create();
			if ($this->Contactus->save($this->request->data)) {
				$last_insert_id = $this->Contactus->getLastInsertID();
								$this->Session->setFlash(__('The contactus has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The contactus could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
		$this->layout = 'admin';
		if (!$this->Contactus->exists($id)) {
			throw new NotFoundException(__('Invalid contactus'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contactus->save($this->request->data)) {
				$this->Session->setFlash(__('The contactus has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The contactus could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Contactus.' . $this->Contactus->primaryKey => $id));
			$this->request->data = $this->Contactus->find('first', $options);
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
		$this->layout = 'admin';
		$this->Contactus->id = $id;
		if (!$this->Contactus->exists()) {
			throw new NotFoundException(__('Invalid contactus'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Contactus->delete()) {
			$this->Session->setFlash(__('The contactus has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The contactus could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
