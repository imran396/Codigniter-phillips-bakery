<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Zend
{

	function __construct()
	{

        ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . realpath(APPPATH . 'libraries'));

	}


	function load($class)
	{
       // echo ini_get('include_path');
        //echo realpath(APPPATH);
		require_once $class . EXT;
		//echo (string) $class . EXT;

	}
}

?>
