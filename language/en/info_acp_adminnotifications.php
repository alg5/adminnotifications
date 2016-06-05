<?php
/**
*
* adminnotifications [English]
*
* @package adminnotifications
* @copyright (c) 2014 alg
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACP_ADMINNOTIFICATIONS'		=> 'Notifications from administrator',
	'ACP_ADMINNOTIFICATIONS_SETTINGS'				=> 'Notifications setting',
	'ACP_ADMINNOTIFICATIONS_EXPLAIN'				=> 'Choose groups or users as recipients <br /> Notification may be composed or restored from saved templates ',
	'ACP_ADMINNOTIFICATIONS_SEARCH_USER'				=> 'username...',
	'ACP_ADMINNOTIFICATIONS_SEARCH_USER_TOOLTIP'				=> 'For quick search start typing the name of the user',
	'ACP_ADMINNOTIFICATIONS_SEARCH_GROUP'				=> 'group name...',
	'ACP_ADMINNOTIFICATIONS_SEARCH_GROUP_TOOLTIP'				=> 'For quick search start typing the name of the group',
	'ACP_ADMINNOTIFICATIONS_LIVE_SEARCH_CAPTION'		=> 'Quick search',
	'ACP_ADMINNOTIFICATIONS_FROM_LIST'		=> 'From the list',
	'ACP_ADMINNOTIFICATIONS_NOTY_TITLE'		=> 'Notification title',
	'ACP_ADMINNOTIFICATIONS_NOTY_CONTENT'		=> 'Notification context',
	'ACP_ADMINNOTIFICATIONS_NOTY_SAVE'		=> 'Save notification',
	'ACP_ADMINNOTIFICATIONS_NOTY_SAVE_SHORT'		=> 'Save',
	'ACP_ADMINNOTIFICATIONS_NOTY_NO_SAVE'		=> 'Do not save',
	'ACP_ADMINNOTIFICATIONS_SEND'					=> 'Send notification ',
	'ACP_ADMINNOTIFICATIONS_NO_USERS'					=> 'At least one group or user required ',
	'ACP_ADMINNOTIFICATIONS_NO_TEXT'					=> 'Notification content is missing',
	'ACP_ADMINNOTIFICATIONS_ARCHIVE'					=> 'Notification archive ',
	'ACP_ADMINNOTIFICATIONS_SENT'					=> 'Notification has been sent successfully ',
	'ACP_ADMINNOTIFICATIONS_SAVED'					=> 'Notification saved ',
	'ACP_ADMINNOTIFICATIONS_RESTORED'					=> 'Notification has been restored from the archive ',
	'ACP_ADMINNOTIFICATIONS_DELETED'					=> 'Notification has been deleted from the archive ',
	'ACP_ADMINNOTIFICATIONS_NO_SAVED'					=> 'No saved notifications  ',
	'ACP_ADMINNOTIFICATIONS_CAPTION_NOTY'					=> 'Notification  ',
	'ACP_ADMINNOTIFICATIONS_CAPTION_TITLE'					=> 'Title ',
	'ACP_ADMINNOTIFICATIONS_CAPTION_DATE'					=> 'Date  ',
	'ACP_ADMINNOTIFICATIONS_TOOLTIP_INFO'					=> 'Please, read the instruction ',
	'ACP_ADMINNOTIFICATIONS_TOOLTIP_RESTORE'					=> 'Restore from the arhive  ',
	'ACP_ADMINNOTIFICATIONS_TOOLTIP_DELETE'					=> 'Delete  from the arhive ',

	'ACP_ADMINNOTIFICATIONS_INFO_GROUP'					=> 'How to add a group to the recipient list',
	'ACP_ADMINNOTIFICATIONS_INFO_USER'					=> 'How to add a user to the recipient list',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_DELETE'					=> 'How to delete a group from the recipient list',
	'ACP_ADMINNOTIFICATIONS_INFO_USER_DELETE'					=> 'How to delete a user from the recipient list',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_SAVE'					=> 'How to save a notification',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_RESTORE'					=> 'How to restore a notification from the archive',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_DELETE'					=> 'How to delete a notification from the archive',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_CLOSE'					=> 'Thanks, it is clear for me',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_ADD_1'					=> 'Start typing the group name in the input "quick search"',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_ADD_2'					=> 'Double-click on the grop name in the block "Add Groups"',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_ADD_3'					=> 'Select some groups in the block "Add Groups" and click button  "Add Groups"',
	'ACP_ADMINNOTIFICATIONS_INFO_USER_ADD_1'					=> 'Start typing the username in the input "quick search"',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_DELETE_1'					=> 'Double-click on the grop name in the block "Groups"',
	'ACP_ADMINNOTIFICATIONS_INFO_USER_DELETE_1'					=> 'Double-click on the user name in the block "Users"',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_SAVE_1'					=> 'Click the button "Save notification" after sending',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_RESTORE_1'					=> 'Click the icon <i class="fa fa-download"></i> on the corresponding line in the block "Notification archive"',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_DELETE_1'					=> 'Click the icon <i class="fa fa-trash"></i> on the corresponding line in the block "Notification archive"',

	'USE_HTML'						=> 'Parse  HTML',
	'USE_BBCODE'						=> 'Parse  BBCode',
	'NOTIFICATION_FROMADMIN'					=> 'Notifications from the administration',
	));
