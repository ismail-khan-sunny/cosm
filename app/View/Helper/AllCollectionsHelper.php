<?php
App::uses('AppHelper', 'View/Helper');
class AllCollectionsHelper extends AppHelper {

	public $helpers = array('Html', 'Form');
	public $components = array('Paginator');
	public function generateAllCollection(){
		$data = classRegistry::init('Paint')->$this->Paginate(
			'all',
			array(
				'order'=>'Paint.created DESC',
				'limit'=>3
			)
		);
		
		$data = $this->paginate('Paint');
		pr($data);
		exit;
		return $data;
	}
}