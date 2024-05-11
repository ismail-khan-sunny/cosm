<?php
App::uses('AppModel', 'Model');
/**
 * Configuration Model
 *
 */
class Configuration extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'title';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			'image'=>array(
				'rule'=>array('extension',array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG')),
				'message'=>'Insert valid image extension ("jpg","jpeg","gif","png").',
				'allowEmpty' => true,
			),
			'title' => array(
				'notEmpty' => array(
						'rule' => array('notEmpty'),
						'message' => 'This Field is required',
						'allowEmpty' => false,
				),
			),
			'contact_email' => array(
				'email' => array(
					'rule' => array('email'),
					'message' => 'This Field is required',
					'allowEmpty' => false,
				),
			),
			'status' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'message' => 'Your custom message here',
					'allowEmpty' => false,
				),
			)
		);
}
