<?php
App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Content Model
 *
 */
class Content extends AppModel {

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
			),
		),
		
		'description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),							
			),
		),
		'status' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),	
			),
		),
		'image'=>array(
			'rule'=>array('extension',array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG')),
			'message'=>'Insert valid image extension ("jpg","jpeg","gif","png").',
			'allowEmpty' => true,
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
public $belongsTo = array(
	'Menu' => array(
		'className' => 'Menu',
		'foreignKey' => 'menu_id',
		'conditions' => '',
		'fields' => '',
		'order' => ''
	)
);

/**
 * hasMany associations
 *
 * @var array
 */
public $hasMany = array(
		'ContentFile' => array(
			'className' => 'ContentFile',
			'foreignKey' => 'content_id',
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


public function beforeSave($options=array()){

	if(isset($this->data['Content']['title'])){
		$counter = $this->find('count',
			array(
				'conditions' => array(
					'Content.title' => $this->data['Content']['title']
					)
				)
			);

		$title_slug = Inflector::slug(strtolower($this->data['Content']['title']),'-');

		if($counter == 0){
			$this->data['Content']['slug'] = $title_slug;
		} else {
			$slug_ext = $counter +1;
			$this->data['Content']['slug'] = "{$title_slug}-{$slug_ext}";
		}
	}

	return true;
}
	function deleteContentImage($id){
		$image = $this->field('image',array('Content.id'=>$id));
		$dir = WWW_ROOT.$image;
		if(!empty($image) & file_exists($dir)){
			unlink($dir);
		}
		$this->updateAll(array('Content.image'=>'""'),array('Content.id'=>$id),false);
	}

	function beforeDelete($cascade = true){
		$id = $this->id;
		$this->deleteContentImage($id);
	}
}
