<?php
App::uses('RelatedLink', 'Model');

/**
 * RelatedLink Test Case
 *
 */
class RelatedLinkTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.related_link'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RelatedLink = ClassRegistry::init('RelatedLink');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RelatedLink);

		parent::tearDown();
	}

}
