<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	
	function deleteCmsImageFile($model,$id,$field=null){
		
		if(empty($field)){
			$field = 'image';
		}
		
		$images['0'] = ClassRegistry::init($model)->field($field,array($model.'.id'=>$id));
		$images['1']=$large_image = str_replace('/thumb', '', $images['0']);
		
		foreach($images as $image){
			$dir = WWW_ROOT.$image;
			if(file_exists($dir)){
				unlink($dir);
			}
		}
		
	}
	
	function deletePreviousImage($path){
		$images['0'] = $path;
		$images['1'] = str_replace('/thumb', '', $images['0']);
		
		foreach($images as $image){
		$dir = WWW_ROOT.$image;
			if(file_exists($dir)){
				unlink($dir);
			}
		}
	}
}
