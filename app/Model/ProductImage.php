<?php
App::uses('AppModel', 'Model');
/**
 * ProductImage Model
 *
 */
class ProductImage extends AppModel {
	public $validate = array(
		'image'=>array(
			'rule'=>array('extension',array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG')),
			'message'=>'Insert valid image extension ("jpg","jpeg","gif","png").',
			'allowEmpty' => true,
		),
	);
	public function getProductDelete($product_id=null){
		$product="";
		$results = $this->find(
			'all',
			array(
				'conditions'=>array(
					'ProductImage.product_id'=>$product_id,
				)
			)
		);
		if(!empty($results)){
			// pr($results);
			// die();
			foreach($results as $key1 => $value1){
			 	$product = $this->product_delete_indivisual($value1);
			}
		}
		// $product = $this->productall($product,$limit);
		return $product;
	}	
  	public function product_delete_indivisual($product){
  		
  		if(file_exists(WWW_ROOT.$product['ProductImage']['image'])){
			unlink(WWW_ROOT.$product['ProductImage']['image']);
		}
		$main_image = str_replace('/thumb','', $product['ProductImage']['image']);
		if(file_exists(WWW_ROOT.$main_image)){
			unlink(WWW_ROOT.$main_image);

		}
		$this->delete($product['ProductImage']['id']);
  		return true;
	}	
}
