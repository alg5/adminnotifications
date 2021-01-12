<?php
/**
*
* Thanks For Posts extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace alg\adminnotifications\notification;

/**
* Thanks for posts notifications class
* This class handles notifying users when they have been thanked for a post
*/

class fromadmin extends  \phpbb\notification\type\base
{
	const PARSE_AS_HTML = 0;
	const PARSE_AS_BBCODE = 1;
	const NOTY_BBCOD_OPTIONS = 7;
	/**
	* Get notification type name
	*
	* @return string
	*/
	public function get_type()
	{
		return 'alg.adminnotifications.notification.type.fromadmin';
	}

	/**
	* Language key used to output the text
	*
	* @var string
	*/
	protected $language_key = 'NOTIFICATION_FROMADMIN';
	/**
	* Inherit notification read status from post.
	*
	* @var bool
	*/
	protected $inherit_read_status = true;

	/**
	* Notification option data (for outputting to the user)
	*
	* @var bool|array False if the service should use it's default data
	* 					Array of data (including keys 'id', 'lang', and 'group')
	*/
	public static $notification_option = array(
		'lang'	=> 'NOTIFICATION_TYPE_FROMADMIN',
		'group'	=> 'NOTIFICATION_GROUP_MISCELLANEOUS',
	);
	/** @var string */
	protected $notifications_table;

	/** @var \phpbb\user_loader */
	protected $user_loader;
	public function set_notifications_table($notifications_table)
	{
		$this->notifications_table = $notifications_table;
	}

	public function set_user_loader(\phpbb\user_loader $user_loader)
	{
		$this->user_loader = $user_loader;
	}

	/**
	* Is available
	*/
	public function is_available()
	{
		return false;
	}
	/**
	* Get the id of the parent
	*
	* @param array $$commandgame_data The data from the commandcame actions
	*/
	public static function get_item_parent_id($fromadmin_data)
	{
		return (int) $fromadmin_data['id'];
	}
	/**
	* Get the id of the item
	*
	* @param array $thanks_data The data from the thank
	*/
	public static function get_item_id($fromadmin_data)
	{
		return (int) $fromadmin_data['item_id'];
	}

	/**
	* Find the users who want to receive notifications
	*
	* @param array $fromadmin_data The data from the fromadmin
	* @param array $options Options for finding users for notification
	*
	* @return array
	*/
	public function find_users_for_notification($fromadmin_data, $options = array())
	{
		$options = array_merge(array(
			'ignore_users'		=> array(),
		), $options);

		$users = $fromadmin_data['members_ids'];
		return $this->check_user_notification_options($users, $options);
	}

	/**
	* Get the user's avatar
	*/
	public function get_avatar()
	{
		return $this->user_loader->get_avatar($this->get_data('from'));
	}

	/**
	* Get the HTML formatted title of this notification
	*
	* @return string
	*/
	public function get_title()
	{
		return $this->get_data('noty_title');
	}
	/**
	* Users needed to query before this notification can be displayed
	*
	* @return array Array of user_ids
	*/
	public function users_to_query()
	{
		$members = $this->get_data('members_ids');
		$users = array(
			$this->get_data('from'),
		);
		if (is_array($members))
		{
			foreach ($members as $member)
			{
				$users[] = $member;
			}
		}

		return $users;

	}

	/**
	* Get the url to this item
	*
	* @return string URL
	*/
	public function get_url()
	{
		//return $this->get_data('noty_link');
		return '';
	}

	/**
	* {inheritDoc}
	*/
	public function get_redirect_url()
	{
		return $this->get_url();
	}

	/**
	* Get email template
	*
	* @return string|bool
	*/
	public function get_email_template()
	{
		//return '@alg_suki/commandgame';
		return '';
	}

	/**
	* Get the HTML formatted reference of the notification
	*
	* @return string
	*/
	public function get_reference()
	{
			$noty_parse_type = $this->get_data('noty_parse_type');
			$noty_content_src = $this->get_data('noty_content');
			if ($noty_parse_type == fromadmin::PARSE_AS_BBCODE)
			{
				$noty_content = generate_text_for_display(
					$this->get_data('noty_content'),
					$this->get_data('noty_uid'),
					$this->get_data('noty_bitfield'),
					$this->get_data('noty_options')
				);
			}
			else
			{
				$noty_content = $this->get_data('noty_content');
			}

		return '<div id="an_text"  class="an_text" >' .  $noty_content . '</div>';
	}

	/**
	* Get email template variables
	*
	* @return array
	*/
	public function get_email_template_variables()  //todo
	{
	}

	/**
	* Function for preparing the data for insertion in an SQL query
	* (The service handles insertion)
	*
	* @param array $thanks_data Data from insert_thanks
	* @param array $pre_create_data Data from pre_create_insert_array()
	*
	* @return array Array of data ready to be inserted into the database
	*/
	public function create_insert_array($fromadmin_data, $pre_create_data = array())
	{

		$this->set_data('from', $fromadmin_data['from']);
		$this->set_data('noty_title', $fromadmin_data['noty_title']);
		$this->set_data('noty_content', $fromadmin_data['noty_content']);
		$this->set_data('noty_parse_type', $fromadmin_data['noty_parse_type']);
		$this->set_data('noty_uid', $fromadmin_data['noty_uid']);
		$this->set_data('noty_bitfield', $fromadmin_data['noty_bitfield']);
		$this->set_data('noty_options', $fromadmin_data['noty_options']);

		parent::create_insert_array($fromadmin_data, $pre_create_data);
	}

	/**
	* Function for preparing the data for update in an SQL query
	* (The service handles insertion)
	*
	* @param array $thanks_data Data unique to this notification type
	* @return array Array of data ready to be updated in the database
	*/
	public function create_update_array($fromadmin_data)
	{
		$sql = 'SELECT notification_data
			FROM ' . $this->notifications_table . '
			WHERE notification_type_id = ' . (int) $this->notification_type_id . '
				AND item_id = ' . (int) self::get_item_id($fromadmin_data);
		$result = $this->db->sql_query($sql);
		if ($row = $this->db->sql_fetchrow($result))
		{
			$data = $row['notification_data'];
		}
		return $this->create_insert_array($fromadmin_data);
	}
}
