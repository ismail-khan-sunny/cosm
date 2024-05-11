<?php
App::uses('AppModel', 'Model');
/**
 * Mission Model
 *
 */
class Mission extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	public $validate = array(
		
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
			),
		),
		'status' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
			),
		),
		'image'=>array(
			'rule'=>array('extension',array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG')),
			'message'=>'Insert valid image extension ("jpg","jpeg","gif","png").',
			'allowEmpty' => true,
		)
	);
	public $belongsTo = array(
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);	

}
