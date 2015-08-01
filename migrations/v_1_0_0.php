<?php

/**
*
* @package adminnotifications
* @copyright (c) 2014 Alg
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*/

namespace alg\adminnotifications\migrations;


class v_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['adminnotifications_version']) && version_compare($this->config['adminnotifications_version'], '2.0.*', '>=');
	}

	public function update_schema()
	{
		return 	array(
		'add_tables' => array(
				$this->table_prefix . 'adminnotifications' => array(
					'COLUMNS'		=> array(
						'noty_id'			=> array('UINT', null, 'auto_increment'),
						'noty_title' => array('VCHAR:50', ''),
						'noty_content' => array('MTEXT_UNI', ''),
						'create_time' =>  array('UINT:11', 0),
						'parse_type' => array('BOOL', 0),
					),
					'PRIMARY_KEY'	=> 'noty_id',
				),
			),
		);
	}

	public function revert_schema()
	{
		return 	array(
			'drop_tables'	=> array($this->table_prefix . 'adminnotifications'),
		);
	}

	public function update_data()
	{
		return array(
			array('config.add', array('adminnotifications_version', '2.0.0')),

			// Add ACP modules
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_ADMINNOTIFICATIONS')),

			array('module.add', array('acp', 'ACP_ADMINNOTIFICATIONS', array(
					'module_basename'	=> '\alg\adminnotifications\acp\acp_adminnotifications_module',
					'module_langname'	=> 'ACP_ADMINNOTIFICATIONS_SETTINGS',
					'module_mode'		=> 'adminnotifications',
					'module_auth'		=> 'ext_alg/adminnotifications && acl_a_board',
				))),
		);
	}

	public function revert_data()
	{
		return array(
			// remove from configs

			// Current version
				array('config.remove', array('adminnotifications_version')),

			// remove from ACP modules
			array('if', array(
				array('module.exists', array('acp', 'ACP_ADMINNOTIFICATIONS', array(
					'module_basename'	=> '\alg\adminnotifications\acp\acp_adminnotifications_module',
					'module_langname'	=> 'ACP_ADMINNOTIFICATIONS_SETTINGS',
					'module_mode'		=> 'adminnotifications',
					'module_auth'		=> 'ext_alg/adminnotifications && acl_a_board',
					),
				)),
				array('module.remove', array('acp', 'ACP_ADMINNOTIFICATIONS', array(
					'module_basename'	=> '\alg\adminnotifications\acp\acp_adminnotifications_module',
					'module_langname'	=> 'ACP_ADMINNOTIFICATIONS_SETTINGS',
					'module_mode'		=> 'adminnotifications',
					'module_auth'		=> 'ext_alg/adminnotifications && acl_a_board',
					),
				)),
			)),
			array('module.remove', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_ADMINNOTIFICATIONS')),
		);
	}
}
