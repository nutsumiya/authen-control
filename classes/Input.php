<?php
 
 class Input
 {
	public static function exists($type='post')
	{
		switch($type)
		{
			case 'post':return (!empty($_POST));
						break;
			case 'get':return (!empty($_GET));
						break;			
		}
		return false;
	}
	
	public static function get($item)
	{
		if(isset($_GET[$item]))
		{
			return $_GET[$item];
		}
		return '';
	}

	public static function post($item)
	{
		if(isset($_POST[$item]))
		{
			return $_POST[$item];
		}
		return '';
	}
	
 }
 
?>