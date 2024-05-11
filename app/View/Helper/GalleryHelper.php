<?php
App::uses('AppHelper', 'View/Helper');
class GalleryHelper extends AppHelper {

	public $helpers = array('Html', 'Form');

	/*
	 * generatePhotoGalleryById
	* @prams: $id is Photo Gallery Id
	*/

	public function generatePhotoGalleryById($id=null, $optionArray = null){
		if($id){
			//default settings
			$caption = true;
			$thumbnailColClass = 'photo-gallery col-xs-4 col-md-3';
			$galleryId='';
			$galleryTitle = true;
			if($optionArray){
				if(isset($optionArray['galleryId']) and !empty($optionArray['galleryId'])){
					$galleryId = $optionArray['galleryId'];
				}
				if(isset($optionArray['thumbnailColClass'])){
					$thumbnailColClass = $optionArray['thumbnailColClass'];
				}
					
				if(isset($optionArray['controls'])){
					$controls = $optionArray['controls'];
				}
					
				if(isset($optionArray['caption'])){
					$caption = $optionArray['caption'];
				}
				if(isset($optionArray['galleryTitle'])){
					$galleryTitle = $optionArray['galleryTitle'];
				}

			}

			$data = ClassRegistry::init('PhotoGallery')->findById($id);
			return $this->photoGallery($data, $galleryId, $caption, $thumbnailColClass,$galleryTitle);
		}
	}

	/*
	 * PhotoGallery for generate photo gallery
	* @prams: $dataArray
	*/

	private function photoGallery($dataArray=null, $galleryId='', $caption=true, $thumbnailColClass = 'col-xs-6 col-md-3 ',$galleryTitle = true){
		if(is_array($dataArray) and !empty($dataArray)){
			$html = '';
			$html .= '<div id="'.$galleryId.'" class="panel panel-default '.$galleryId.'-panel helper-div">';
			if($galleryTitle){
				$html .= '<div class="panel-heading capitalize '.$galleryId.'-heading "><h3 class="panel-title capitalize '.$galleryId.'-panel-title ">'.$dataArray['PhotoGallery']['title'].'</h3></div>';
			}
			$html .= '<div class="panel-body '.$galleryId.'-body ">';
			$html .= '<div class="gallery '.$galleryId.'-gallery ">';
			foreach($dataArray['Photo'] as $key => $value){
				$html .= '<div class="'.$thumbnailColClass.' '.$galleryId.'-colum "><div class="thumbnail photoGallery-thumbnail '.$galleryId.'-thumbnail">';
					
				$html .= $this->Html->image($value['path'].'/thumbnail/'.$value['image'], array('class'=> 'photoGallery-image '.$galleryId.'-image'));
				if($caption){
					$html .= '<div class="caption photoGallery-caption '.$galleryId.'-caption">';


					$html .= '<h3 class="photoGallery-title '.$galleryId.'-title">';
					if(isset($value['title']) and !empty($value['title'])){
						$html .= $value['title'].'&nbsp;';
					}
					$html .= '</h3>';

					$html .= '<div class="photoGallery-description '.$galleryId.'-description">';
					if(!empty($value['description'])){
						$html .= $value['description'].'&nbsp;';
					}
					$html .= '</div>';

					$html .= '</div>';
				}
					
				$html .= '</div></div>';

			}
			$html .= '</div></div></div>';

			return $html;
		}
	}
}
?>