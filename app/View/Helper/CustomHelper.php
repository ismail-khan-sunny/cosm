<?php
App::uses('AppHelper', 'View/Helper');
class CustomHelper extends AppHelper {

	public $helpers = array('Html', 'Form','Session');
	
	public function canAccess($controller='',$action = ''){
		$user_info = $this->Session->read('Auth');
		$permission_list = array();
		if(isset($user_info['User']['role_id'])){
			if($this->Session->read('permission_list')){
				$permission_list = $this->Session->read('permission_list'); //set permission_list to session for checking access any place
			}else {
				$permission_list = $this->generatePermissionList($user_info['User']['role_id']);
				CakeSession::write('permission_list', $permission_list);
			}
			
			if(isset($user_info['User']['Role']['name']) and (strtolower($user_info['User']['Role']['name']) == 'admin')){
				return true;
			}else {
				$check_all = strtolower($controller.'_all');
				$check_action = strtolower($controller.'_'.$action);
				if(in_array($check_all,$permission_list)){
					return true;
				}elseif(in_array($check_action,$permission_list)){
					return true;
				}else{
					return false;
				}
			}
		}
	}
	public function getProductBrand($brand_id = null,$category_id=null){
		if(empty($category_id)){
			$category_id=$this->params['pass'][0];
		}
		$options = array(
				'conditions'=>array(
						'ProductBrand.brand_id'=>$brand_id,
						'Product.category_id'=>$category_id
				),
				'group'=>array('ProductBrand.product_id'),
		);
		$product = ClassRegistry::init('ProductBrand')->find('all',$options);
		// pr($product);
		// die();
		
		return $product;
	}
	public function getProductCompany($company_id = null){
		
		$options = array(
				'conditions'=>array(
						//'ProductBrand.brand_id'=>$brand_id,
						'Product.company_id'=>$company_id
				),
				'limit'=>'6',
				'order' => 'Product.created DESC'
		);
		$product = ClassRegistry::init('Product')->find('all',$options);
		// pr($product);
		//  die();
		
		return $product;
	}	
	public function getProduct($category_id = null){
		//$category_id='21';
		$data = classRegistry::init('Category')->find(
			'first',
			array(
				'conditions'=>array('Category.id'=>$category_id)
			)
		);
		
		//pr($data['Category']['parent_id']);die();
		if(empty($data['Category']['parent_id'])){
			$subcategory = classRegistry::init('Category')->find(
			'list',
				array(
					'fields'=>array('id'),
					'conditions'=>array('Category.parent_id'=>$category_id)
				)
			);
			//$subcategory[$category_id]=$data['Category']['title'];
			
		}
		$subcategory[]=$category_id;
		
		$options = array(
				'conditions'=>array(
						'Product.category_id'=>$subcategory,
						'Product.highlighted_product'=>'1'
				),
				'limit'=>'4',
				'order' => 'Product.order ASC'
		);
		$product = ClassRegistry::init('Product')->find('all',$options);
	
		//pr($product);
		//die();
		return $product;
	}	
	public function getallProduct(){
		
		$options = array(
				'limit'=>'5',
				'order' => 'Product.id DESC'
		);
		$products = ClassRegistry::init('Product')->find('all',$options);
	
		
		return $products;
	}
	protected function generatePermissionList($role_id = null){
		$permission_list = array();
		$options = array(
				'conditions'=>array(
						'Permission.role_id'=>$role_id
				)
		);
		$db_permission_data = ClassRegistry::init('Permission')->find('all',$options);
	
		if($db_permission_data){
			foreach ($db_permission_data as $key => $value) {
				$permission_list[] = strtolower($value['Dominion']['name'].'_'.$value['Process']['name']);
			}
		}
		return $permission_list;
	}


	public function persePhpCodeFromNsCode($html = ''){
		$html = str_replace("#ns-phpstart","<?php ",$html);	
		$html = str_replace("#ns-phpend"," ?>",$html);
		$html = str_replace("-&gt;","->",$html);

		$nsCode = explode('#ns-code#', $html);
		unset($nsCode[0]);
		$mainCode = array();
		$generateCode = array();
		foreach ($nsCode as $key => $value) {
			if(!empty($value)){		
				$code = explode(':', $value);			
				if(sizeof($code) > 2){
					$mainCode[] = $value;
					$generateCode[] = '<?php echo $this->'.$code[0].'->'.$code[1].'("'.$code[2].'"); ?>';			
				}
			}else{		
				unset($nsCode[$key]);
			}
		}
		foreach ($generateCode as $key => $value) {	
			$html = str_replace("#ns-code#".$mainCode[$key]."#ns-code#",$generateCode[$key],$html);	
		}

		

		return $html;
	}
	
	function getProcessData($datas,$role_id,$dominion_id,$process_id){
 		
		if(!empty($datas)){
			foreach($datas as $data){
				if($data['Permission']['role_id']==$role_id & $data['Permission']['dominion_id']==$dominion_id & $data['Permission']['process_id']==$process_id){
					
					return true;
				}
			}
			
		}
		return false;
 	}
	
	function authorizeMenuIsCheckedRole($role_id,$rolestr){
		if(!empty($rolestr)){
			$roles = explode('|',$rolestr);
			if(in_array($role_id, $roles)){
				return true;
			}
		}
		return false;
	}
	
	public function validImage($image){
		$img = 'no-image.png';
		if(!empty($image)){
			$path = WWW_ROOT.$image;
			if(file_exists($path)){
				$img = $image;
			}
		}
		return $img;
	}

	public function categoryWiseNotices($notices=null){
		$datas = array();
		foreach($notices as $notice){
			$notice_category = $notice['Notice']['category'];
			if(!empty($notice_category)){
				$datas[$notice_category][] = $notice;
			}
		}
		return $datas;
	}
	public function getFileIcon($path){
		$image = '';
		if(!empty($path)){
			$images = array(
				'doc'=>'/img/filetype/doc.png',
				'docx'=>'/img/filetype/doc.png',
				'xl'=>'/img/filetype/xl.png',
				'xls'=>'/img/filetype/xl.png',
				'pdf'=>'/img/filetype/pdf.png',
				'txt'=>'/img/filetype/txt.png',
				'zip'=>'/img/filetype/zip.png',
				'ppt'=>'/img/filetype/ppt.png',
			);
			$pathinfo = pathinfo($path);
			$extension = $pathinfo['extension'];
			$image = $images[$extension];
		}
		return $image;
	}	
public function getActiveSlug($slug){
		$active_slug = '';
		if(!empty($slug)){
			$menu = ClassRegistry::init('Menu')->find('first',array('conditions'=>array('Menu.slug'=>$slug)));

			if(!empty($menu)){
				if(!empty($menu['ParentMenu']['id'])){
					if($menu['ParentMenu']['parent_id']==0){
						$active_slug = $menu['ParentMenu']['slug'];
					}else{
						$active_slug = $this->getActiveSlug($menu['ParentMenu']['slug']);
					}
					
				}else{
					$active_slug = $menu['Menu']['slug'];
				}
			}
			
			
		}
		return $active_slug;
	}
	public function getCustomFunctionSlug($action){
		$active_slug = '';
		if(!empty($action)){
			$menu = ClassRegistry::init('Menu')->find('first',array('conditions'=>array('Menu.url LIKE'=>'%'.$action.'%')));
			
			if(!empty($menu)){
				if(!empty($menu['ParentMenu']['id'])){
					$active_slug = $menu['ParentMenu']['slug'];
				}else{
					$active_slug = $menu['Menu']['slug'];
				}
			}
		}
		return $active_slug;
	}
	public function categoryWiseNews($news=null){
		$datas = array();
		foreach($news as $datanews){
			$news_category = $datanews['News']['category'];
			if(!empty($news_category)){
				$datas[$news_category][] = $datanews;
			}
		}
		
		return $datas;
	}

		public function categoryWiseMission($mission=null){
			
		$datas = array();
		foreach($mission as $datanews){
			
			$news_category = $datanews['Mission']['category'];
			if(!empty($news_category)){
				$datas[$news_category][] = $datanews;
			}
		}
		
		return $datas;
	}
	public function valid_contact_Image($image,$type=null){
	
		$img = 'profile.jpg';
		if($type=='other'){
			$img = 'head-659651_960_720.png';
		}
		if($type=='news'){
			$img = 'no-image.png';
		}		
		if(!empty($image)){
			$path = WWW_ROOT.$image;
			if(file_exists($path)){
				$img = $image;
			}
		}
		return $img;
	}
}