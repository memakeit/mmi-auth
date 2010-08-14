<?php defined('SYSPATH') or die('No direct script access.');

// Test routes
if (Kohana::$environment !== Kohana::PRODUCTION)
{
	Route::set('mmi/auth/test', 'mmi/auth/test/<controller>(/<action>)')
	->defaults(array
	(
		'directory' => 'mmi/auth/test',
	));
}
