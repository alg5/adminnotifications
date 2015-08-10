<?php
/** 
*
* adminnotifications [Polish]
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
	'ACP_ADMINNOTIFICATIONS'		=> 'Powiadomienia od administratora',
	'ACP_ADMINNOTIFICATIONS_SETTINGS'				=> 'Ustawienia powiadomień',
	'ACP_ADMINNOTIFICATIONS_EXPLAIN'				=> 'Wybierz grupy lub użytkowników jako odbiorców <br /> Powiadomienie może być napisane lub przywrócone z zapisanych powiadomień ',
	'ACP_ADMINNOTIFICATIONS_SEARCH_USER'				=> 'użytkownik...',
	'ACP_ADMINNOTIFICATIONS_SEARCH_USER_TOOLTIP'				=> 'Dla szybkiego znalezienia użytkownika, zacznij wpisywać jego nick',
	'ACP_ADMINNOTIFICATIONS_SEARCH_GROUP'				=> 'nazwa grupy...',
	'ACP_ADMINNOTIFICATIONS_SEARCH_GROUP_TOOLTIP'				=> 'Dla szybkiego znalezienia grupy, zacznij wpisywać jej nazwę',
	'ACP_ADMINNOTIFICATIONS_LIVE_SEARCH_CAPTION'		=> 'szybkie szukanie',
	'ACP_ADMINNOTIFICATIONS_FROM_LIST'		=> 'wybierz z listy',
	'ACP_ADMINNOTIFICATIONS_NOTY_TITLE'		=> 'Tytuł powiadomienia',
	'ACP_ADMINNOTIFICATIONS_NOTY_CONTENT'		=> 'Tekst powiadomienia',
	'ACP_ADMINNOTIFICATIONS_NOTY_SAVE'		=> 'Zapisz powiadomienie',
	'ACP_ADMINNOTIFICATIONS_NOTY_SAVE_SHORT'		=> 'Zapisz',
	'ACP_ADMINNOTIFICATIONS_NOTY_NO_SAVE'		=> 'Nie zapisuj',
	'ACP_ADMINNOTIFICATIONS_SEND'					=> 'Wyślij powiadomienie ',
	'ACP_ADMINNOTIFICATIONS_NO_USERS'					=> 'Wymagana co najmniej jedna grupa lub użytkownik ',
	'ACP_ADMINNOTIFICATIONS_NO_TEXT'					=> 'Brak tekstu powiadomienia',
	'ACP_ADMINNOTIFICATIONS_ARCHIVE'					=> 'Archiwum powiadomień ',
	'ACP_ADMINNOTIFICATIONS_SENT'					=> 'Powiadomienie zostało wysłane ',
	'ACP_ADMINNOTIFICATIONS_SAVED'					=> 'Powiadomienie zapisano ',
	'ACP_ADMINNOTIFICATIONS_RESTORED'					=> 'Powiadomienie przywrócono z archiwum ',
	'ACP_ADMINNOTIFICATIONS_DELETED'					=> 'Powiadomienie usunięto z archiwum ',
	'ACP_ADMINNOTIFICATIONS_NO_SAVED'					=> 'Brak zapisanych powiadomień  ',
	'ACP_ADMINNOTIFICATIONS_CAPTION_NOTY'					=> 'Powiadomienia  ',
	'ACP_ADMINNOTIFICATIONS_CAPTION_TITLE'					=> 'Tytuł ',
	'ACP_ADMINNOTIFICATIONS_CAPTION_DATE'					=> 'Data  ',
	'ACP_ADMINNOTIFICATIONS_TOOLTIP_INFO'					=> 'Przeczytaj instrukcją ',
	'ACP_ADMINNOTIFICATIONS_TOOLTIP_RESTORE'					=> 'Przywróć z archiwum  ',
	'ACP_ADMINNOTIFICATIONS_TOOLTIP_DELETE'					=> 'Usuń z archiwum ',

	'ACP_ADMINNOTIFICATIONS_INFO_GROUP'					=> 'Jak dodać grupę do listy odbiorców',
	'ACP_ADMINNOTIFICATIONS_INFO_USER'					=> 'Jak dodać użytkownika do listy odbiorców',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_DELETE'					=> 'Jak usunąć grupę z listy odbiorców',
	'ACP_ADMINNOTIFICATIONS_INFO_USER_DELETE'					=> 'Jak usunąć użytkownika z listy odbiorców',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_SAVE'					=> 'Jak zapisać powiadomienie',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_RESTORE'					=> 'Jak przywrócić powiadomienie z archiwum',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_DELETE'					=> 'Jak usunąć powiadomienie z archiwum',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_CLOSE'					=> 'Rozumiem',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_ADD_1'					=> 'Zacznij wpisywać nazwę grupy w okienku "szybkie szukanie"',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_ADD_2'					=> 'Kliknij dwukrotnie nazwę grupy, w okienku "dodaj grupę"',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_ADD_3'					=> 'Wybierz grupy w okienku "dodaj grupę" i naciśnij przycisk "Dodaj grupy"',
	'ACP_ADMINNOTIFICATIONS_INFO_USER_ADD_1'					=> 'Zacznij wpisywać nick użytkownika w okienku "szybkie szukanie"',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_DELETE_1'					=> 'Kliknij dwukrotnie nazwę grupy w okienku "Grupy"',
	'ACP_ADMINNOTIFICATIONS_INFO_USER_DELETE_1'					=> 'Kliknij dwukrotnie nick użytkownika w okienku "Użytkownicy"',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_SAVE_1'					=> 'Kliknij przycisk "Zapisz powiadomienie po wysłaniu"',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_RESTORE_1'					=> 'Kliknij ikonę <i class="fa fa-download"></i> przy powiadomieniu które chcesz przywrócić ',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_DELETE_1'					=> 'Kliknij ikonę <i class="fa fa-trash"></i> przy powiadomieniu, które chcesz usunąć. ',

	'USE_HTML'						=> 'Użyj  HTML',
	'USE_BBCODE'						=> 'Użyj  BBCode',
	'NOTIFICATION_FROMADMIN'					=> 'Powiadomienie od administracji',
	));
