<?php

class Authorised
{
	private $authorised_db;

	public function __construct($authorised_db)
	{
		$this->authorised_db = $authorised_db;
	}

	public function get($key)
	{
		return $this->authorised_db[$key];
	}

	public static function get_authoriseds()
	{
		$rows = DB::get_db()->select('authoriseds');
		$authoriseds= array();
		for($i=0;$i<count($rows);$i++)
		{
			$authoriseds[] = new Authorised($rows[$i]);
		}
		return $authoriseds;
	}

	public static function get_authorised_by_id($aid)
	{
		$rows = DB::get_db()->select('authoriseds',null,"aid='$aid'",1);
		if( count($rows) != 1 )
		{
			throw new Exception("ไม่มีผู้ใช้นี้ในระบบ");
		}
		return new Authorised($rows[0]);
	}

	public static function get_authorised_by_cardid($cardid)
	{
		$rows = DB::get_db()->select('authoriseds',null,"cardid='$cardid'",1);
		if( count($rows) != 1 )
		{
			throw new Exception("ไม่มีผู้ใช้นี้ในระบบ");
		}
		return new Authorised($rows[0]);
	}

	public function is_expire()
	{
		$enterTime = new DateTime($this->authorised_db['enterTime'],new DateTimeZone('Asia/Bangkok'));
		$now = new DateTime();
		$exitTime = new DateTime($this->authorised_db['exitTime'],new DateTimeZone('Asia/Bangkok'));
		return  ($now->diff( $enterTime )->invert==0) || ($exitTime->diff( $now )->invert==0);
	}

	public function has_permission()
	{
		return !$this->is_expire() && $this->authorised_db['status']=='อนุญาต'; 
	}

	public function destroy()
	{
		$aid = $this->authorised_db['aid'];
		DB::get_db()->delete('authoriseds',"aid='$aid'");
	}
}

?>