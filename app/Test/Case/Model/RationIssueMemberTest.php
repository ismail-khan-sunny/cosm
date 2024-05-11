<?php
App::uses('RationIssueMember', 'Model');

/**
 * RationIssueMember Test Case
 *
 */
class RationIssueMemberTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ration_issue_member',
		'app.ration_issue_perpose',
		'app.perpose',
		'app.food_menu',
		'app.ration_issue_item',
		'app.item',
		'app.user',
		'app.role',
		'app.profile',
		'app.room_allocation',
		'app.room'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RationIssueMember = ClassRegistry::init('RationIssueMember');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RationIssueMember);

		parent::tearDown();
	}

}
