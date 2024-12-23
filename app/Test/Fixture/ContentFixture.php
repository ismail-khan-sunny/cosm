<?php
/**
 * ContentFixture
 *
 */
class ContentFixture extends CakeTestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	public $fields = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
			'title' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'slug' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'status' => array('type' => 'integer', 'null' => false, 'default' => null),
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
							'title' => 'Lorem ipsum dolor sit amet',
							'slug' => 'Lorem ipsum dolor sit amet',
							'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
							'status' => 1,
							'created' => '2014-02-05 07:11:24',
							'modified' => '2014-02-05 07:11:24'
					),
			);

}
