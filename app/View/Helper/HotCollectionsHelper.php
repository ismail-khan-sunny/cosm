<?php
App::uses('AppHelper', 'View/Helper');
class HotCollectionsHelper extends AppHelper {

	public $helpers = array('Html', 'Form');

	public function generateHotCollection(){
		$data = classRegistry::init('Paint')->find(
			'all',
			array(
				'conditions'=>array('Paint.featured'=>0),
				'order'=>'Paint.created DESC'
			)
		);
		return $data;
	}
}