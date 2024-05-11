<?php
App::uses('SocialLink', 'Model');

/**
 * SocialLink Test Case
 *
 */
class SocialLinkTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.social_link'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SocialLink = ClassRegistry::init('SocialLink');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SocialLink);

		parent::tearDown();
	}

}
