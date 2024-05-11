<?php
App::uses('SliderContent', 'Model');

/**
 * SliderContent Test Case
 *
 */
class SliderContentTest extends CakeTestCase {

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = array(
			'app.slider_content',
			'app.slider'
	);

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->SliderContent = ClassRegistry::init('SliderContent');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->SliderContent);

		parent::tearDown();
	}

}
