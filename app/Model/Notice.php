<?php
App::uses('AppModel', 'Model');
/**
 * Notice Model
 *
 */
class Notice extends AppModel {

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
		'image'=>array(
			'rule'=>array('extension',array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG')),
			'message'=>'Insert valid image extension ("jpg","jpeg","gif","png").',
			'allowEmpty' => true,
		),
	);
	
	public function beforeSave($options=array()){
		
		if(isset($this->data['Notice']['title'])){
			$title_slug = Inflector::slug(strtolower($this->data['Notice']['title']),'-');
			
			if(!empty($this->data['Notice']['slug']) & $this->data['Notice']['slug']==$title_slug){
				return true;
			}
			
			$counter = $this->find('count',
				array(
					'conditions' => array(
						'Notice.title' => $this->data['Notice']['title']
						)
					)
				);
	
			
	
			if($counter == 0){
				$this->data['Notice']['slug'] = $title_slug;
			} else {
				$slug_ext = $counter +1;
				$this->data['Notice']['slug'] = "{$title_slug}-{$slug_ext}";
			}
		}
	
		return true;
	}
	
	function deleteNoticeImage($id){
		$image = $this->field('image',array('Notice.id'=>$id));
		$dir = WWW_ROOT.$image;
		if(!empty($image) & file_exists($dir)){
			unlink($dir);
		}
		$this->updateAll(array('Notice.image'=>'""'),array('Notice.id'=>$id),false);
	}

	function beforeDelete($cascade = true){
		$id = $this->id;
		$this->deleteNoticeImage($id);
	}
	
	public function geNotice($limit=null){
		$today = date('Y-m-d');
		$results = $this->find(
			'all',
			array(
				'conditions'=>array(
					'Notice.status'=>'active',
				),
				'order'=>'Notice.created DESC',
				'limit'=>$limit,
			)
		);
		
		return $results;
		
	}

	public function geMarqueeNotice($limit=null){
		$today = date('Y-m-d');
		$results = $this->find(
			'all',
			array(
				'conditions'=>array(
					'Notice.status'=>'active',
					'Notice.is_marquee'=>1,
				),
				'order'=>'Notice.created DESC',
				'limit'=>$limit,
			)
		);
		
		return $results;
		
	}
}
