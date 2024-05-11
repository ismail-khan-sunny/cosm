<?php
App::uses('RationStock', 'Model');

/**
 * RationStock Test Case
 *
 */
class RationStockTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ration_stock',
		'app.item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RationStock = ClassRegistry::init('RationStock');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RationStock);

		parent::tearDown();
	}

}
