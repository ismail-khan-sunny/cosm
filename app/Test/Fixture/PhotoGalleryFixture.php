<?php
/**
 * PhotoGalleryFixture
 *
 */
class PhotoGalleryFixture extends CakeTestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	public $fields = array(
			'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'user_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'title' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'where_is_taken' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'date' => array('type' => 'date', 'null' => true, 'default' => null),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
			'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
			),
			'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
			);

			/**
			 * Records
			 *
			 * @var array
			 */
			public $records = array(
					array(
							'id' => '530829f6-3b24-4352-9e57-1324f8defb25',
							'user_id' => 'Lorem ipsum dolor sit amet',
							'title' => 'Lorem ipsum dolor sit amet',
							'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
							'where_is_taken' => 'Lorem ipsum dolor sit amet',
							'date' => '2014-02-22',
							'created' => '2014-02-22 10:39:18',
							'modified' => '2014-02-22 10:39:18'
					),
			);

}
