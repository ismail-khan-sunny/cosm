<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	//public $uses = array('Product','ProductBrand');
	public $uses = array('Product','ProductBrand','Configuration','Download','PhotoGallery','Photo','SliderContent','User','Profile','Slider','Notice',
	'RelatedLink','SocialLink','News','Contactus','Mission','Category','Brand');
	public $components = array("Paginator","RequestHandler","ImageUploader");
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow();	
		$this->set('logged_user',$this->Auth->user());
		$this->set('logged_user_info',$this->Auth->user('id'));
		$this->set('logged_user',$this->Auth->user());

		$this -> site_config = $this -> Configuration -> find('all');
		$this->Session->write('site_array',$this -> site_config[0]);
		$this -> set('site_setting', $this -> site_config);

		$contact = $this -> Contactus -> find('first');
		//pr($contact);die();
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
		$this->Product->recursive = 2;
		$highlighted_products=$this->Paginator->paginate();
		$datas = array();
		$item= array();
		$i=1;
		$total = count($highlighted_products);
		foreach($highlighted_products as $highlighted_product){
			$item[] = $highlighted_product;
			if($i%4==0 || $i==$total){
				$datas[]['Item'] =  $item;
				$item= array();
			}
			$i++;
		}
		//pr($datas);die();
		$this->set('datas', $datas);
	}
	public function view($id = null,$category_id = null) {
		$this->layout = 'frontend';
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$product=$this->Product->find('first', $options);
		$this->set('product', $this->Product->find('first', $options));
		$this->set('title_of_layout',$product['Product']['title']);
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function details($slug = null) {
		$this->layout = 'frontend';		
		$options = array('conditions' => array('Product.slug' => $slug));
		$product=$this->Product->find('first', $options);
		$parent_id=$product['Category']['parent_id'];
		if(!empty($parent_id)){
			$category_parent = $this->Category->find('first',array('recursive'=>'-2','conditions'=>array('Category.id'=>$parent_id)));	
		}
		
		$this->set('category_parent',$category_parent);
		$this->set('product', $this->Product->find('first', $options));
		$this->set('title_of_layout',$product['Product']['title']);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$last_insert_id = $this->Product->getLastInsertID();
				$this->Session->setFlash(__('The product has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$categories = $this->Product->Category->find('list');
		$companies = $this->Product->Company->find('list');
		$this->set(compact('categories', 'companies'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		$categories = $this->Product->Category->find('list');
		$companies = $this->Product->Company->find('list');
		$this->set(compact('categories', 'companies'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */

	public function admin_index() {
		//$this->Content->recursive = 0;
			$this->layout = 'admin';
		$logged_user = $this->Auth->user();
		$conditions = array();
		if($this->request->is('post')){
			$searchdata = $this->request->data;
			
			if(!empty($searchdata['Search']['fieldname']) & !empty($searchdata['Search']['value'])){
				$conditions[] = array($searchdata['Search']['fieldname'].' LIKE'=>'%'.$searchdata['Search']['value'].'%');
			}
		}
		
		$this->paginate = array(
				'limit'=>10,
				'conditions'=>$conditions,
				'order'=>'Product.created DESC'
		);
		$data = $this->paginate('Product');
		$this->set('products', $this->Paginator->paginate());
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
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */

	public function admin_add() {
		$this->layout = 'admin';		
		if ($this->request->is('post')) {
			$this->uploadValidImage('Product','image','img/frontend/product',array('width'=>'370','height'=>'289'));
			//$data = $this->uploadProductImage($this->request->data);
			if ($this->Product->saveAssociated($this->request->data)) {
				$product_id = $this->Product->getLastInsertID();
			$this->Session->setFlash(__('The product has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
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
		if ($this->request->is(array('post', 'put'))) {
			$this->uploadValidImage('Product','image','img/frontend/product',array('width'=>'370','height'=>'289'));
			//$data = $this->uploadProductImage($this->request->data);
			if ($this->Product->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'), 'alert_success');
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again. '), 'alert_error');
			}
		} else {
			
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$product = $this->Product->find('first', $options);
			$this->request->data = $product;
		}
		//pr($this->request->data);die();
		$parentCategories = $this->Category->categoryList();

		$this->set(compact('parentCategories'));
	}
    public function uploadProductImage($data){

        $product_image = array();

        $valid_ext = $this->Product->ProductImage->validate['image']['rule']['1'];
       
        foreach($data['ProductImage'] as $index=>$product_image_data){

            if($index=='image'){

                foreach($product_image_data as $key=>$image){

                    $image_name = '';

                    if($image['size']>0){

                        $pathinfo = pathinfo($image['name']);

                       

                        if(in_array($pathinfo['extension'], $valid_ext)){

                            $config = array(
                                'id'=>'ProductImage_'.$key.'_',
                                'file'=>$image,
                                'path'=>'img/frontend/product',
                                'resize'=>array('width'=>'390','height'=>'400')
                            );

                            $image_name = $this->ImageUploader->uploadImage($config);

                        }

                    }else{

                        if(is_array($data['ProductImage']['pre_image'])){

                            if(array_key_exists($key, $data['ProductImage']['pre_image'])){

                                $image_name  = $data['ProductImage']['pre_image'][$key];

                            }

                        }

                       

                    }

                    $product_image[$key]['image'] = $image_name;

                }

            }else{

                if(!empty($product_image_data)){
                    
                    foreach($product_image_data as $key=>$fieldvalue){

                        $product_image[$key][$index] = $fieldvalue;

                    }

                }

            }

        }

        foreach($product_image as $key=>$pimage){

            if(empty($pimage['image'])){

                unset($product_image[$key]);

            }

        }

        $data['ProductImage'] = $product_image;

       

        return $data;

    }	
	public function remove_from_db(){

		if($this->request->is('post')){
			$data = $this->request->data;

			$model = ClassRegistry::init($data['model']);
			$model->id = $data['id'];
			if($model->delete()){
				echo '1';
			}else{
				echo '0';
			}
		}
		exit;
	}
	public function arrangeProductImage($product){

		if(!empty($product['ProductImage'])){
			$data = array();
			foreach($product['ProductImage'] as $productimage){

				$id[] = $productimage['id'];
				$image[] = $productimage['image'];
				$product_id[] = $productimage['product_id'];
				$position[] = $productimage['position'];
				
			}

			$product['ProductImage'] = array(
				'id' => $id,
				'image' => $image,
				'product_id' => $product_id,
				'position' => $position,
			);
		}
			
		return $product;
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
