<?php
App::uses('ProductYear', 'Model');

/**
 * ProductYear Test Case
 *
 */
class ProductYearTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_year',
		'app.product',
		'app.year'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductYear = ClassRegistry::init('ProductYear');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductYear);

		parent::tearDown();
	}

}
