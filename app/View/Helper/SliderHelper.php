<?php
App::uses('AppHelper', 'View/Helper');
class SliderHelper extends AppHelper {

	public $helpers = array('Html', 'Form');

	public function generateSlider(){
		$data = classRegistry::init('SliderContent')->find(
			'all',
			array(
				'conditions'=>array('SliderContent.status'=>'active')
			)
		);
		//pr($data);die();
		return $data;
	}
}