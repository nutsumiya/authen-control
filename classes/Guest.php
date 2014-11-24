<?php

class Guest
{
	private $guest_db;

	public function __construct($guest_db)
	{
		$this->guest_db = $guest_db;
	}

	public function get($key)
	{
		return $this->guest_db[$key];
	}

	public static function get_guests()
	{
		$rows = DB::get_db()->select('guests');
		$guests= array();
		for($i=0;$i<count($rows);$i++)
		{
			$guests[] = new Guest($rows[$i]);
		}
		return $guests;
	}

	public static function get_guest_by_id($gid)
	{
		$rows = DB::get_db()->select('guests',null,"gid='$gid'",1);
		if( count($rows) != 1 )
		{
			throw new Exception("ไม่มีผู้มาเยือนนี้ในระบบ");
		}
		return new Guest($rows[0]);
	}

	public static function get_guest_by_cardid($cardid)
	{
		$rows = DB::get_db()->select('guests',null,"cardid='$cardid'",1);
		if( count($rows) != 1 )
		{
			throw new Exception("ไม่มีผู้มาเยือนนี้ในระบบ");
		}
		return new Guest($rows[0]);
	}

	public function is_expire()
	{
		$enterTime = new DateTime($this->guest_db['enterTime'],new DateTimeZone('Asia/Bangkok'));
		$now = new DateTime();
		$exitTime = new DateTime($this->guest_db['exitTime'],new DateTimeZone('Asia/Bangkok'));
		return ($now->diff( $enterTime )->invert==0) || ($exitTime->diff( $now )->invert==0);
	}

	public function has_permission()
	{
		return !$this->is_expire() && $this->guest_db['status']=='อนุญาต'; 
	}

	public function destroy()
	{
		$gid = $this->guest_db['gid'];
		DB::get_db()->delete('guests',"gid='$gid'");
	}
}

?>