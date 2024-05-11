<?php
App::uses('Paint', 'Model');

/**
 * Paint Test Case
 *
 */
class PaintTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.paint',
		'app.rate'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Paint = ClassRegistry::init('Paint');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Paint);

		parent::tearDown();
	}

}
