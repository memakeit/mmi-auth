<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Test_Auth extends Controller
{
    public $debug = TRUE;

    public function action_index()
    {
        $data = 123;
        MMI_Debug::dump($data, '$data');
    }
} // End Controller_Test_Auth