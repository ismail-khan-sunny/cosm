<?php
App::uses('AppModel', 'Model');
/**
 * Career Model
 *
 * @property PositionApply $PositionApply
 */
class Career extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
public $validate = array(
		'file'=>array(
			'rule'=>array('extension',array('doc','docx','pdf','zip','xl','xls','ppt','txt')),
			'message'=>'Insert valid image extension ("doc","docx","pdf","zip","xl","xls","ppt","txt").',
			'allowEmpty' => true,
		)
		
	);
	public $belongsTo = array(
		'PositionApply' => array(
			'className' => 'PositionApply',
			'foreignKey' => 'position_apply_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
