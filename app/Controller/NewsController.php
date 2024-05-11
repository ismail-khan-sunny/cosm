<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 */
class NewsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Text','News');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');
	
	public $newstype = array('Content'=>'Content','File'=>'File');
	
	public function beforeFilter(){
		$this->set('newstype',$this->newstype);
		parent::beforeFilter();
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$conditions = array();
		if($this->request->is('post')){
			$searchdata = $this->request->data;

			if(!empty($searchdata['Search']['category'])){
				$conditions[] = array('News.category'=>$searchdata['Search']['category']);
			}

			if(!empty($searchdata['Search']['fieldname']) & !empty($searchdata['Search']['value'])){
				$conditions[] = array($searchdata['Search']['fieldname'].' LIKE'=>'%'.$searchdata['Search']['value'].'%');
			}
		}

		$this->paginate = array(
			'limit'=>20,
			'conditions'=>$conditions,
			'order'=>'News.start_date DESC'
		);
		$this->News->recursive = 0;
		$datas = $this->paginate('News');
		
		$this->set('news', $datas);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->uploadValidImage('News','image','img/frontend/news',array());
			$this->uploadValidFile('News','file','files/frontend/news');
			$this->News->create();

			if ($this->News->save($this->request->data)) {
				$last_insert_id = $this->News->getLastInsertID();
				$this->Session->setFlash(__('The news has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->uploadValidImage('News','image','img/frontend/news',array());
			$this->uploadValidFile('News','file','files/frontend/news');
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
			$this->request->data = $this->News->find('first', $options);
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
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->News->delete()) {
			$this->Session->setFlash(__('The news has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The news could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
