<?php
App::uses('Rate', 'Model');

/**
 * Rate Test Case
 *
 */
class RateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rate',
		'app.paint',
		'app.user',
		'app.role',
		'app.profile'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Rate = ClassRegistry::init('Rate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rate);

		parent::tearDown();
	}

}
