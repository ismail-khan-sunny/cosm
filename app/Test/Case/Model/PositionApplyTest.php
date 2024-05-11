<?php
App::uses('PositionApply', 'Model');

/**
 * PositionApply Test Case
 *
 */
class PositionApplyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.position_apply'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PositionApply = ClassRegistry::init('PositionApply');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PositionApply);

		parent::tearDown();
	}

}
