<?php
class PlatformData {
	public static $tablename = "platform";

	public function PlatformData(){
		$this->name = "";
		$this->description = "";
		//$this->brand_id = "NULL";
		//$this->created_at = "NOW()";
	}

	public function getBrand(){ return BrandData::getById($this->brand_id); }

	public function add(){
		$sql = "insert into ".self::$tablename." (name,description,brand_id) ";
        $sql .= "value (\"$this->name\",\"$this->description\",$this->brand_id)";
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

// partiendo de que ya tenemos creado un objeto PlatformData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",description=\"$this->description\",brand_id=$this->brand_id where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PlatformData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by brand_id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PlatformData());
	}

	public static function getAllByBrandId($id){
		$sql = "select * from ".self::$tablename." where brand_id=$id order by brand_id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PlatformData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new PlatformData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PlatformData());
	}

}

?>