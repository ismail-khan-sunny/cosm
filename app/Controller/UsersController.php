<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator');
	public $uses = array('User','Configuration');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('forgot_password','reset_password');	
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->User->recursive = 0;
		if($this->request->is('post')){
			$searchdata = $this->request->data;
			
			if(!empty($searchdata['Search']['fieldname']) & !empty($searchdata['Search']['value'])){
				$conditions[] = array($searchdata['Search']['fieldname']=>$searchdata['Search']['value']);
			}
		}
		$conditions[] = array('User.status'=>'active');
		
		$this->paginate = array(
			'conditions'=>$conditions
		);
		$this->set('users', $this->Paginator->paginate());
	}
	
	
	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			//$this->uploadValidImage('Profile','image','img/frontend/members',array('width'=>'150','height'=>'180'));
			
			$this->User->create();
			if ($this->User->saveAssociated($this->request->data)) {
				$last_insert_id = $this->User->getLastInsertID();
				
				$this->Session->setFlash(__('The user has been saved. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view',$last_insert_id));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			//$this->uploadValidImage('Profile','image','img/frontend/members',array('width'=>'150','height'=>'180'));
			
			if($this->User->Profile->validates($this->request->data)){
				if ($this->User->saveAll($this->request->data)) {
					$this->Session->setFlash(__('The user has been saved.'), 'alert_success');
					return $this->redirect(array('action' => 'view',$id));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert_error');
				}
			}else{
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert_error');
			}
			
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again. <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'), 'default', array('class' => 'alert alert-success'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_login() {
		
			return $this->redirect('/login');
	}
		
	public function login() {
		/*if ($this->Auth->login()) {
			return $this->redirect($this->Auth->redirect());
		}*/
		
		$this->layout = 'login';
		if ($this->request->is('post')) {
			
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Your username or password was incorrect.'),'alert_error');
		}
		$login_data=$this->Auth->user();
		if(!empty($login_data))
		{
		$this->Session->destroy();

		}
		
	}
	
	public function logout() {
		if ($this->Auth->logout()) {
			$this->Session->destroy();
			return $this->redirect(array('controller'=>'users', 'action'=>'login'));
		}
	}
	
	public function admin_change_password(){
		if($this->request->is('post'))
		{
			$post_data = $this->request->data;
			$user_id = $this->Auth->user('id');
			/*pr($post_data);
			pr($this->User->field('password',array('User.id'=>$user_id)));
			pr($this->User->field('password',array('User.id'=>$user_id)));*/
			
			if($this->User->field('password',array('User.id'=>$user_id))==AuthComponent::password($post_data['User']['old_password'])){
				$data = array('id'=>$user_id,'password'=>$post_data['User']['password'],'confirm_password'=>$post_data['User']['confirm_password']);
				if($this->User->save($data)){
					$this->Session->setFlash('Successfully changed your password.','alert_success');
					$this->redirect(array('controller'=>'users','action'=>'admin_change_password'));
				}
			}else{
				$this->Session->setFlash('Your old password does\'nt match. ','alert_error');
				$this->redirect(array('controller'=>'users','action'=>'admin_change_password'));
			}
				
		}		
		
	}


	public function forgot_password() {

		$this->layout = 'login';
		$site_config = $this -> Configuration -> find('first');
		$admin_email=$site_config['Configuration']['contact_email'];
		$random_number = rand(500,10000);
		if($this->request->is('post')){
			$data =$this->request->data;
			$user_info =$this->User->find(
				'first',
					array(
					'conditions'=>array(
						'User.email'=>$data['User']['email']
					)
				)
			);				

		if(!empty($user_info)){
			$user_id = $user_info['User']['id'];		
			$user_email = $user_info['User']['email'];			
			 $datas = array('id'=>$user_id,'verified_code'=>$random_number);			
				if($this -> User -> save($datas)){					
					$this->sent_my_mails(
							array(
								'to'=>$user_email,
								'from_email'=>$site_config['Configuration']['contact_email'],
								'from_name'=>$site_config['Configuration']['title'],
								'subject'=>'Reset forgot password',
								'template'=>'forgot_password',
								'data' =>array(
										'user_id'=>$user_id,
										'activation_code'=>$random_number						
								)
							)
					);
					
					$this -> Session -> setFlash('Check your email to reset password !<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','default',array('class'=>'alert alert-success'));
					$this->redirect(array('controller'=>'users','action'=>'forgot_password'));
				}
				
			}else{
				
				$this -> Session -> setFlash('You are not a valid user! Try again later<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','default',array('class'=>'alert alert-danger'));
				$this->redirect(array('controller'=>'users','action'=>'forgot_password'));				
			}
						
		}
	$this->set('title_for_layout','Forgot password');
	}

	public function reset_password($user_id=null,$rand_code=null){
		
		$this->layout = 'login';
		if($this->request->is('post')){
			$post_data = $this->request->data;
			
			$verify_data = $this->User->find(
				'all',
					array(
					'conditions'=>array('User.id'=>$user_id,'User.verified_code'=>$post_data['User']['rand_number'])
					)
			);
			
			if(!empty($verify_data)){
				$data = array('id'=>$user_id,'password'=>$post_data['User']['password'],'verified_code'=>'');
				if($this->User->save($data)){
					$this->Session->setFlash('Successfully changed your password.','alert_success');
					$this->redirect(array('controller'=>'users','action'=>'login'));
				}else{
					$this->Session->setFlash('Password not changed.Please try again later. ','alert_error');
					$this->redirect(array('controller'=>'users','action'=>'login'));
				}
			}else{
				$this->Session->setFlash('Your verify code doesn\'t match, Please click on the provided link on your email!.','alert_error');
				$this->redirect(array('controller'=>'users','action'=>'login'));
			}
		}
		
		$this->set('rand_num',$rand_code);	
		$this->set('title_for_layout','Reset password');
		
  	}
	
	
}
