<?php
App::uses('RationIssuePerpose', 'Model');

/**
 * RationIssuePerpose Test Case
 *
 */
class RationIssuePerposeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ration_issue_perpose',
		'app.perpose',
		'app.food_menu',
		'app.ration_issue_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RationIssuePerpose = ClassRegistry::init('RationIssuePerpose');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RationIssuePerpose);

		parent::tearDown();
	}

}
