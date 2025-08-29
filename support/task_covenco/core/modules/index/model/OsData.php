<?php
class OsData {
	public static $tablename = "os";

	public function OsData(){
		$this->name = "";
		$this->description = "";
		$this->platform_id = "NULL";
		//$this->created_at = "NOW()";
	}

	public function getPlatform(){ return PlatformData::getById($this->platform_id); }

	public function add(){
		$sql = "insert into ".self::$tablename." (name,description,platform_id) ";
        $sql .= "value (\"$this->name\",\"$this->description\",$this->platform_id)";
  		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objeto OsData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",description=\"$this->description\",platform_id=$this->platform_id where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new OsData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by platform_id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OsData());
	}

	public static function getAllByPlatformId($id){
		$sql = "select * from ".self::$tablename." where platform_id=$id order by platform_id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OsData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new OsData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OsData());
	}

}

?>