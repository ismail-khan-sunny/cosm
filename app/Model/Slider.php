<?php
App::uses('AppModel', 'Model');
/**
 * Slider Model
 *
 * @property SliderContent $SliderContent
 */
class Slider extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'title';
	public $actsAs = array('Containable');

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			'id' => array(
					'uuid' => array(
							'rule' => array('uuid'),
							//'message' => 'Your custom message here',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
			),
			'title' => array(
					'notEmpty' => array(
							'rule' => array('notEmpty'),
							//'message' => 'Your custom message here',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
			),
			'type' => array(
					'notEmpty' => array(
							'rule' => array('notEmpty'),
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
			'SliderContent' => array(
					'className' => 'SliderContent',
					'foreignKey' => 'slider_id',
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
		
	public function getSliderWidthHeight($id){
		$result = $this->find(
			'first',
			array(
				'contain'=>false,
				'fields'=>array('Slider.width','Slider.height'),
				'conditions'=>array(
					'Slider.id'=>$id
				)
			)
		);
		return $result;
	}
	
	function deleteSliderContentImageFile($id){
		$slider_data = $this->SliderContent->find(
				'list',
			 array(
			 		'contain' => false,
			 		'fields' => array('SliderContent.id', 'SliderContent.image'),
			 		'conditions' => array('SliderContent.slider_id ' => $id),
			 		
			 )
		);
		
		foreach ($slider_data as $key => $value) {
			$this->deleteCmsImageFile('SliderContent',$key);
		}

	}
	
	function beforeDelete($cascade = true){
		$id = $this->id;
		
		$this->deleteSliderContentImageFile($id);
	}

}
