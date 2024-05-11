<?php
App::uses('AppHelper', 'View/Helper');
class PembrokeHelper extends AppHelper {

	public $helpers = array('Html', 'Form','Session');
	
	public function validImage($image=null){
		$img = 'no-image.png';
		if(!empty($image)){
			$img_path = WWW_ROOT.$image;
			if(file_exists($img_path)){
				$img = $image;
			}
		}
		return $img;
	}
	
}