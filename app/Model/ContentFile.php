<?php
App::uses('AppModel', 'Model');
/**
 * ContentFile Model
 *
 * @property Cls $y
 * @property Content $Content
 */
class ContentFile extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed


/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Content' => array(
			'className' => 'Content',
			'foreignKey' => 'content_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required.',
				'allowEmpty' => false,	
			),
		),
		'content_file'=>array(
			'rule'=>array('extension',array('doc','docx','xls','txt','pdf','PDF')),
			'message'=>'Insert valid file extension ("doc","docx","xls","txt","pdf").',
			'allowEmpty' => true,
		),
	);

	public function beforeDelete($cascade = true){
		$file = $this->field('content_file',array('ContentFile.id'=>$this->id));
		if(file_exists(WWW_ROOT.$file)){
			unlink(WWW_ROOT.$file);
		}
	}
}
