<?php

class Card
{
	public static function is_had($cardid,$type,$id)
	{
		$g_cardids=array();
		if($type=='g')
		{
			$g_cardids = DB::get_db()->select('guests',array('cardid'),"gid <> '$id'");
		}else{
			$g_cardids = DB::get_db()->select('guests',array('cardid'));
		}
		for($i=0;$i<count($g_cardids);$i++)
		{
			if($cardid==$g_cardids[$i][0])
			{
				return true;
			}		
		}
		if(in_array($cardid,$g_cardids))
			return true;
		if($type=='a')
		{
			$a_cardids = DB::get_db()->select('authoriseds',array('cardid'),"aid <> '$id'");
		}else{
			$a_cardids = DB::get_db()->select('authoriseds',array('cardid'));
		}
		for($i=0;$i<count($a_cardids);$i++)
		{
			if($cardid==$a_cardids[$i][0])
			{
				return true;
			}		
		}
		return false;
	}
}

?>