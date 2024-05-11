<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Category $ParentCategory
 * @property User $User
 * @property Category $ChildCategory
 * @property Product $Product
 */
class Category extends AppModel {

	public $actsAs = array('Containable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	// public $validate = array(
		
		
	// 	'image'=>array(
	// 		'rule'=>array('extension',array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG')),
	// 		'message'=>'Insert valid image extension ("jpg","jpeg","gif","png").',
	// 		'allowEmpty' => true,
	// 	),
		
	// );
	public $belongsTo = array(
		'ParentCategory' => array(
			'className' => 'Category',
			'foreignKey' => 'parent_id',
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
		'ChildCategory' => array(
			'className' => 'Category',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'category_id',
			'dependent' => false,
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

	public function categoryList(){
		$categories = $this->find(
			'threaded',
			array(
				'recursive'=>-1,
				'fields'=>array('Category.id','Category.parent_id','Category.name'),
				/*'conditions'=>array('Category.parent_id'=>'')*/
			)
		);
		
		$categories = $this->recursiveCategoryList($categories);

		
		return $categories;
	}
	
	public function recursiveCategoryList($categories){
		static $categorylist = array ();

		static $level = 0;
		
		$level ++;
		
		if (isset($categories)) {
			
			foreach ($categories as $category) {

				if(!empty($category['children'])){
					$categorylist[$category['Category']['id']] = str_repeat('|__', $level -1) . $category['Category']['name'];
				}else{
					$categorylist[$category['Category']['id']] = str_repeat('|__', $level -1) .'|__'. $category['Category']['name'];
				}

				$this->recursiveCategoryList($category['children']);
				
			}
		}
		
		$level --;
		
		return $categorylist;
	}

}
