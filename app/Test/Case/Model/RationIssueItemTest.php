<?php
App::uses('RationIssueItem', 'Model');

/**
 * RationIssueItem Test Case
 *
 */
class RationIssueItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ration_issue_item',
		'app.ration_issue_perpose',
		'app.perpose',
		'app.food_menu',
		'app.item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RationIssueItem = ClassRegistry::init('RationIssueItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RationIssueItem);

		parent::tearDown();
	}

}
