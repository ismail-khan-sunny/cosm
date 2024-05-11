<?php
/**
 * CustomerDetailFixture
 *
 */
class CustomerDetailFixture extends CakeTestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	public $fields = array(
			'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'key' => 'primary'),
			'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'company_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'country_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'office_phone' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'office_phone_verification' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'mobile_phone' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'mobile_phone_verification' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'website' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'switch_ip_address' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
			'indexes' => array(

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
							'id' => '52f9e81a-7628-421c-9b0c-0df0f8defb25',
							'first_name' => 'Lorem ipsum dolor sit amet',
							'last_name' => 'Lorem ipsum dolor sit amet',
							'company_name' => 'Lorem ipsum dolor sit amet',
							'country_id' => 'Lorem ipsum dolor sit amet',
							'office_phone' => 'Lorem ipsum dolor ',
							'office_phone_verification' => 'Lorem ipsum dolor sit amet',
							'mobile_phone' => 'Lorem ipsum dolor ',
							'mobile_phone_verification' => 'Lorem ipsum dolor sit amet',
							'website' => 'Lorem ipsum dolor sit amet',
							'switch_ip_address' => 'Lorem ipsum d'
					),
			);

}
