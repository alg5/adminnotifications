<?php
/**
*
* @author Alg
* @version 1.0.0.0
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace alg\adminnotifications;

/**
* @package 	
*/
class 	_adminnotifications_module
{
	var $u_action;
	var $new_config = array();

	function main($id, $mode)
	{
		global  $user, $template, $phpbb_root_path, $phpbb_admin_path,$table_prefix, $db;
		global $phpbb_container;
		$controller = $phpbb_container->get('alg.adminnotifications.adminnotifications_handler');

		$this->tpl_name = '	_adminnotifications';
		$this->page_title = '	_ADMINNOTIFICATIONS_SETTINGS';
		$user->add_lang('	/permissions');

		$form_key = '	_adminnotifications';
		add_form_key($form_key);

		$sql = "SELECT * from " . $table_prefix . "adminnotifications ORDER BY create_time DESC";
		$result = $db->sql_query($sql);
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
  		$template->assign_vars(array(
			'S_ADMINNOTIFICATIONS_PAGE'		=> true,
			'S_GROUP_OPTIONS'		=> group_select_options(false, false, false), // Show all groups
			'U_ADMINNOTIFICATIONS_PATH'				=> './../adminnotifications/',
		));
	}
}
