<?php
App::uses('AppModel', 'Model');
/**
 * Menu Model
 *
 * @property Menu $ParentMenu
 * @property Content $Content
 * @property Menu $ChildMenu
 */
class Menu extends AppModel {

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
		'file'=>array(
			'rule'=>array('extension',array('doc','docx','pdf','zip','xl','xls','ppt','txt')),
			'message'=>'Insert valid image extension ("doc","docx","pdf","zip","xl","xls","ppt","txt").',
			'allowEmpty' => true,
		),	
		
		'status' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field is required',
				'allowEmpty' => false,
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentMenu' => array(
			'className' => 'Menu',
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
		'Content' => array(
			'className' => 'Content',
			'foreignKey' => 'menu_id',
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
		'ChildMenu' => array(
			'className' => 'Menu',
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
		)
	);


	public function beforeSave($options=array()){
		if(isset($this->data['Menu']['title'])){
			$counter = $this->find('count',
				array(
					'conditions'	=> array(
						'Menu.title' => $this->data['Menu']['title']
					)
				)
			);
			
			$title_slug = Inflector::slug(strtolower($this->data['Menu']['title']),'-');
			
			if($counter == 0){
				$this->data['Menu']['slug'] = $title_slug;
			} else {
				$slug_ext = $counter +1;
				$this->data['Menu']['slug'] = "{$title_slug}-{$slug_ext}";
			}
			
			return true;
		}
	}


	public function fileDelete($id=null){
		$image_url = $this->field('bannar',array('Menu.id'=>$id));
		$root_image_url = str_replace('thumb/', '', $image_url);
		
		if(!empty($root_image_url)){
			$file = new File(WWW_ROOT.$root_image_url, true, 0644);
            $file_delete = $file->delete();
		}
		
		if(!empty($image_url)){
            $file = new File(WWW_ROOT.$image_url, true, 0644);
            $file_delete = $file->delete();
        }
        return true;
	}
	
	public function getMenuList(){
		$menus = $this->find(
					'all',
					array(
						'contain'=>array(
							'ChildMenu',
						),
						'fields'=>array('Menu.id','Menu.title'),
						'conditions'=>array('Menu.parent_id'=>'')
					)
				);
		
		
		$menus = $this->recursiveMenuList($menus);
		
		return $menus;
	}
	
	public function recursiveMenuList($datas){
		static $menulist = array ();

		static $level = 0;
		
		$level ++;
		
		if (isset($datas)) {
			
			foreach ($datas as $menu) {
				
				if(key_exists('Menu', $menu)){
					$menulist[$menu['Menu']['id']] = str_repeat('', $level -1) . $menu['Menu']['title'];
				}else{
					$menulist[$menu['id']] = str_repeat(' ', $level -1) .' ----'. $menu['title'];
				}
				
				if(!empty($menu['ChildMenu'])){
					$this->recursiveMenuList($menu['ChildMenu']);
				}
			}
		}
		
		$level --;
		
		return $menulist;
	}


	public function getFrontPageMenu($ids=null){
		$datas = array();

		$datas = $this->find(
			'threaded',
			array(
				'conditions'=>array('Menu.status' => 'active','Menu.id'=>$ids),
			)
		);

		return $datas;
	}

}
