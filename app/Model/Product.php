<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Category $Category
 * @property Company $Company
 */
class Product extends AppModel {
 public $actsAs = array('Containable');
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	public $validate = array(
		
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
			),
		),
		'slug' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
				'allowEmpty' => true,
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Slug is already exist',
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
			'allowEmpty' => false,
		),
		
	);

	public function beforeSave($options=array()){
		if(empty($this->data['Product']['slug'])){
			if(isset($this->data['Product']['title'])){
				$counter = $this->find('count',
					array(
						'conditions'	=> array(
							'Product.title' => $this->data['Product']['title']
						)
					)
				);
				
				$title_slug = Inflector::slug(strtolower($this->data['Product']['title']),'-');
				
				if($counter == 0){
					$this->data['Product']['slug'] = $title_slug;
				} else {
					$slug_ext = $counter +1;
					$this->data['Product']['slug'] = "{$title_slug}-{$slug_ext}";
				}
				
				return true;
			}
		}
	}


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $hasMany = array(
		'ProductImage' => array(
			'className' => 'ProductImage',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'ProductImage.position ASC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		
	);
	   
}
