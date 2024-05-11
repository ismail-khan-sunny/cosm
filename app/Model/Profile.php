<?php
App::uses('AppModel', 'Model');
/**
 * Profile Model
 *
 * @property User $User
 */
class Profile extends AppModel {

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
			
			
			'first_name' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'message' => 'This Field is required',
					'allowEmpty' => false,
				),
			),
			'image'=>array(
				'rule'=>array('extension',array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG')),
				'message'=>'Insert valid image extension ("jpg","jpeg","gif","png").',
				'allowEmpty' => true,
			),
							
		);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
			'User' => array(
					'className' => 'User',
					'foreignKey' => 'user_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);
	
	function beforeDelete($cascade = true){
		$id = $this->id;
		
		$this->deleteCmsImageFile($this->alias,$id);
	}	
}
