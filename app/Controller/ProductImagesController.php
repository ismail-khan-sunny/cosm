<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * ProductImages Controller
 *
 * @property ProductImage $ProductImage
 * @property PaginatorComponent $Paginator
 */
class ProductImagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter(){
		parent::beforeFilter();
		
		$this->Auth->allow();
		
	}

	public function cron_image(){
		set_time_limit(0);
		$dir = new Folder(WWW_ROOT . 'img/frontend/product');
		$files = $dir->find('.*', true);
		// pr($files);
		// exit;

		$folder_path = WWW_ROOT . 'img/frontend/product';
		$saved_folder_path = WWW_ROOT . 'img/frontend/product/thumb';
		foreach($files as $file){
			$path = $folder_path.'/'.$file;
			$saved_path = $saved_folder_path.'/'.$file;
			pr($saved_path);

			$this->ImageUploader->resizeProductImage($path,$saved_path,array('width'=>390,'height'=>400));
		}
		exit;
	}
}
