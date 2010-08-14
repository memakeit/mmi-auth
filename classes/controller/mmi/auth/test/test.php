<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Test test controller.
 *
 * @package		MMI Auth
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_MMI_Auth_Test_Test extends Controller
{
	/**
	 * @var boolean turn debugging on?
	 **/
	public $debug = TRUE;

	/**
	 * Test test functionality.
	 *
	 * @return	void
	 */
	public function action_index()
	{
		MMI_Debug::dump(date('Y-m-d G:i:s'), 'date');
	}
} // End Controller_MMI_Auth_Test_Test
