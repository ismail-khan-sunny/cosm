<?php
App::uses('Perpose', 'Model');

/**
 * Perpose Test Case
 *
 */
class PerposeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.perpose'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Perpose = ClassRegistry::init('Perpose');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Perpose);

		parent::tearDown();
	}

}
