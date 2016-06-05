<?php
/**
*
* adminnotifications [Dutch]
*
* @package adminnotifications
* @copyright (c) 2014 alg
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* [Dutch] translated by Dutch Translators (https://github.com/dutch-translators)
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
	'ACP_ADMINNOTIFICATIONS'		=> 'Notificaties van beheerder',
	'ACP_ADMINNOTIFICATIONS_SETTINGS'				=> '     Notificaties instellingen',
	'ACP_ADMINNOTIFICATIONS_EXPLAIN'				=> 'Kies groepen of gebruikers als ontvangers <br /> Je kan zelf een notificatie samenstellen of er één hergebruiken uit het archief',
	'ACP_ADMINNOTIFICATIONS_SEARCH_USER'				=> 'gebruikersnaam...',
	'ACP_ADMINNOTIFICATIONS_SEARCH_USER_TOOLTIP'				=> 'Zoek hier naar een gebruiker op gebruikersnaam',
	'ACP_ADMINNOTIFICATIONS_SEARCH_GROUP'				=> 'groepsnaam...',
	'ACP_ADMINNOTIFICATIONS_SEARCH_GROUP_TOOLTIP'				=> 'Zoek hier naar een groep op groepsnaam',
	'ACP_ADMINNOTIFICATIONS_LIVE_SEARCH_CAPTION'		=> 'Zoeken',
	'ACP_ADMINNOTIFICATIONS_FROM_LIST'		=> 'Uit de lijst',
	'ACP_ADMINNOTIFICATIONS_NOTY_TITLE'		=> 'Notificatie titel',
	'ACP_ADMINNOTIFICATIONS_NOTY_CONTENT'		=> 'Notificatie tekst',
	'ACP_ADMINNOTIFICATIONS_NOTY_SAVE'		=> 'Notificatie opslaan',
	'ACP_ADMINNOTIFICATIONS_NOTY_SAVE_SHORT'		=> 'Opslaan',
	'ACP_ADMINNOTIFICATIONS_NOTY_NO_SAVE'		=> 'Niet opslaan',
	'ACP_ADMINNOTIFICATIONS_SEND'					=> 'Verstuur notificatie ',
	'ACP_ADMINNOTIFICATIONS_NO_USERS'					=> 'Je moet tenminste één groep of gebruiker selecteren',
	'ACP_ADMINNOTIFICATIONS_NO_TEXT'					=> 'Oeps, je bent je notificatie tekst vergeten.',
	'ACP_ADMINNOTIFICATIONS_ARCHIVE'					=> 'Notificatie archief',
	'ACP_ADMINNOTIFICATIONS_SENT'					=> 'Notificatie is succesvol verzonden',
	'ACP_ADMINNOTIFICATIONS_SAVED'					=> 'Notificatie opgeslagen',
	'ACP_ADMINNOTIFICATIONS_RESTORED'					=> 'Notificatie hergebruikt vanuit het archief',
	'ACP_ADMINNOTIFICATIONS_DELETED'					=> 'Notificatie is uit het archief verwijderd',
	'ACP_ADMINNOTIFICATIONS_NO_SAVED'					=> 'Geen opgeslagen notificaties',
	'ACP_ADMINNOTIFICATIONS_CAPTION_NOTY'					=> 'Notificatie',
	'ACP_ADMINNOTIFICATIONS_CAPTION_TITLE'					=> 'Titel',
	'ACP_ADMINNOTIFICATIONS_CAPTION_DATE'					=> 'Datum ',
	'ACP_ADMINNOTIFICATIONS_TOOLTIP_INFO'					=> 'Lees hier de instructies',
	'ACP_ADMINNOTIFICATIONS_TOOLTIP_RESTORE'					=> 'Hergebruiken vanuit het archief',
	'ACP_ADMINNOTIFICATIONS_TOOLTIP_DELETE'					=> 'Verwijder uit het archief',

	'ACP_ADMINNOTIFICATIONS_INFO_GROUP'					=> 'Hoe voeg ik een groep toe aan de ontvangerslijst?',
	'ACP_ADMINNOTIFICATIONS_INFO_USER'					=> 'Hoe voeg ik een gebruiker toe aan de ontvangerslijst?',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_DELETE'					=> 'Hoe verwijder ik een groep uit de ontvangerslijst?',
	'ACP_ADMINNOTIFICATIONS_INFO_USER_DELETE'					=> 'Hoe verwijder ik een gebruiker uit de ontvangerslijst?',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_SAVE'					=> 'Hoe kan ik een notificatie opslaan?',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_RESTORE'					=> 'Hoe kan ik een notificatie uit het archief hergebruiken?',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_DELETE'					=> 'Hoe kan ik een notificatie uit het archief verwijderen?',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_CLOSE'					=> 'Bedankt, het is mij nu helemaal duidelijk!',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_ADD_1'					=> 'Typ een groepsnaam in, in het zoekveld',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_ADD_2'					=> 'Dubbelklikken op de groepsnaam die je wilt toevoegen',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_ADD_3'					=> 'Selecteer één of meerdere groepen uit het blok "Groepen toevoegen" en klik op "Groepen toevoegen"',
	'ACP_ADMINNOTIFICATIONS_INFO_USER_ADD_1'					=> 'Typ een gebruikersnaam in, in het zoekveld',
	'ACP_ADMINNOTIFICATIONS_INFO_GROUP_DELETE_1'					=> 'Dubbelklikken op de groepsnaam in het blok "Groepen"',
	'ACP_ADMINNOTIFICATIONS_INFO_USER_DELETE_1'					=> 'Dubbelklikken op de gerbuikersnaam in het blok "Gebruikers"',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_SAVE_1'					=> 'Klik na het verzenden van de notificatie op de knop "Notificatie opslaan"',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_RESTORE_1'					=> 'Klik op het icoontje <i class="fa fa-download"></i> op de betreffende regel in het blok "Notificatie archief"',
	'ACP_ADMINNOTIFICATIONS_INFO_NOTY_DELETE_1'					=> 'Klik op het icoontje <i class="fa fa-trash"></i> op de betreffende regel in het blok "Notificatie archief"',

	'USE_HTML'						=> 'Parse  HTML',
	'USE_BBCODE'						=> 'Parse  BBCode',
	'NOTIFICATION_FROMADMIN'					=> 'Notificatie van het beheer',
	));
