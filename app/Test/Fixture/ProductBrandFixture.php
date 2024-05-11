<?php
/**
 * ProductBrandFixture
 *
 */
class ProductBrandFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'product_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'index'),
		'brand_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'length' => 11),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'product_id' => array('column' => array('product_id', 'brand_id'), 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '',
			'product_id' => '',
			'brand_id' => ''
		),
	);

}
