<?php
App::uses('ProductColor', 'Model');

/**
 * ProductColor Test Case
 *
 */
class ProductColorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_color',
		'app.product',
		'app.color',
		'app.product_image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductColor = ClassRegistry::init('ProductColor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductColor);

		parent::tearDown();
	}

}
