<?php
/**
 * RationIssuePerposeFixture
 *
 */
class RationIssuePerposeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'perpose_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'food_menu_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'number_of_person' => array('type' => 'integer', 'null' => false, 'default' => null),
		'cost' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '12,2'),
		'issue_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'perpose_id' => array('column' => 'perpose_id', 'unique' => 0)
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
			'id' => '54c764ac-e68c-4b79-a00a-0a50f8defb25',
			'perpose_id' => 'Lorem ipsum dolor sit amet',
			'food_menu_id' => 'Lorem ipsum dolor sit amet',
			'number_of_person' => 1,
			'cost' => 1,
			'issue_date' => '2015-01-27',
			'status' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-01-27 16:13:00',
			'modified' => '2015-01-27 16:13:00'
		),
	);

}
