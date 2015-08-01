<?php
/**
*
* @author Alg
* @version $Id: adminnotifications.php,v 1.0.0. Alg$
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace alg\adminnotifications\acp;

class adminnotifications_info
{
	function module()
	{
		return array(
			'filename'	=> '\alg\adminnotifications\acp\acp_adminnotifications_module',
			'title'		=> 'ACP_ADMINNOTIFICATIONS_SETTINGS',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'adminnotifications'			=> array('title' => 'ACP_ADMINNOTIFICATIONS_SETTINGS', 'auth' => 'ext_alg/adminnotifications && acl_a_board', 'cat' => array('ACP_ADMINNOTIFICATIONS')),
			),
		);
	}

	function install()
	{
	}

	function uninstall()
	{
	}
}
