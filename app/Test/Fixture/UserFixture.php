<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	public $fields = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
			'username' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'role' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
			'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
			'indexes' => array(
					'PRIMARY' => array('column' => 'id', 'unique' => 1)
			),
			'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	/**
	 * Records
	 *
	 * @var array
	 */
	public $records = array(
			array(
					'id' => 1,
					'username' => 'Lorem ipsum dolor sit amet',
					'password' => 'Lorem ipsum dolor sit amet',
					'role' => 'Lorem ipsum dolor sit amet',
					'created' => '2014-02-05 05:50:05',
					'modified' => '2014-02-05 05:50:05'
			),
	);

}
