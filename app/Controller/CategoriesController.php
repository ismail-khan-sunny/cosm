<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	
	
	public $uses = array('Category','Product','Category','Content','Menu','Configuration','SliderContent','Product','Slider','AddManagement');
	public $components = array("Paginator","RequestHandler","ImageUploader");
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->layout = 'admin';
		$this->Auth->allow('sub_category_products','index','details');	
		$this->set('logged_user',$this->Auth->user());

		$this->Auth->allow();	
		$this->set('logged_user',$this->Auth->user());
		$this->set('logged_user_info',$this->Auth->user('id'));
		$this->set('logged_user',$this->Auth->user());

		$this -> site_config = $this -> Configuration -> find('all');

		$this->Session->write('site_setting',$this -> site_config[0]);
		$this -> set('site_setting', $this -> site_config[0]);

		
		
	}

/**
 * index method
 *
 * @return void
 */
	public function index($slug,$filter_type=null) {
		$order = 'Product.created DESC';
		$this->layout = 'allpage';
		$category = $this->Category->find('first',array('conditions'=>array('Category.slug'=>$slug)));
		
		if(!empty($category)){
			$category_id = $category['Category']['id'];
		}
		$popular_products = $this->Product->find(
			'all',
				array(
				'conditions'=>array('Product.category_id'=>$category_id,'Product.product_status'=>'approved'),
				'order'=>'Product.views DESC',
				'limit'=>'12'
				)
		);	
		$recent_products = $this->AddManagement->getAdd('recent',4);

		$conditions[] = array('Product.category_id' => $category_id,'Product.product_status'=>'approved', 'Product.quantity >'=>0);

		if(!empty($filter_type)){
			$this->layout = 'ajax';
			switch ($filter_type) {
				case 'popular':
					$conditions[] = array('Product.category_id' => $category_id,'Product.product_status'=>'approved', 'Product.quantity >'=>0,'Product.popular'=>1);
					break;
				case 'low-price':
					$order = 'Product.price ASC';
					break;
				case 'heigh-price':
					$order = 'Product.price DESC';
					break;
				default:
					$order = 'Product.created DESC';
					break;
			}
		}


	    $this->Paginator->settings = array(
	        'conditions' => $conditions,
	        'limit' => 54,
	        'order' =>$order
	    );
	    $products = $this->Paginator->paginate('Product');		
          
		//pr($products);die();
		$this->set(compact('popular_products','recent_products','products'));
		$this->set('category', $category);
		
		if(!empty($filter_type)){
			$this->render('/Elements/frontend/allproducts');

		}
	}

	/**
 * index method
 *
 * @return void
 */
	public function sub_category_products($slug,$filter_type=null) {
		$sub_categories = array();
		$order = 'Product.created DESC';
		$this->layout = 'allpage';
		$category = $this->Category->find('first',array('conditions'=>array('Category.slug'=>$slug)));
		
		if(!empty($category)){
			$category_id = $category['Category']['id'];
			$sub_categories = $this->Category->find('list',array('fields'=>array('Category.id','Category.id'),'conditions'=>array('Category.parent_id'=>$category_id)));		
			
			array_unshift($sub_categories,$category_id);
		}

		$popular_products = $this->Product->find(
			'all',
				array(
				'conditions'=>array('Product.category_id'=>$sub_categories,'Product.popular'=>1,'Product.product_status'=>'appproved'),
				'order'=>'Product.views DESC',
				'limit'=>'10'
				)
		);	

		$recent_products= $this->Product->find(
			'all',
				array(
				'conditions'=>array('Product.product_status'=>'appproved'),
				'order'=>'Product.created DESC',
				'limit'=>'4'
			)
		);	

		$conditions[] = array('Product.category_id' => $sub_categories,'Product.product_status'=>'approved', 'Product.quantity >'=>0);

		if(!empty($filter_type)){
			$this->layout = 'ajax';
			switch ($filter_type) {
				case 'popular':
					$conditions[] = array('Product.popular'=>1);
					break;
				case 'low-price':
					$order = 'Product.price ASC';
					break;
				case 'heigh-price':
					$order = 'Product.price DESC';
					break;
				default:
					$order = 'Product.created DESC';
					break;
			}
		}

	    $this->Paginator->settings = array(
	        'conditions' => $conditions,
	        'limit' => 48,
	        'order' =>$order
	    );
	    $products = $this->Paginator->paginate('Product');			
		
		$this->set(compact('popular_products','recent_products','products'));
		$this->set('category', $category);
		
		if(!empty($filter_type)){
			$this->render('/Elements/frontend/allproducts');

		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null,$child_id = null) {
		$this->layout = 'frontend';
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$sub_categories=array();
		$categories =   ClassRegistry::init('Category')->find('threaded',
                array(
                    'conditions'=>array('status' =>'active'),
                    'order'=>'Category.order ASC',
                    'recursive'=>-1,
                )
            );
		if(empty($child_id)){
			$category_id = $id;
			$category = $this->Category->find('first',array('conditions'=>array('Category.id'=>$category_id)));
			if(!empty($category)){
				$sub_categories = $this->Category->find('list',array('fields'=>array('Category.id','Category.id'),'conditions'=>array('Category.parent_id'=>$category_id)));
				array_unshift($sub_categories,$category_id);
			}
		}else{
			$sub_categories[]=$child_id;
		}
		//pr($sub_categories);die();
		$this->Product->recursive = 0;
 		$this->paginate = array(
				//'fields'=>array('id','title','created','category_id'),
				'conditions'=>array(
						//'ProductBrand.brand_id'=>$brands,
						'Product.category_id'=>$sub_categories
						),
				'limit'=>15,
				
				//'order'=>'ProductBrand.created DESC'
		);
		
		$Product = $this->paginate('Product');	
		//pr($Product);die();
		$datas = array();
		$item= array();
		$i=1;
		$total = count($Product);
		foreach($Product as $pro){
			$item[] = $pro;
			
			if($i%3==0 || $i==$total){
				$datas[]['Item'] =  $item;
				$item= array();
			}
			

			$i++;
		}	
		$options = array('contain'=>false,'conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$category_details=$this->Category->find('first', $options);
		//pr($category_details);die();
		$this->set(compact('categories', 'datas','category_details'));
		$this->set('title_of_layout','Category');
		
	}

	public function details($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->layout = 'frontend';
		$this->Product->recursive = 0;
 		$this->paginate = array(
				//'fields'=>array('id','title','created','category'),
				'conditions'=>array(
						'Product.category_id'=>$this->params['pass'][0]),
				'limit'=>15,
				
				//'order'=>'ProductBrand.created DESC'
		);
		
		$Product = $this->paginate('Product');	
		$datas = array();
		$item= array();
		$i=1;
		$total = count($Product);
		foreach($Product as $event){
			$item[] = $event;
			
			if($i%3==0 || $i==$total){
				$datas[]['Item'] =  $item;
				$item= array();
			}
			

			$i++;
		}		
		//pr($datas);
		//die();
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$category=$this->Category->find('first', $options);
		// pr($category);
		// die();
		$this->set('category', $category);
		$this->set('datas', $datas);
		$this->set('Product', $Product);
		$this->set('title_of_layout',$category['Category']['title']);
	}	

/**
 * admin_index method
 *
 * @return void
 */

public function admin_index() {
	    $this->layout = 'admin';
		$conditions[] = array('');

		if(!empty($this->request->query)){
			$searchdata['Search'] = $this->request->query;
			$this->request->data = $searchdata;

			if(!empty($searchdata['Search']['fieldname']) & !empty($searchdata['Search']['value'])){
				$conditions[] = array($searchdata['Search']['fieldname'].' LIKE'=>'%'.$searchdata['Search']['value'].'%');
			}
		}
		
		$this->Category->recursive = 0;
		
		$this->paginate = array(
			'limit'=>20,
			'conditions'=>$conditions,
			'order'=>'Category.created DESC'
		);

		$pluralName = $this->Paginator->paginate();
		$this->set('categories', $pluralName);
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
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'admin';
		if ($this->request->is('post')) {
			//$this->uploadValidImage('Category','image','img/frontend/category',array('width'=>'1002','height'=>'240'));
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$last_insert_id = $this->Category->getLastInsertID();
								$this->Session->setFlash(__('The category has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$parentCategories = $this->Category->categoryList();

		$this->set(compact('parentCategories'));
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
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//$this->uploadValidImage('Category','image','img/frontend/category',array('width'=>'1002','height'=>'240'));
					
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
		$parentCategories = $this->Category->categoryList();;
		$this->set(compact('parentCategories'));
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('The category has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The category could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_generateCategoryCodeName(){
		$code = '';
		$categries = $this->Category->find(
			'all',
			array(
				'contain'=>array('ParentCategory'=>array('fields'=>array('ParentCategory.name'))),
				'fields' => array('Category.id','Category.name','Category.code_name'),
			)
		);

		foreach($categries as $cat){
			if(!empty($cat['ParentCategory']['name'])){
				$parent_cate_name = $this->capitalizename($cat['ParentCategory']['name']);
				$cate_name = $this->capitalizename($cat['Category']['name']);
				$code = $parent_cate_name.$cate_name;
				$this->Category->updateAll(array('Category.code_name'=>'"'.$code.'"'),array('Category.id'=>$cat['Category']['id']));
				echo $code.'</br>';
			}
		}
		
		exit;
	}

	function capitalizename($name){
		$names = explode(' ',$name);
		$n='';
		foreach($names as $value){
			if($value!='&' and $value!='('){
				$n .=  strtoupper(substr($value, 0,1));
			}
		}
		$n = str_replace('(', '', $n);
		return $n;
	}

	

}
