<?php
/**
*
 * @package adminnotifications
 * @copyright (c) 2015 Alg
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace alg\adminnotifications\controller;

class adminnotifications_handler
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string PHP extension */
	protected $php_ext;

	/** @var \phpbb\request\request_interface */
	protected $request;

	/** @var string PHP extension */
	protected $table_prefix;

	/** @var array */
	protected $thankers = array();

	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\auth\auth $auth, \phpbb\template\template $template, \phpbb\user $user, $phpbb_root_path, $php_ext, \phpbb\request\request_interface $request, $table_prefix, \phpbb\notification\manager $notification_manager, $users_table, $groups_table, $notifications_table, $adminnotifications_table)
	{
		$this->config = $config;
		$this->db = $db;
		$this->auth = $auth;
		$this->template = $template;
		$this->user = $user;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
		$this->request = $request;
		$this->table_prefix = $table_prefix;
		$this->notification_manager = $notification_manager;
		$this->users_table = $users_table;
		$this->groups_table = $groups_table;
		$this->notifications_table = $notifications_table;
		$this->adminnotifications_table = $adminnotifications_table;

		$this->return = array(); // save returned data in here
		$this->error = array(); // save errors in here
        
		if (!defined('PARSE_AS_HTML'))
		{
			define('PARSE_AS_HTML', 0);
		}
		if (!defined('PARSE_AS_BBCODE'))
		{
			define('PARSE_AS_BBCODE', 1);
		}
		if (!defined('NOTY_BBCOD_OPTIONS'))
		{
			define('NOTY_BBCOD_OPTIONS', 7);
		}

	}

	public function main($action)
	{
		switch ($action)
		{
			case 'user':
				$this->live_search_user();
				break;
			case 'group':
				$this->live_search_group();
				break;
			case 'noty':
				$this->send_notification();
				break;
			case 'save':
				$this->save_template();
				break;
			case 'restore':
				$this->restore_template();
				break;
			case 'delete':
				$this->delete_template();
				break;
			default:
				$this->error[] = array('error' => $this->user->lang['INCORRECT_SEARCH']);

		}
		if (sizeof($this->error))
		{
			$return_error = array();
			foreach($this->error as $cur_error)
			{
					// replace lang vars if possible
					$return_error['ERROR'][] = (isset($this->user->lang[$cur_error['error']])) ? $this->user->lang[$cur_error['error']] : $cur_error['error'];
			}
			$json_response = new \phpbb\json_response;
			$json_response->send($return_error);
		}
		else
		{
			$json_response = new \phpbb\json_response;
			$json_response->send($this->return);
		}

	}
    
	private function live_search_user()
	{
		$q = utf8_strtoupper(utf8_normalize_nfc($this->request->variable('q', '',true)));

		$sql = "SELECT user_id, username  FROM " . $this->users_table .
					" WHERE user_type <> " . USER_IGNORE .
					" AND username_clean " . $this->db->sql_like_expression(utf8_clean_string( $this->db->sql_escape($q)) . $this->db->get_any_char());
					" ORDER BY username";

		$result = $this->db->sql_query($sql);
		$message='';
		while ($row = $this->db->sql_fetchrow($result))
		{
			$user_id = $row['user_id'];
			$key = htmlspecialchars_decode($row['username']	);
			$message .=  $key . "|$user_id\n";
		}
		$json_response = new \phpbb\json_response;
		$json_response->send($message);

	}
	private function live_search_group()
	{
		$q = utf8_strtoupper(utf8_normalize_nfc($this->request->variable('q', '',true)));

		$sql = "SELECT group_id, group_name, group_type  FROM " . $this->groups_table .
					" ORDER BY group_type DESC, group_name ASC";
		$result = $this->db->sql_query($sql);
		$message='';
		while ($row = $this->db->sql_fetchrow($result))
		{
			$key = $row['group_type'] == GROUP_SPECIAL ?  $this->user->lang['G_' . $row['group_name']] : htmlspecialchars_decode($row['group_name']	);
			if(strpos(utf8_strtoupper($key), $q) == 0)
			{
				$group_id=$row['group_id'];
				$message .= $key . "|$group_id\n";
			}
		}
		$json_response = new \phpbb\json_response;
		$json_response->send($message);

	}
	private function send_notification()
	{
		include_once($this->phpbb_root_path . 'includes/functions_user.' . $this->php_ext);

		$noty_title = utf8_normalize_nfc($this->request->variable('noty_title', '',true));
		$noty_content = utf8_normalize_nfc($this->request->variable('noty_content', '',true));
		$noty_content_src = $noty_content;
		$noty_parse_type = $this->request->variable('noty_parse_type', PARSE_AS_HTML);

		if($noty_content == '')
		{
			$this->error[] = array('error' => $this->user->lang['	_ADMINNOTIFICATIONS_NO_TEXT']);
			return;
		}
		$u_ids	=  $this->request->variable('user_id',  array('' => 0));
		$g_ids	=  $this->request->variable('group_id',  array('' => 0));
		$ids = array();
		if($u_ids)
		{
			$ids = array_merge($u_ids);
		}
        if($g_ids)
		{
				$user_by_groups_id_ary = array();
				$this->get_user_ids_by_groups_ary($user_by_groups_id_ary, $g_ids);
				if(sizeof($user_by_groups_id_ary))
				{
					$ids = array_merge($ids, $user_by_groups_id_ary);
					
				}
		}
		$ids = array_unique($ids);
		if(!sizeof($ids))
		{
			$this->error[] = array('error' => $this->user->lang['	_ADMINNOTIFICATIONS_NO_USERS']);
			return;
		}
		$uid = $bitfield = '';
		$options=NOTY_BBCOD_OPTIONS;
		$noty_content = $this->parse_text_by_parse_type($noty_parse_type, $noty_content, $uid, $bitfield, $options);

		$new_item_id = $this->get_item_id_notification();
				$notification_data = array(
				'id'   => 0,
				'item_id'   => $new_item_id,    
				'members_ids'   => $ids,
				'from'   => $this->user->data['user_id'] ,
				'noty_title'   => $noty_title,
				'noty_content'   => $noty_content,
				'noty_parse_type'   => $noty_parse_type,
				'noty_uid'   => $uid,
				'noty_bitfield'   => $bitfield,
				'noty_options'   => NOTY_BBCOD_OPTIONS,
			);
		$this->add_notification($notification_data);
		$message = $this->user->lang['	_ADMINNOTIFICATIONS_SENT'];
		$message_save = $this->user->lang['	_ADMINNOTIFICATIONS_NOTY_SAVE'];
		$message_no_save = $this->user->lang['	_ADMINNOTIFICATIONS_NOTY_NO_SAVE'];
		$this->return = array(
			'MESSAGE'		=> $message,
			'MESSAGE_SAVE'		=> $message_save,
			'MESSAGE_NO_SAVE'		=> $message_no_save,
		);

	}
	private function save_template()
	{
		$noty_parse_type = $this->request->variable('noty_parse_type', PARSE_AS_HTML);
		$noty_title = utf8_normalize_nfc($this->request->variable('noty_title', '',true));
		$noty_content =  utf8_normalize_nfc($this->request->variable('noty_content', '',true));
		if ($noty_parse_type == PARSE_AS_HTML)
		{
			$noty_content = htmlspecialchars_decode($noty_content);
		}
		$noty_create_time = time();
		$save_data = array(
			'noty_title'	=> utf8_normalize_nfc($this->request->variable('noty_title', '',true)),
			'noty_content'	=>$noty_content,
			'create_time'	=> $noty_create_time,
			'parse_type'	=> $noty_parse_type,
			);
		//add to DB
		$sql = 'INSERT INTO ' . $this->adminnotifications_table . ' ' . $this->db->sql_build_array('INSERT', $save_data);
		$this->db->sql_query($sql);
		$noty_id = $this->db->sql_nextid();

		$this->return = array(
			'MESSAGE'		=> $this->user->lang['	_ADMINNOTIFICATIONS_SAVED'] ,
			'noty_id'		=> $noty_id ,
			'noty_title'		=> $noty_title ,
			'noty_tooltip'		=> $this->character_limit($noty_content,60) ,
			'noty_content'		=> $noty_content ,
			'noty_create_time'		=>$this->user->format_date($noty_create_time , "d/m/Y H:i"),
            'noty_parse_type'   => $noty_parse_type,
		);
	}

	private function restore_template()
	{
		$noty_id = $this->request->variable('noty_id', 0);
		$sql = "SELECT * FROM " . $this->adminnotifications_table  . " WHERE noty_id=" . $noty_id;
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		if (!$row)
		{
			$this->error[] = array('error' => $this->user->lang['INCORRECT_SEARCH']);
			return;
		}

		$this->return = array(
			'MESSAGE'		=> $this->user->lang['	_ADMINNOTIFICATIONS_RESTORED'] ,
			'NOTY_TITLE'		=> $row['noty_title'] ,
			'NOTY_CONTENT'		=> $row['noty_content'] ,
            'NOTY_PARSE_TYPE'   => $row['parse_type'] ,
		);
    }

    private function delete_template()
    {
		$noty_id = $this->request->variable('noty_id', 0);
		$row_id = $this->request->variable('row_id', 0);
		$sql = "DELETE FROM " . $this->adminnotifications_table  . " WHERE noty_id=" . $noty_id;
		$this->db->sql_query($sql);
		$result = $this->db->sql_affectedrows($sql);
		if ($result == 0)
		{
			$this->error[] = array('error' => $this->user->lang['INCORRECT_SEARCH']);
			return;
		}
		$this->return = array(
			'MESSAGE'		=> $this->user->lang['	_ADMINNOTIFICATIONS_DELETED'] ,
			'ROW_ID'		=> $row_id ,
		);
    }

	#region Notifications
 	// Add notifications
	public function add_notification($notification_data, $notification_type_name = 'alg.adminnotifications.notification.type.fromadmin')
	{
		$this->notification_manager->add_notifications($notification_type_name, $notification_data);
        //todo add record to log admin
	}

	public function notification_exists($notification_data, $notification_type_name)
	{
		$notification_type_id = $this->notification_manager->get_notification_type_id($notification_type_name);
		$sql = 'SELECT notification_id FROM ' . $this->notifications_table . '
			WHERE notification_type_id = ' . (int) $notification_type_id . '
				AND item_id = ' . (int) $commandgame_data['action_id'];
		$result = $this->db->sql_query($sql);
		$item_id = $this->db->sql_fetchfield('notification_id');
		$this->db->sql_freeresult($result);

		return ($item_id) ?: false;
	}
	public function get_item_id_notification( $notification_type_name = 'alg.adminnotifications.notification.type.fromadmin')
	{
		$notification_type_id = $this->notification_manager->get_notification_type_id($notification_type_name);
		$sql = 'SELECT  max(item_id) as max_item_id FROM ' . $this->notifications_table . '
			WHERE notification_type_id = ' . (int) $notification_type_id ;
			$result = $this->db->sql_query($sql);
		$item_id = (int) $this->db->sql_fetchfield('max_item_id');
		$this->db->sql_freeresult($result);
		if(!$item_id) 
		{
			return 1;
		}
		return (int)$item_id + 1;
	}

	public function notification_markread($item_ids)
	{
		// Mark post notifications read for this user in this topic
		$this->notification_manager->mark_notifications_read(array(
			'alg.adminnotifications.notification.type.notification_manager ',
		), $item_ids, $this->user->data['user_id']);
	}

    #endregion
	
	private function get_user_ids_by_groups_ary( &$user_id_ary, $group_id_ary)
	{

		if (!$group_id_ary )
		{
			return '';
		}

		$user_id_ary = $username_ary = array();

		$sql = "SELECT u.user_id" .
					" FROM " . $this->users_table . 
					" u JOIN " . USER_GROUP_TABLE . " ug on u.user_id = ug.user_id " .
					" WHERE  u.user_type <>" . USER_IGNORE . " AND " .  $this->db->sql_in_set('ug.group_id', $group_id_ary);
		$this->sql = $sql;
		$result = $this->db->sql_query($sql);
 
		while ($row = $this->db->sql_fetchrow($result))
		{
			$user_id_ary[] = $row['user_id'];
		}

		$this->db->sql_freeresult($result);
		$this->ids_groups = $user_id_ary;
    }
	private function parse_text_by_parse_type($parse_type, $text_src, &$uid, &$bitfield, $options)
	{
		$text_dst ='';
		if ($parse_type == PARSE_AS_HTML)
		{
			$text_dst = htmlspecialchars_decode(utf8_normalize_nfc($text_src));
		}
		else
		{
				//PARSE_AS_BBCODE
				$text_dst = $text_src;
			generate_text_for_storage(
				$text_dst,
				$uid,
				$bitfield,
				$options,
				true,
				true,
				true
			);
		}
		return $text_dst;
	}
	public function character_limit(&$title, $limit = 0)
	{
	   $title = censor_text($title);
	   if ($limit > 0)
	   {
		  return (utf8_strlen($title) > $limit + 3) ? truncate_string($title, $limit) . '...' : $title;
	   }
	   else
	   {
		  return $title;
	   }
	}

}
