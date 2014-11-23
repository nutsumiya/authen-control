<?php

class User
{
	private static $user_fields = array('uid','username','password','name','isAdmin');
	private $user_db;

	public function __construct($user_db)
	{
		$this->user_db = $user_db;
	}

	public function get($key)
	{
		return $this->user_db[$key];
	}

	public static function auth($username,$password)
	{
		$rows = DB::get_db()->select('users',null,"username='$username'",1);
		if( count($rows) != 1 )
		{
			throw new Exception("ไม่มีผู้ใช้นี้ในระบบ");
		}
		$user_db = $rows[0];
		if( $user_db['password'] != $password)
		{
			throw new Exception("รหัสผ่านไม่ถูกต้อง");
		}
		$user = new User( $user_db ); 
		Session::put( "user" , $user );
		return $user;
	}
}

?>