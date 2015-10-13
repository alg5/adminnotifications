<?php
/**
*
* @author Alg
* @version 1.0.0.0
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace alg\adminnotifications\acp;

/**
* @package 	
*/
class acp_adminnotifications_module
{
	const GUESTS = 1;
	const BOTS = 6;

	function main($id, $mode)
	{
		global  $user, $template, $phpbb_root_path, $phpbb_admin_path,$table_prefix, $db;
		global $phpbb_container;
		$controller = $phpbb_container->get('alg.adminnotifications.adminnotifications_handler');

		$this->tpl_name = 'acp_adminnotifications';
		$this->page_title = 'ACP_ADMINNOTIFICATIONS_SETTINGS';
		$user->add_lang('acp/permissions');

		$form_key = 'acp_adminnotifications';
		add_form_key($form_key);

		$sql = "SELECT * from " . $table_prefix . "adminnotifications ORDER BY create_time DESC";
		$result = $db->sql_query($sql);
		if (is_array($result) || is_object($result))
		{
			foreach ($result as $row)
			{
					$template->assign_block_vars('notysaved', array(
						'NOTY_ID'		=> $row['noty_id'],
						'NOTY_TITLE'		=> $row['noty_title'],
						'NOTY_CONTENT'		=> $row['noty_content'],
						'NOTY_TOOLTIP'		=> $controller->character_limit($row['noty_content'],60) ,
						'CREATE_TIME'		=> $user->format_date($row['create_time'] , "d/m/Y H:i"),
						'PARSE_TYPE'		=> $row['parse_type'],

					));
			}
			$db->sql_freeresult($result);
		}
		$exclude_guests = array();
		$exclude_ids[] = acp_adminnotifications_module::GUESTS;
		$exclude_ids[] = acp_adminnotifications_module::BOTS;
		$template->assign_vars(array(
			'S_ADMINNOTIFICATIONS_PAGE'		=> true,
			'S_GROUP_OPTIONS'		=> group_select_options(false, $exclude_ids, false), // Show groups
			'U_ADMINNOTIFICATIONS_PATH'				=> './../adminnotifications/',
		));
	}
}
