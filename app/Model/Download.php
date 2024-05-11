<?php
App::uses('AppModel', 'Model');
/**
 * Download Model
 *
 */
class Download extends AppModel {

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
		
		'file'=>array(
			'rule'=>array('extension',array('doc','docx','pdf','zip','xl','xls','ppt','txt')),
			'message'=>'Insert valid image extension ("doc","docx","pdf","zip","xl","xls","ppt","txt").',
			'allowEmpty' => true,
		),
	);

}
