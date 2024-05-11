<?php
App::uses('ProductBrand', 'Model');

/**
 * ProductBrand Test Case
 *
 */
class ProductBrandTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_brand',
		'app.product',
		'app.category',
		'app.company',
		'app.brand'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductBrand = ClassRegistry::init('ProductBrand');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductBrand);

		parent::tearDown();
	}

}
