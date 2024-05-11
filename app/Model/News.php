<?php
App::uses('AppModel', 'Model');
/**
 * News Model
 *
 */
class News extends AppModel {

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
		'type' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
			),
		),
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
		),
		'file'=>array(
			'rule'=>array('extension',array('doc','docx','pdf','zip','xl','xls','ppt','txt')),
			'message'=>'Insert valid image extension ("doc","docx","pdf","zip","xl","xls","ppt","txt").',
			'allowEmpty' => true,
		),
	);
	
	public function beforeSave($options=array()){

		if(isset($this->data['News']['title'])){
			$counter = $this->find('count',
				array(
					'conditions' => array(
						'News.title' => $this->data['News']['title']
						)
					)
				);
	
			$title_slug = Inflector::slug(strtolower($this->data['News']['title']),'-');
	
			if($counter == 0){
				$this->data['News']['slug'] = $title_slug;
			} else {
				$slug_ext = $counter +1;
				$this->data['News']['slug'] = "{$title_slug}-{$slug_ext}";
			}
		}
	
		return true;
	}

	public function geNews($limit=null){
		$today = date('Y-m-d');
		$results = $this->find(
			'all',
			array(
				'conditions'=>array(
					'News.status'=>'active',
					'News.start_date <='=>$today,
					'News.end_date >='=>$today,
				),
				'order'=>'News.start_date DESC',
				'limit'=>$limit,
			)
		);
		
		return $results;
		
	}
}
