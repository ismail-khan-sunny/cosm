<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Role $Role
 * @property Profile $Profile
 */
class User extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'id';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			
			'username' => array(
					'notEmpty' => array(
						'rule' => array('notEmpty'),
						'message' => 'User Name is required',
						'allowEmpty' => false,
					),
					'unique' => array(
						'rule'    => 'isUnique',
						'message' => 'This username has already been taken.'
					)
			),
			'password' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'message' => 'This field is required',
					'allowEmpty' => false,
				),
	            'minLength'=> array(
	            	 'rule' => array('minLength', 5),
	             	 'message' => 'Password must be at least 5 characters long.'
	           ), 										
			),
			'confirm_password' => array(
				'custom' => array(
					'rule' => array('password_repetition_check'),
					'message' => 'Password does\'nt match',
				),
				
			),
				
		);

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
			'Role' => array(
					'className' => 'Role',
					'foreignKey' => 'role_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);
	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasOne = array(
			'Profile' => array(
					'className' => 'Profile',
					'foreignKey' => 'user_id',
					'dependent' => true,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'exclusive' => '',
					'finderQuery' => '',
					'counterQuery' => ''
			)
	);

	/*
	 *  Captch Function 
	 */
	 
	function password_repetition_check($input_value){
		$data = $this->data;
		return $data['User']['password'] == $input_value['confirm_password'];
	}
	
	function matchCaptcha($inputValue){
		
		return $inputValue['captcha']==$this->getCaptcha(); //return true or false after comparing submitted value with set value of captcha
	}

	function setCaptcha($value)	{
		$this->captcha = $value; //setting captcha value
	}

	function getCaptcha()	{
		return $this->captcha; //getting captcha value
	}


	public function beforeSave($options = array()) {
		if(key_exists('password', $this->data['User'])){
			$this->data['User']['password'] = AuthComponent::password(
				$this->data['User']['password']
			);
		}
		
		return true;
	}

	public function getActiveMembers(){
		$members = $this->find('all',array('fields'=>array('User.id','Profile.first_name','Profile.last_name'),'conditions'=>array('User.status'=>'active')));
		return $members;
	}

	

}
