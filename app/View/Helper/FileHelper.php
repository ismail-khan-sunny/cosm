<?php
App::uses('AppHelper', 'View/Helper');
class FileHelper extends AppHelper {

	public $helpers = array('Html', 'Form');

	/*
	 *
	*/

	public function generateFileListById($id, $optionArray=null){
		if($id){
			//default settings
			$fileId ='';
			$wrapElement = 'div';
			$elementClass = '';

			if($optionArray){
				if(isset($optionArray['fileId']) and !empty($optionArray['fileId'])){
					$fileId = $optionArray['fileId'];
				}
				if(isset($optionArray['wrapElement']) and !empty($optionArray['wrapElement'])){
					$wrapElement = $optionArray['wrapElement'];
				}
				if(isset($optionArray['elementClass']) and !empty($optionArray['elementClass'])){
					$elementClass = $optionArray['elementClass'];
				}
			}

			$dataArray = ClassRegistry::init('FileManager')->findById($id);
			return $this->generateFileList($dataArray,$fileId,$wrapElement,$elementClass);
		}
			
	}
	public function generateFileList($dataArray = null, $fileId ='',$wrapElement = 'div', $elementClass = 'btn btn-link', $fileTitle =true){
		if(is_array($dataArray)){
			$html ='';

			/*
			$html .= '<div id="" class="panel panel-default '.$fileId.'-panel">';
			if($fileTitle){
				$html .= '<div class="panel-heading capitalize '.$fileId.'-heading "><h3 class="panel-title capitalize '.$fileId.'-panel-title ">Related Files</h3></div>';
			}
			$html .= '<div class="panel-body '.$fileId.'-body ">';
			*/
			
			$html .= '<'.$wrapElement.' id="'.$fileId.'" class="file ">';
			$html .= '<a target="_blank" class="file-link '.$elementClass.'" href="'.$this->webroot.$dataArray['FileManager']['path'].'">';
			$html .= $dataArray['FileManager']['name'];
			$html .= '</a>';
			$html .= '</'.$wrapElement.'>';
			
			//$html .= '</div>';
			//$html .= '</div>';
			return $html;
		}
	}

}
