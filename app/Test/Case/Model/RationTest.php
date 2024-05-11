<?php
App::uses('Ration', 'Model');

/**
 * Ration Test Case
 *
 */
class RationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ration',
		'app.item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ration = ClassRegistry::init('Ration');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ration);

		parent::tearDown();
	}

}
