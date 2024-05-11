<?php
App::uses('AppModel', 'Model');
/**
 * RelatedLink Model
 *
 */
class RelatedLink extends AppModel {

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
		'url' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
				'allowEmpty' => false,
			),
			'url' => array(
				'rule' => array('url'),
				'message' => 'Insert Valid Url',
				'allowEmpty' => false,
			),
		),
		'image'=>array(
			'rule'=>array('extension',array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG')),
			'message'=>'Insert valid image extension ("jpg","jpeg","gif","png").',
			'allowEmpty' => true,
		),
	);
	/*
	function deleteRelatedImage($id){
		$image = $this->field('image',array('RelatedLink.id'=>$id));
		$dir = WWW_ROOT.$image;
		if(!empty($image) & file_exists($dir)){
			unlink($dir);
		}
		$this->updateAll(array('RelatedLink.image'=>'""'),array('RelatedLink.id'=>$id),false);
	}

	function beforeDelete($cascade = true){
		$id = $this->id;
		$this->deleteContentImage($id);
	}
	*/
}
