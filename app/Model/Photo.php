<?php
App::uses('AppModel', 'Model');
/**
 * Photo Model
 *
 * @property PhotoGallery $PhotoGallery
 */
class Photo extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'photo_gallery_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),

		'status' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'image' => array(
			'rule'=>array('extension',array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG','doc','docx','DOC','DOCX','pdf','pdf')),
			'message'=>'Insert valid image extension ("jpg","jpeg","gif","png").',
			'allowEmpty'=>true
		), 			
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PhotoGallery' => array(
			'className' => 'PhotoGallery',
			'foreignKey' => 'photo_gallery_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
