<?php
App::uses('Component', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
class FileUploaderComponent extends Component {

	function uploadFile($config){
		
		$files=$config['file'];
		$uid=$config['id'];
		$path = $this->createPath($config['path']);
		$file_name = $this->createFileName($files,$uid);
		$file_path = $path.$file_name;
		
		if(move_uploaded_file($files['tmp_name'],WWW_ROOT.$file_path)){
			return $file_path;
		}
	}
	
	function createFileName($files,$uid=null){
		$pathinfo = pathinfo($files['name']);
		$extention = $pathinfo['extension'];
		
		$date = date('ymdhis');
		return $date_str = $uid."_".$date.".".$extention;
	}
	
	function createPath($path=null){
		$path_config = explode('/',$path);
		$count = count($path_config);
		$dir = WWW_ROOT.'/';
		foreach($path_config as $f){
			$count -- ;
			$dir .= $f;
			$folder = new Folder();
			$folder->create($dir);
			$dir .= '/';
		}
		
		return str_replace(WWW_ROOT, '', $dir);
	}
}
?>