<?php
App::uses('AppModel', 'Model');
/**
 * SliderContent Model
 *
 * @property Slider $Slider
 */
class SliderContent extends AppModel {

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
			'Slider' => array(
					'className' => 'Slider',
					'foreignKey' => 'slider_id',
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
