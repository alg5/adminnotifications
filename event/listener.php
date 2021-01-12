<?php
/**
 *
 * @package adminnotifications
 * @copyright (c) 2014 alg
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace alg\adminnotifications\event;

/**
* Event listener
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{

	static public function getSubscribedEvents()
	{
		return array(
						'core.user_setup'   =>  'load_language_on_setup',
		);
	}
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'alg/adminnotifications',
			'lang_set' => 'info_acp_adminnotifications',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}
}
