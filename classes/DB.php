<?php

class DB
{
	private static $_instance = null;
	private $_link = null;
	public static function get_db()
	{
		if( DB::$_instance == null )
		{
			DB::$_instance = new DB();
		}
		return DB::$_instance;
	}

	private function __construct()
	{
		$this->_link = mysql_connect( Config::get('mysql/host') , Config::get('mysql/username') , Config::get('mysql/password') );
		mysql_select_db( Config::get('mysql/db') , $this->_link );
		mysql_query("SET NAMES ".Config::get('mysql/encode'));
	}

	private static function bindArray2SQLFormat($array,$delimiter = '`')
	{
		$sqlFormat ='';
		for($i=0;$i<count($array);$i++)
		{
			$sqlFormat .= $delimiter.$array[$i].$delimiter;
			if($i!=count($array)-1) $sqlFormat .=',';
		}
		return $sqlFormat;
	}

	private static function bindArray2Field($field)
	{
		if($field == null)
		{
			$fill_field= '*';
		}else{
			$fill_field= DB::bindArray2SQLFormat($field);
		}
		return $fill_field;
	}

	private static function getWhenNotStringEmpty( $value , $echo )
	{
		if( $value == '' ) return '';
		return $echo;
	}

	public function query( $sql )
	{
		return mysql_query( $sql , $this->_link );
	}

	public function select( $table , $field = null , $conditions = '' , $limit = '' )
	{
		$fill_field = DB::bindArray2Field($field);
		$result = $this->query( "SELECT $fill_field FROM `$table` " . DB::getWhenNotStringEmpty($conditions,'where ')
		. $conditions.' '.DB::getWhenNotStringEmpty($limit,'limit ').$limit );
		$ret = array();
		$err = mysql_error();
		if( $err )
		{
			throw new Exception("มีข้อผิดพลาดจากระบบฐานข้อมูล: ".$err);
		}
		while( $row = mysql_fetch_array($result) )
		{
			$ret[] = $row;
		}
		return $ret;
	}
}

?>