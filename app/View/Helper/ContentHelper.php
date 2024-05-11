<?php
App::uses('AppHelper', 'View/Helper');
class ContentHelper extends AppHelper {

	public $helpers = array('Html', 'Form');

	/*
	 * generatePhotoGalleryById
	* @prams: $id is Photo Gallery Id
	*/

	public function generateContentById($id=null, $optionArray = null){
		if($id){
			//default settings
			$contentDivClass = 'widget';
			$contentDivId='';
			$contentTitle = true;
			if($optionArray){
				if(isset($optionArray['contentDivId']) and !empty($optionArray['contentDivId'])){
					$contentDivId = $optionArray['contentDivId'];
				}
				if(isset($optionArray['contentDivClass']) and !empty($optionArray['contentDivClass'])){
					$contentDivClass = $optionArray['contentDivClass'];
				}
				if(isset($optionArray['contentTitle'])){
					$contentTitle = $optionArray['contentTitle'];
				}
			}

			$dataArray = ClassRegistry::init('Content')->findById($id);
			return $this->generateContentHtml($dataArray, $contentDivId, $contentDivClass, $contentTitle);
		}
	}

	private function generateContentHtml($dataArray =null, $contentDivId='', $contentDivClass='', $contentTitle=true){
		if(is_array($dataArray) and !empty($dataArray)){
			$html = '';
			$html .= '<div id="'.$contentDivId.'" class="'.$contentDivClass.' '.$contentDivClass.'-default content-block '.$contentDivId.'-panel helper-div">';
			if($contentTitle){ //panel-title
				$html .= '<div class="'.$contentDivClass.'-heading capitalize content-heading  widget-header '.$contentDivId.'-heading "><h3 class="panel-title capitalize '.$contentDivId.'-panel-title ">'.$dataArray['Content']['title'].'</h3></div>';
			}
			$html .= '<div class="'.$contentDivClass.'-body content-body '.$contentDivId.'-body ">';
			if(isset($dataArray['Content']['image']) and !empty($dataArray['Content']['image'])){
				$html .= '<div class="col-md-4">';
				$html .= '<div class="thumbnail">'.$this->Html->image($dataArray['Content']['path'].'thumbnail/'.$dataArray['Content']['image']).'</div>';
				$html .= '</div>';
			}

			$html .= $dataArray['Content']['description'];
			$html .= '</div>'; //panel-body end

			$html .= '</div>'; //panel end
			return $html;

		}
	}




}