<?php
App::uses('FoodMenu', 'Model');

/**
 * FoodMenu Test Case
 *
 */
class FoodMenuTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.food_menu',
		'app.ration_issue_perpose'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FoodMenu = ClassRegistry::init('FoodMenu');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FoodMenu);

		parent::tearDown();
	}

}
