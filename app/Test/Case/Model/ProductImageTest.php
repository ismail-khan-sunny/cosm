<?php
App::uses('ProductImage', 'Model');

/**
 * ProductImage Test Case
 *
 */
class ProductImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_image',
		'app.product',
		'app.color'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductImage = ClassRegistry::init('ProductImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductImage);

		parent::tearDown();
	}

}
