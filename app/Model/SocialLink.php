<?php

App::uses('AppModel', 'Model');

/**

 * SocialLink Model

 *

 */

class SocialLink extends AppModel {



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

				'message' => 'This Field is required.',

				'allowEmpty' => false,

			),

		),

		'url' => array(

			'notEmpty' => array(

				'rule' => array('notEmpty'),

				'message' => 'This Field is required.',

				'allowEmpty' => false,

			),

			'url' => array(

				'rule' => array('url'),

				'message' => 'This Field is required.',

				'allowEmpty' => false,

			),

		),

		
		// 'image'=>array(

		// 	'rule'=>array('extension',array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG')),

		// 	'message'=>'Insert valid image extension ("jpg","jpeg","gif","png").',

		// 	'allowEmpty' => true,

		// ),

	);

	

	function deleteSocialLinkImage($id){

		$image = $this->field('image',array('SocialLink.id'=>$id));

		$dir = WWW_ROOT.$image;

		if(!empty($image) & file_exists($dir)){

			unlink($dir);

		}

		$this->updateAll(array('SocialLink.icon'=>'""'),array('SocialLink.id'=>$id),false);

	}



	function beforeDelete($cascade = true){

		$id = $this->id;

		$this->deleteSocialLinkImage($id);

	}

}

