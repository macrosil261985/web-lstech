<?php
class Database {
	public static $db;
	public static $con;
	function Database(){
		$this->user="innovacovenco";$this->pass="Gehmis-nocsi8-virwiv";$this->host="localhost";$this->ddbb="task_covenco";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
?>
