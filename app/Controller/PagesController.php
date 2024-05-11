<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('String', 'Utility');
class PagesController extends AppController {
	public $helpers = array('Html','Crumb');
	public $uses = array('Content','Menu','Configuration','PhotoGallery','Photo','SliderContent','User','Profile','Slider','Notice',
	'RelatedLink','SocialLink','News','Contactus','Category','Product','Service','Event','Achievement','PositionApply','Career');
	public $components = array("Paginator","RequestHandler","ImageUploader");
	
	public function beforeFilter(){
		parent::beforeFilter();
		
		$this->Auth->allow();	
		$this->set('logged_user',$this->Auth->user());
		$this->set('logged_user_info',$this->Auth->user('id'));
		$this->set('logged_user',$this->Auth->user());

		$this -> site_config = $this -> Configuration -> find('all');
		//pr($this -> site_config);die();
		$this->Session->write('site_setting',$this -> site_config[0]);
		$this -> set('site_setting', $this -> site_config);

		$contact = $this -> Contactus -> find('first');
		$this->Session->write('contact',$contact);
		$this -> set('contact', $contact);

		
	}
	public function contact(){
		$this->layout = 'frontend';
		$contact = $this->Contactus->find('all');
		$meta_keywords = $contact[0]['Contactus']['meta_keyword'];
			
		$meta_description = $contact[0]['Contactus']['meta_description'];
		$this -> set('meta_keys', $meta_keywords);
		$this -> set('meta_description', $meta_description);
		
		if($this->request->is('post')){

			$data = $this->request->data;
			
			$admin_info = $this->Configuration->find('all');
			$admin_email = $contact[0]['Contactus']['email'];
			
			if(!empty($data) && !empty($admin_email)){
				$this -> sent_my_mails(
					array(
						'to' => $admin_email,
						'from_email' => $data['email'],
						'from_name' => $data['name'], 
						'subject' =>  'contactus',
						'template' => 'contactus',
					    'data' => array(
					    	'message' =>$data['message']
						)
					)
				);
				;	
				$this->Session->setFlash(__('A mail Has been Sent. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));

			}
		}
		
		//die();
		//$this->set('contact',$contact);
		$this->set('contactuses', $contact);
	}
	public function carrer(){
		$this->layout = 'frontend';
		
			if ($this->request->is('post')) {
				// pr($this->request->data);
				// die();
			$this->Career->create();
			$this->uploadValidFile('Career','file','img/frontend/Career/file');
			if ($this->Career->save($this->request->data)) {
				$last_insert_id = $this->Career->getLastInsertID();
								$this->Session->setFlash(__('The career has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
			
			} else {
				$this->Session->setFlash(__('The career could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}	
		$positionApplies = $this->PositionApply->find('list');
		$career = $this->Content->find('first',array('conditions'=>array('Content.type'=>'carrer','Content.status'=>'published ')));
		// pr($career);
		// die();
		// pr($positionApplies);die();
		$this->set(compact('positionApplies','career'));
		
	}	
	public function product($slug) {
		$this->layout = 'frontend';
		$this->Product->recursive = 2;
		$category_id = $this->slug_to_id_converter($slug,'Category');
		
		$this->paginate = array(
				'limit'=>50,
				'conditions'=>array('Product.category_id'=>$category_id),
				'order'=>'Product.created DESC'
		);
		$highlighted_products=$this->Paginator->paginate('Product');
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
		
		
			$all_category = ClassRegistry::init('Category')->find('threaded',array('contain'=>false,'conditions'=>array('Category.status'=>'active')));
		   
		$this->set('all_category',$all_category);
		//pr($datas);die();
		$this->set('datas', $datas);
	}
	public function search() {
		$this->layout = 'frontend';
		$conditions = array();
		$searchdata['Search'] = $this->request->query;
		if(!empty($searchdata['Search']['category_id'])){
				$conditions[] = array('Product.category_id'=>$searchdata['Search']['category_id']);
		}
		if(!empty($searchdata['Search']['search'])){
				$conditions[] = array(
								'OR'=>array(
									'Product.title like'=> '%'.$searchdata['Search']['search'].'%',
									'Product.model like'=>'%'.$searchdata['Search']['search'].'%'
								)
							);
		}
		$this->paginate = array(
				'limit'=>50,
				'conditions'=>$conditions,
				'order'=>'Product.created DESC'
		);
		$highlighted_products=$this->Paginator->paginate('Product');
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
		$this->set('search_match',$searchdata);
		//pr($datas);die();
		$this->set('datas', $datas);
	}
	public function category() {
		$this->layout = 'frontend';
		$this->Category->recursive = 0;
		$highlighted_products=$this->Paginator->paginate('Category');
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
	public function index(){
		$this->layout = 'frontend';
		$hometopslider = $this->Slider->find(
			'first',
			array(
				'conditions'=>array('status'=>'active','position'=>'home_page_top'),
				'contain' => array('SliderContent'=>array('order'=>'SliderContent.order ASC')) 
			)
		);
		
		$common_firsts = $this->Notice->find(
			'all',
			array(
				'conditions'=>array('Notice.status'=>'active'),
				'order'=>'Notice.order ASC',
				'limit'=>'2'
			)
		);

		$common_lasts = $this->Notice->find(
			'all',
			array(
				'conditions'=>array('Notice.status'=>'active'),
				'order'=>'Notice.order DESC',
				'limit'=>'1'
			)
		);
		$achievements = $this->Achievement->find(
			'all',
			array(
				//'conditions'=>array('Notice.status'=>'active'),
				'order'=>'Achievement.created DESC',
				'limit'=>'6'
			)
		);
		//pr($achievements);die();
		$services = $this->Service->find(
			'all',
			array(
			//	'conditions'=>array('Notice.status'=>'active'),
				'order'=>'Service.created DESC',
				'limit'=>'4'
			)
		);
		//pr($services);die();
		$welcome = $this->Content->find('first',array('conditions'=>array('Content.type'=>'welcome_text')));
		$testimonials = $this->Content->find('first',array('conditions'=>array('Content.type'=>'testimonials')));
		$competitive_advantage = $this->Content->find('first',array('conditions'=>array('Content.type'=>'competitive')));
		//pr($competitive_advantage);die();
		$this->set(compact('hometopslider','welcome','common_firsts','common_lasts','testimonials','services','competitive_advantage','achievements'));
	}
    public function service_details($id=null){
		
		$data = $this->Service->find('first',array('conditions'=>array('Service.id'=>$id)));
		$this->set('result',$data);
		$menu_service = ClassRegistry::init('Menu')->find('threaded',
				 array('conditions'=>array('parent_id'=>'58bfd27b-39a4-4d7a-bdc7-1ec0f8defb25','status' => 'active'),'recursive'=>-1,'order'=>'Menu.order ASC'));
		//($menu_service);die();
		if(!empty($slug)){
		$this->set('active_menu',$slug);
		}else{
			$this->set('active_menu','ss');
		}
		$this->set('menu_service',$menu_service);	
		$this->set('title_of_layout',$data['Service']['title']);	
	}
	public function service_view($slug=null){
		

		$menu_service = ClassRegistry::init('Menu')->find('threaded',
				 array('conditions'=>array('parent_id'=>'58bfd27b-39a4-4d7a-bdc7-1ec0f8defb25','status' => 'active'),'recursive'=>-1,'order'=>'Menu.order ASC'));
		//($menu_service);die();
		if(!empty($slug)){
		$this->set('active_menu',$slug);
		}else{
			$this->set('active_menu','ss');
		}
		$content_id = $this->slug_to_content_id_converter($slug,'Menu');
		$data = $this->Content->findById($content_id);
		//pr($data);die();
		$this->set('result',$data);

		$service_view = $this->Service->find('first',array('conditions'=>array('Service.id'=>'11')));
		if(!empty($slug)){
		$this->set('active_menu',$slug);
		}else{
			$this->set('active_menu','ss');
		}

		$meta_keywords = $data['Content']['meta_keyword'];
		$meta_description = $data['Content']['meta_description'];
		$this -> set('slug', $slug);
		$this -> set('meta_keys', $meta_keywords);
		$this -> set('meta_description', $meta_description);
		$this->set('service_view',$service_view);	
		$this->set('menu_service',$menu_service);	
		
	}
	public function event_details($id=null){
		$data = $this->Event->find('first',array('conditions'=>array('Event.id'=>$id)));
		$this->set('result',$data);
		if(!empty($slug)){
		$this->set('active_menu',$slug);
		}else{
			$this->set('active_menu','ss');
		}
		$this->set('title_of_layout',$data['Event']['title']);	
	}
	public function notice_details($id=null){
		$data = $this->Notice->find('first',array('conditions'=>array('Notice.id'=>$id)));
		$this->set('result',$data);
		if(!empty($slug)){
		$this->set('active_menu',$slug);
		}else{
			$this->set('active_menu','ss');
		}
		$this->set('title_of_layout',$data['Notice']['title']);	
	}
	public function service(){
		
		$services = $this->Service->find(
			'all',
			array(
				'order'=>'Service.created DESC',
				//'limit'=>'4'
			)
		);
		$events = $this->Event->find(
			'all',
			array(
				'order'=>'Event.created DESC',
				'limit'=>'4'
			)
		);

		$service_text = $this->Content->find('first',array('conditions'=>array('Content.type'=>'service_text')));
		$this->set(compact('services','service_text','events','title_of_layout'));

	}
	public function content_details($slug=null){
		$this->layout = 'frontend';
		$content_id = $this->slug_to_content_id_converter($slug,'Menu');
		$data = $this->Content->findById($content_id);
		
		$this->set('result',$data);

		if(!empty($slug)){
		$this->set('active_menu',$slug);
		}else{
			$this->set('active_menu','ss');
		}

			$meta_keywords = $data['Content']['meta_keyword'];
			
			$meta_description = $data['Content']['meta_description'];
			$this -> set('meta_keys', $meta_keywords);
			$this -> set('meta_description', $meta_description);

		$this->set('title_of_layout',$data['Content']['title']);	
	}
	
	public function content_detail($slug=null){
		$this->layout = 'frontend';
		$content_id = $this->slug_to_id_converter($slug,'Content');
		$data = $this->Content->findById($content_id);
		$this->set('result',$data);
		$this->set('title_of_layout',$data['Content']['title']);
		$meta_keywords = $data['Content']['meta_keyword'];
		$meta_description = $data['Content']['meta_description'];
		$this -> set('meta_keys', $meta_keywords);
		$this -> set('meta_description', $meta_description);
	}
	
	
	public function view_full_notice($slug=null){
		$this->layout = 'frontend';
		$this->layout = 'frontend';
		$content_id = $this->slug_to_id_converter($slug,'Notice');
		$data = $this->Notice->findById($content_id);

		$this->set('result',$data);
		
		$meta_keywords = $data['Notice']['meta_keyword'];
		$meta_description = $data['Notice']['meta_description'];
		
		$this -> set('meta_keys', $meta_keywords);
		$this -> set('meta_description', $meta_description);
		$this->set('title_of_layout',$data['Notice']['title']);	
	}	

	public function view_full_seminar($slug=null){
		$this->layout = 'frontend';
		$content_id = $this->slug_to_id_converter($slug,'Seminar');
		$data = $this->Seminar->findById($content_id);
		$this->set('result',$data);
		$this->set('title_of_layout',$data['Seminar']['title']);
		$meta_keywords = $data['Seminar']['meta_keyword'];
		$meta_description = $data['Seminar']['meta_description'];
		
		$this -> set('meta_keys', $meta_keywords);
		$this -> set('meta_description', $meta_description);
	}	
	public function view_full_mission($id=null){
		$this->layout = 'frontend';
		
		$data  = $this->Mission->find('all',array('conditions'=>array('Mission.id'=>$id)));
		
		
		$this->set('result',$data[0]);
		
	}	
	public function view_full_news($id=null){
		$this->layout = 'frontend';
		$data = $this->News->findById($id);

		$this->set('result',$data);
		

		$meta_keywords = $data['News']['meta_keyword'];
		$meta_description = $data['News']['meta_description'];
		$this -> set('meta_keys', $meta_keywords);
		$this -> set('meta_description', $meta_description);
		$this->set('title_of_layout',$data['News']['title']);
	}	
	public function view_full_missions($id=null){
		$this->layout = 'frontend';
		$data = $this->Mission->findById($id);
		$this->set('result',$data);
		$meta_keywords = $data['Mission']['meta_keyword'];
		$meta_description = $data['Mission']['meta_description'];
		$this -> set('meta_keys', $meta_keywords);
		$this -> set('meta_description', $meta_description);
		$this->set('title_of_layout',$data['Mission']['title']);
	}	
	public function view_all_news(){
		$this->layout = 'frontend';
		$this->paginate = array(
				'fields'=>array('id','title','created','category'),
				'conditions'=>array('News.status'=>'active'),
				'limit'=>15,
				'recursive'=>-1,
				'order'=>'News.created DESC'
		);
		
		$news = $this->paginate('News');
		
		
		$this->set('news',$news);
		
	}	
	
	public function view_all_mission(){
		$this->layout = 'frontend';
		$this->paginate = array(
				//'fields'=>array('id','title','created','category'),
				'conditions'=>array('Mission.status'=>'active'),
				'limit'=>15,
				'recursive'=>-1,
				'order'=>'Mission.created DESC'
		);
		
		$missions = $this->paginate('Mission');
		$total = count($missions);
		$i=1;
		foreach($missions as $highlighted_product){
			$item[] = $highlighted_product;
			if($i%3==0 || $i==$total){
				$datas[]['Item'] =  $item;
				$item= array();
			}
			

			$i++;
		}			
		
		$this->set('datas',$datas);
		
	}	
	public function view_all_notice(){
		$this->layout = 'frontend';
		$this->paginate = array(
				
				'conditions'=>array('Notice.status'=>'active'),
				'limit'=>15,
				'recursive'=>-1,
				'order'=>'Notice.created DESC'
		);
		
		$common = $this->paginate('Notice');
		//pr($common);die();
		
		$this->set('common',$common);
	
			}
	public function view_all_download(){
		$this->layout = 'frontend';
		$this->paginate = array(
				
				'conditions'=>array('Download.status'=>'active'),
				'limit'=>15,
				'recursive'=>-1,
				'order'=>'Download.created DESC'
		);
		
		$download = $this->paginate('Download');
		
		
		
		$this->set('download',$download);
	
			}
	
	public function view_all_admission(){
		
		$this->layout = 'frontend';
		$this->paginate = array(
				
				'conditions'=>array('Notice.status'=>'active','Notice.category'=>'admission'),
				'limit'=>15,
				'recursive'=>-1,
				'order'=>'Notice.created DESC'
		);
		
		$admission = $this->paginate('Notice');
		
		$this->set('admission',$admission);
			}
	public function view_all_seminar(){
		$this->paginate = array(
				'fields'=>array('title','slug','created'),
				'limit'=>15,
				'recursive'=>-1,
				'order'=>'Seminar.created DESC'
		);
		
		$data = $this->paginate('Seminar');
		$this->set('data',$data);
	}
	
	public function get_all_albums(){
		$this->layout = 'frontend';
		$data = $this->PhotoGallery->find(
			'all',
				array(
				'conditions'=>array('status'=>'active')
				)
		);
		
		$this->set('dataAlbum',$data);
	}
	
	
	public function get_all_album_photos($albul_id=null,$album_name=null){
		$this->layout = 'frontend';
		$data = $this->Photo->find(
			'all',
				array(
				'conditions'=>array('photo_gallery_id'=>$albul_id)
				)
		);
		$album_name = $this->PhotoGallery->find(
			'all',
				array(
				'conditions'=>array('id'=>$albul_id)
				)
		);
		
		$this->set('dataPhoto',$data);
		$this->set('album_title',$album_name[0]['PhotoGallery']['title']);
	}

	/*
	 * slug to id converter
	 */
	private function slug_to_id_converter($slug, $table_name) {

		 $id = $this -> $table_name -> find('list', 
							 array(
							 'fields' => array('id'),
							  'conditions' => array(
							  "{$table_name}.slug" => "{$slug}")
							  )
							 );
		return array_values($id);
	}
	
	/*
	 * slug to id converter
	 */
	private function slug_to_content_id_converter($slug, $table_name) {

		 $id = $this -> $table_name -> find('list', 
							 array(
							 'fields' => array('content_id'),
							  'conditions' => array(
							  "{$table_name}.slug" => "{$slug}")
							  )
							 );
		return array_values($id);
	}
}
?>
