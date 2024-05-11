<?php
App::uses('AppHelper', 'View/Helper');
class NewsHelper extends AppHelper {

	public $helpers = array('Html', 'Form');

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
}