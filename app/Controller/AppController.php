<?php
App::uses('Controller', 'Controller','RequestHandler','Session');
class AppController extends Controller {
	public $helpers = array('Html', 'Form');
	
	protected $status = array(
			'active'=>'Active',
			'inactive'=>'Inactive',
	);
	
	protected $contentType = array(
			'about_text'=>'About Text ',
			'welcome_text'=>'Welcome Text ',
			'testimonials'=>'Testimonials ',
			'service_text'=>'Service Text ',
			'competitive'=>'Competitive Advantages ',
			'carrer'=>'Carrer',
			
	);	
	
	protected $Social_type = array(
			'image'=>'Image',
			'icon'=>'Icon',
	);
	protected $Type = array(
			'mission'=>'mission',
			'vission'=>'vission',
			'core_values'=>'core_values',
			'objective'=>'objective',
			
			
	);
	protected $contentStatus = array(
			'published'=>'Published',
			'unpublished'=>'Unpublished'
	);
	protected $menuType = array(
			'content'=>'Content',
			'external_link'=>'External Link',
			'file'=>'File'
	);
	protected $menuPosition = array(
			'header'=>'Header',
			'footer'=>'Footer'
	);
	
	protected $userStatus = array(
			'active'=>'Active',
			'inactive'=>'Inactive',
			'block'=>'Block'
	);

	protected $newsCategory = array(
		'News'=>'News',
		'Event'=>'Event',
		'Press'=>'Press'
	);

	protected $noticeCategory = array(
		'Common'=>'Common',
		'Routine'=>'Routine',
		'Result'=>'Result',
		
	);
	
	

	public $components = array(
		'Session',
		'PermissionCheck',
		'ImageUploader',
		'FileUploader',
		'Auth' => array(
				'loginRedirect' => array('controller' => 'dashboard', 'action' => 'index','prefix'=>'admin', 'admin'=>true),
				'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
				'authorize' => array('Controller') // Added this line
		)
	);


	public function beforeFilter(){
		$this->Auth->allow('index', 'view','login','logout','get_process');
		
		if ($this->Auth->user('id')) {
			
			$this->set('logged_user', $this->Auth->user());
			$this->set('loggedIn', true);
			if (empty($this->params['prefix'])) {
				$this->layout = 'frontend';
			} else if($this->params['prefix'] == 'admin') {
				$this->layout = 'default';
			}

		}
		//$this->Session->destroy();
		$this->get_menu_data();
		$this->getSiteInfo();
		$this->set('marquee',ClassRegistry::init('Notice')->geMarqueeNotice($limit=5));
		$this->set('status',$this->status);
		$this->set('newsCategory',$this->newsCategory);
		$this->set('noticeCategory',$this->noticeCategory);
		$this->set('contentType',$this->contentType);
		$this->set('menuType',$this->menuType);
		$this->set('Type',$this->Type);
		$this->set('menuPosition',$this->menuPosition);
		$this->set('userStatus',$this->userStatus);
		$this->set('contentStatus',$this->contentStatus);
		$this->set('SocialLink_type',$this->Social_type);
		$this->getAdminMenu($this->Auth->user('role_id'));
		$getmenu=ClassRegistry::init('AuthorizedMenu')->contain(array('Dominion','Process'));
		$social_data = array();
		if($this->Session->read('social_data')){
			$social_data = $this->Session->read('social_data'); //set menu data from session

		}else {
			foreach($this->menuPosition as $key => $value){
					$social_data[$key] = ClassRegistry::init('SocialLink')->find('all',array('conditions'=>array('type'=>$key),'limit'=>8));
			}
		    $this->Session->write('social_data', $social_data);
		}
		$this->set('social_data',$social_data);

		$about_text = array();
		if($this->Session->read('about_text')){
			$about_text = $this->Session->read('about_text'); //set menu data from session

		}else {
			$about_text = ClassRegistry::init('Content')->find('first',array('contain'=>false,'conditions'=>array('Content.type'=>'about_text','Content.status'=>'published')));
		    $this->Session->write('about_text', $about_text);
		}
		$this->set('about_text',$about_text);


		$category_text = array();
		if(!$this->Session->read('category_text')){
			$category_text = $this->Session->read('category_text'); //set menu data from session

		}else {
			$category_text = ClassRegistry::init('Category')->find('list',array('contain'=>false,'conditions'=>array('Category.status'=>'active')));
		    $this->Session->write('category_text', $category_text);
		}//pr($category_text);die();
		$this->set('category_text',$category_text);
	}

	private function getAdminMenu($role_id=null){
		$admin_menu_data = array();
		
		if($this->Session->read('admin_menu_data')){
			$admin_menu_data = $this->Session->read('admin_menu_data'); //set menu data from session
		}else {
			ClassRegistry::init('AuthorizedMenu')->contain(array('Dominion','Process'));
			$admin_menu_data = ClassRegistry::init('AuthorizedMenu')->find(
					'threaded',
					array(
							'recursive'=>-1,
							'conditions'=>array(
									'AuthorizedMenu.status' => 'Active',
									'AuthorizedMenu.role_id' => $role_id
							),
							'order'=>array('AuthorizedMenu.position ASC')
					)
			);
			$this->Session->write('admin_menu_data',$admin_menu_data);
		}
		
		$this->set('admin_menu_data',$admin_menu_data);
	}

	protected function getSiteInfo(){
		$site_data = array();
		if($this->Session->read('site_data')){
			$site_data = $this->Session->read('site_data'); //set menu data from session
		}else {
			$site_data = ClassRegistry::init('Configuration')->find('first');
			$this->Session->write('site_data', $site_data);
		}
		$this->set('title_for_layout',$site_data['Configuration']['title']);
		
		$this->set('site_data',$site_data);
	}
	
	public function isAuthorized($user){
		$this->getSiteInfo();
		$this->getAdminMenu($user['role_id']);
		$this->set('role_id',$user['role_id']);
		
		$canAccess = $this->PermissionCheck->checkPermission($user,$controller = $this->params['controller'],$action = $this->params['action']);
		if($this->Session->read('permission_list')){
			$this->layout = 'admin';
			$this->set('permission_list', $this->Session->read('permission_list'));
		}
		if($canAccess){
			return true;
		}else{
			$this->Session->setFlash(__('You are not Authorized Persion for this Action. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			$this->redirect($this->referer());
			
		}
	}

	/*
	sendMailWithAttachment for send email with attachment file.
	*/

	function sendMailWithAttachment($template = 'default', $to_email = null, $from_email = null, $subject = '', $contents='', $file=null) {        
		App::uses('CakeEmail', 'Network/Email');
		$my_mail = new CakeEmail();
		$my_mail->template($template);
		$my_mail->emailFormat('html');
		$my_mail->helpers(array('Html'));

		$my_mail->from(array($from_email => $contents['sender']));
		$my_mail->to($to_email);
		$my_mail->subject($subject);
		$my_mail->viewVars(array('contents'=>$contents));

		if($file){			
			$my_mail->attachments(array($file['name'] => $file['tmp_name']));	
		}		
		
        if ($my_mail->send()) {
            return true;
        }
        return false;
    }

	/*
	send Mail Function.
	*/

	function sent_my_mails($options = array()) {
		
		App::uses('CakeEmail', 'Network/Email');
	
		$my_mail = new CakeEmail();
		$my_mail -> to($options['to']);
		$my_mail -> from(array($options['from_email'] => $options['from_name']));
		$my_mail -> subject($options['subject']);
		$my_mail -> template($options['template']);
		$my_mail -> emailFormat('html');
		$my_mail -> viewVars($options['data']);
		$my_mail -> send();

	}

    

    function setErrorLayout() {
    	if ($this->name == 'CakeError') { 
    		if($this->request->is('ajax')){
    			echo '<div class="alert alert-danger show" id="flashMessage">Page Not Found!!! <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>';
    			exit;
    		}else{			
    			$this->layout = 'frontend';

				if ($this->Auth->user('id')) {					
					if (empty($this->params['prefix'])) {
						$this->layout = 'frontend';
					} else if($this->params['prefix'] == 'admin') {
						$this->layout = 'default';
					}
				}
    		}  
    		
    	}
    }

    function beforeRender () {
    	//$this->setErrorLayout();
    }

    function uploadValidImage($model,$field,$path,$size=array()){
    	$data = $this->request->data;
		
		$ModelClass = ClassRegistry::init($model);
		$valid_ext = $ModelClass->validate[$field]['rule']['1'];
		
		if($data[$model][$field]['size']>0){
			
			// Delete Previous image if exist
			if(array_key_exists('pre_'.$field, $data[$model]) & !empty($data[$model]['pre_'.$field])){
				$this->$model->deletePreviousImage($data[$model]['pre_'.$field]);
			}

			$pathinfo = pathinfo($data[$model][$field]['name']);
			if(in_array($pathinfo['extension'], $valid_ext)){
				$config = array(
					'id'=>$model.'_'.$field,
					'file'=>$data[$model][$field],
					'path'=>$path,
					'resize'=>$size
				);
				$this->request->data[$model][$field] = $this->ImageUploader->uploadImage($config);
			}else{
				$this->request->data[$model][$field]=$data[$model][$field]['name'];
				//$this->request->data['Content']['image']=$data['Content']['image']['name'];
			}
			
		}elseif($data[$model][$field]['error']==1){
			$this->request->data[$model][$field] = 'error.error';
			$this->$model->validate[$field]['message'] = 'This is error file. Upload another file';
		}else{
			$this->request->data[$model][$field] = $data[$model]['pre_'.$field];
		}
    }

	function uploadValidFile($model,$field,$path){
		$data = $this->request->data;
		
		$ModelClass = ClassRegistry::init($model);
		$valid_ext = $ModelClass->validate[$field]['rule']['1'];

		if($data[$model][$field]['size']>0){
			
			// Delete Previous image if exist
			/*
			if(array_key_exists('pre_'.$field, $data[$model]) & !empty($data[$model]['pre_'.$field])){
				
				$this->$model->deletePreviousFile($data[$model]['pre_'.$field]);
			}
			*/

			$pathinfo = pathinfo($data[$model][$field]['name']);
			if(in_array($pathinfo['extension'], $valid_ext)){
				$config = array(
					'id'=>$model.'_'.$field,
					'file'=>$data[$model][$field],
					'path'=>$path,
				);
				$this->request->data[$model][$field] = $this->FileUploader->uploadFile($config);
			}else{
				$this->request->data[$model][$field]=$data[$model][$field]['name'];
				//$this->request->data['Content']['image']=$data['Content']['image']['name'];
			}
			
		}elseif($data[$model][$field]['error']==1){
			$this->request->data[$model][$field] = 'error.error';
			$this->$model->validate[$field]['message'] = 'This is error file. Upload another file';
		}else{
			$this->request->data[$model][$field] = $data[$model]['pre_'.$field];
		}
		
	}

	private function get_menu_data(){
		$menu_data = array();
		foreach($this->menuPosition as $key => $value){
				$menu_data[$key] = ClassRegistry::init('Menu')->find('threaded',
				 array('conditions'=>array('position'=>$key,'status' => 'active'),'recursive'=>-1,'order'=>'Menu.order ASC'));
				 $menu_data['header'] = $this->headerMenuMargeWithCategory($menu_data['header']);
		}
		//pr($menu_data);die();
		$this->set('menu_data',$menu_data);
		
	}
    public function headerMenuMargeWithCategory($header_menus){

        foreach($header_menus as $key=>$menu){
            if($menu['Menu']['id']=='58db4f36-d780-41aa-a67e-65948f5f54cb'){
                $header_menus[$key]['children'] = $this->categoryToMenu();
            }
        }
        return $header_menus;
    }
    public function categoryToMenu(){
        $categories =  ClassRegistry::init('Category')->find(
			'threaded',
			array(
				'recursive'=>-1,
				'fields'=>array('Category.id','Category.parent_id','Category.name','Category.id'),
				'order'=>array('Category.order ASC')
				/*'conditions'=>array('Category.parent_id'=>'')*/
			)
		);
		
        $data = array();
        $i=0;
        foreach($categories as $slug=>$cat_menu){
            $data[$i]['Menu'] = array(
            	    'id'=>$cat_menu['Category']['id'],
                    'parent_id'=>'',
                    'type'=>'external_link',
                    'title'=>$cat_menu['Category']['name'],
                    'slug'=>$slug,
                    'url'=>'/categories/view/'.$cat_menu['Category']['id']
            );
            $i++;
        }
      //  pr($data);die();
        return $data;
    }


}
