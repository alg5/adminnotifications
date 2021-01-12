<?php

/**
*
* @package adminnotifications
* @copyright (c) 2014 Alg
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*/

namespace alg\adminnotifications\migrations;

class v_2_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['adminnotifications_version']) && version_compare($this->config['adminnotifications_version'], '3.0.*', '>=');
	}
	static public function depends_on()
	{
			return array(
				'\alg\adminnotifications\migrations\v_1_0_0',
			);
	}


	public function update_schema()
	{
		return 	array();
	}

	public function revert_schema()
	{
		return 	array();
	}

	public function update_data()
	{
		return array(array('config.add', array('adminnotifications_version', '3.0.0')),);
	}

	public function revert_data()
	{
		return array(
			// remove from configs
			// Current version
				array('config.remove', array('adminnotifications_version')),
		);
	}
}
