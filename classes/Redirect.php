<?php
 
class Redirect
{
	public static function to($location)
	{
		header('Location: '.resolveURIHeader($location));
		exit();
	}
}

?>