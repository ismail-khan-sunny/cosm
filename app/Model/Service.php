<?php
App::uses('AppModel', 'Model');
/**
 * Service Model
 *
 */
class Service extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	public $validate = array(
		'image' => array(
			'rule'=>array('extension',array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG')),
			'message'=>'Insert valid image extension ("jpg","jpeg","gif","png").',
			'allowEmpty'=>true
		), 			
	);

}