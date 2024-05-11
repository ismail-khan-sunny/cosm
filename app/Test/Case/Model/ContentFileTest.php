<?php
App::uses('ContentFile', 'Model');

/**
 * ContentFile Test Case
 *
 */
class ContentFileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.content_file',
		'app.content',
		'app.menu',
		'app.cls'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContentFile = ClassRegistry::init('ContentFile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContentFile);

		parent::tearDown();
	}

}
