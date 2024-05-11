<?php
/**
 * ProfileFixture
 *
 */
class ProfileFixture extends CakeTestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	public $fields = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
			'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
			'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'city' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'state' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'zip' => array('type' => 'integer', 'null' => false, 'default' => null),
			'phone' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'skypee' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
							'user_id' => 1,
							'first_name' => 'Lorem ipsum dolor sit amet',
							'last_name' => 'Lorem ipsum dolor sit amet',
							'address' => 'Lorem ipsum dolor sit amet',
							'city' => 'Lorem ipsum dolor sit amet',
							'state' => 'Lorem ipsum dolor sit amet',
							'zip' => 1,
							'phone' => 'Lorem ipsum dolor sit amet',
							'skypee' => 'Lorem ipsum dolor sit amet'
					),
			);

}
