<?php
/** 
*
* adminnotifications [Russian]
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
	'ACP_ADMINNOTIFICATIONS'		=> 'Уведомления администратора',
	'ACP_ADMINNOTIFICATIONS_SETTINGS'				=> 'Настройки уведомлений',
	'ACP_ADMINNOTIFICATIONS_EXPLAIN'				=> 'Выберите группы и/или отдельных пользователей для рассылки им уведомления <br /> Уведомление можно сформировать или выбрать из имеюзихся сохраненных шаблонов ',
	'ACP_ADMINNOTIFICATIONS_SEARCH_USER'				=> 'имя пользователя...',
	'ACP_ADMINNOTIFICATIONS_SEARCH_USER_TOOLTIP'				=> 'Для быстрого поиска начинайте печатать имя пользователя',
	'ACP_ADMINNOTIFICATIONS_SEARCH_GROUP'				=> 'группа...',
	'ACP_ADMINNOTIFICATIONS_SEARCH_GROUP_TOOLTIP'				=> 'Для быстрого поиска начинайте печатать название группы',
	'ACP_ADMINNOTIFICATIONS_LIVE_SEARCH_CAPTION'		=> 'Быстрый поиск',
	'ACP_ADMINNOTIFICATIONS_FROM_LIST'		=> 'Из списка',
	'ACP_ADMINNOTIFICATIONS_NOTY_TITLE'		=> 'Заголовок уведомления',
	'ACP_ADMINNOTIFICATIONS_NOTY_CONTENT'		=> 'Текст уведомления',
	'ACP_ADMINNOTIFICATIONS_NOTY_LINK'		=> 'Ссылка (локальная)',
	'ACP_ADMINNOTIFICATIONS_NOTY_SAVE'		=> 'Сохранить уведомление',
	'ACP_ADMINNOTIFICATIONS_NOTY_SAVE_SHORT'		=> 'Сохранить',
	'ACP_ADMINNOTIFICATIONS_NOTY_NO_SAVE'		=> 'Не сохранять',
	'ACP_ADMINNOTIFICATIONS_SEND'					=> 'Разослать уведомление ',
	//'ACP_ADMINNOTIFICATIONS_SEND'					=> 'Разослать ',
	'ACP_ADMINNOTIFICATIONS_NO_USERS'					=> 'Необходимо выбрать хотя бы одного пользователя или группу ',
	'ACP_ADMINNOTIFICATIONS_NO_TEXT'					=> 'Отсутствует текст уведомления ',
	'ACP_ADMINNOTIFICATIONS_ARCHIVE'					=> 'Архив уведомлений ',
	'ACP_ADMINNOTIFICATIONS_SENT'					=> 'Уведомление разослано успешно ',
	'ACP_ADMINNOTIFICATIONS_SAVED'					=> 'Уведомление сохранено ',
	'ACP_ADMINNOTIFICATIONS_RESTORED'					=> 'Уведомление извлечено из архива ',
	'ACP_ADMINNOTIFICATIONS_DELETED'					=> 'Уведомление удалено из архива ',
	'ACP_ADMINNOTIFICATIONS_NO_SAVED'					=> 'Нет сохраненных уведомлений  ',
	'ACP_ADMINNOTIFICATIONS_CAPTION_NOTY'					=> 'Уведомление  ',
	'ACP_ADMINNOTIFICATIONS_CAPTION_TITLE'					=> 'Заголовок  ',
	'ACP_ADMINNOTIFICATIONS_CAPTION_DATE'					=> 'Дата  ',
	'ACP_ADMINNOTIFICATIONS_TOOLTIP_INFO'					=> 'Пожалуйста, прочитайте инструкцию  ',
	'ACP_ADMINNOTIFICATIONS_TOOLTIP_RESTORE'					=> 'Извлечь из архива  ',
	'ACP_ADMINNOTIFICATIONS_TOOLTIP_DELETE'					=> 'Удалить из архива ',

	'ACP_ADMINNOTIFICATIONS_INFO_GROUP'					=> 'Как добавить группу  в получатели уведомления ',
	'ACP_ADMINNOTIFICATIONS_INFO_USER'					=> 'Как добавить пользователя в получатели уведомления',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_DELETE'					=> 'Как удалить группу  из получателей уведомления',
	'ACP_ADMINNOTIFICATIONS_INFO_USER_DELETE'					=> 'Как удалить пользователя  из получателей уведомления',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_SAVE'					=> 'Как сохранить уведомление',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_RESTORE'					=> 'Как извлечь уведомление из архива',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_DELETE'					=> 'Как удалить уведомление из архива',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_CLOSE'					=> 'Спасибо, мне всё понятно',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_ADD_1'					=> 'Начните печатать название группы в окне быстрого поиска',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_ADD_2'					=> 'Кликните дважды по названию группы в блоке "Добавить группы"',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_ADD_3'					=> 'Выделите нужные группы  в блоке "Добавить группы" и нажмите "Добавить группы"',
	'ACP_ADMINNOTIFICATIONS_INFO_USER_ADD_1'					=> 'Начните печатать имя пользователя в окне быстрого поиска',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_DELETE_1'					=> 'Кликните дважды по названию группы в блоке "Группы"',
	'ACP_ADMINNOTIFICATIONS_INFO_USER_DELETE_1'					=> 'Кликните дважды по имени пользователя в блоке "Пользователи"',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_SAVE_1'					=> 'После рассылки уведомления нажать кнопку "Сохранить уведомление"',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_RESTORE_1'					=> 'В блоке "Архив уведомлений" нажать иконку <i class="fa fa-download"></i> в соответственной строке',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_DELETE_1'					=> 'В блоке "Архив уведомлений" нажать иконку <i class="fa fa-trash"></i> в соответственной строке',

	'USE_HTML'						=> 'Использовать  HTML',
	'USE_BBCODE'						=> 'Использовать  BBCode',
	'NOTIFICATION_FROMADMIN'					=> 'Сообщение от администрации ',
	));
