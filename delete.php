<?php

require_once('core/init.php');

$type = Input::get("type");
$id = Input::get("id");

if($type=='g')
{
	try
	{
		$guest = Guest::get_guest_by_id($id);
		$guest->destroy();
	}catch(Exception $e)
	{	

	}
}
if($type=='a')
{
	try
	{
		$authorised = Authorised::get_authorised_by_id($id);
		var_dump($authorised);
		$authorised->destroy();
	}catch(Exception $e)
	{

	}
}

Redirect::to('show');

?>