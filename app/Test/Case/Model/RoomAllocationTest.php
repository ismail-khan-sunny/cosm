<?php
App::uses('RoomAllocation', 'Model');

/**
 * RoomAllocation Test Case
 *
 */
class RoomAllocationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.room_allocation',
		'app.user',
		'app.role',
		'app.profile',
		'app.room'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RoomAllocation = ClassRegistry::init('RoomAllocation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RoomAllocation);

		parent::tearDown();
	}

}
