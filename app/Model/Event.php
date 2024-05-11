<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 */
class Event extends AppModel {

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
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
				'allowEmpty' => false,
			),
		),
		'start_date' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
				'allowEmpty' => false,
			),
		),
		'end_date' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
				'allowEmpty' => false,
			),
		),
	);
	
	public function beforeSave($options=array()){
		
		if(isset($this->data['Event']['title'])){
			$title_slug = Inflector::slug(strtolower($this->data['Event']['title']),'-');
			
			if(!empty($this->data['Event']['slug']) & $this->data['Event']['slug']==$title_slug){
				return true;
			}
			
			$counter = $this->find('count',
				array(
					'conditions' => array(
						'Event.title' => $this->data['Event']['title']
						)
					)
				);
	
			
	
			if($counter == 0){
				$this->data['Event']['slug'] = $title_slug;
			} else {
				$slug_ext = $counter +1;
				$this->data['Event']['slug'] = "{$title_slug}-{$slug_ext}";
			}
		}
	
		return true;
	}
}
