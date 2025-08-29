<?php
class EventData {
	public static $tablename = "event";

	public function EventData(){

		$this->title = "";
		$this->description = "";
		$this->sdate_at = "NULL";
		$this->stime_at = "NULL";
		$this->fdate_at = "NULL";
		$this->ftime_at = "NULL";
		$this->brand_id = "NULL";
		$this->platform_id = "NULL";
		$this->modeltype = "";
		$this->serialnumber = "";
		$this->ticketnumber = "NULL";
		$this->client_id = "NULL";
		$this->user_id = "NULL";
		$this->project_id = "NULL";
		$this->category_id = "NULL";
		$this->priority_id = "NULL";
		$this->status_id = "NULL";
		$this->start_at = "NULL";
		$this->finish_at = "";
		$this->created_at = "NOW()";
	}

	//public function getProject(){ return ProjectData::getById($this->project_id); }
	//public function getCategory(){ return CategoryData::getById($this->category_id); }

	public function getClient(){ return ClientData::getById($this->client_id); }
	public function getUser(){ return UserData::getById($this->user_id); }	
	public function getStatus(){ return StatusData::getById($this->status_id); }	

	public function add(){
		//Fecha Inicio
		$this->stime_at = str_pad($this->stime_at, 5, "0", STR_PAD_LEFT);
		$this->sdate_at = date('Y-m-d',strtotime($this->sdate_at));
		$this->start_at = date('Y-m-d H:i:s',strtotime("$this->sdate_at $this->stime_at"));
		//Fecha Término
		$this->ftime_at = str_pad($this->ftime_at, 5, "0", STR_PAD_LEFT);
		$this->fdate_at = date('Y-m-d',strtotime($this->fdate_at));
		$this->finish_at = date('Y-m-d H:i:s',strtotime("$this->fdate_at $this->ftime_at"));
		//
		$sql = "insert into event (title, description, sdate_at, stime_at, fdate_at, ftime_at, brand_id, platform_id, modeltype, serialnumber, ticketnumber, client_id, user_id, project_id, category_id, priority_id, status_id, start_at, finish_at, created_at) ";
		$sql .= "value (\"$this->title\", \"$this->description\", \"$this->sdate_at\", \"$this->stime_at\", \"$this->fdate_at\", \"$this->ftime_at\", $this->brand_id, $this->platform_id, \"$this->modeltype\", \"$this->serialnumber\", $this->ticketnumber, $this->client_id, $this->user_id, $this->project_id, $this->category_id, $this->priority_id, $this->status_id, \"$this->start_at\", \"$this->finish_at\", $this->created_at)";
		//print($sql);
		return Executor::doit($sql);
	}

	public function add_with_file(){
		//Fecha Inicio
		$this->stime_at = str_pad($this->stime_at, 5, "0", STR_PAD_LEFT);
		$this->sdate_at = date('Y-m-d',strtotime($this->sdate_at));
		$this->start_at = date('Y-m-d H:i:s',strtotime("$this->sdate_at $this->stime_at"));
		//Fecha Término
		$this->ftime_at = str_pad($this->ftime_at, 5, "0", STR_PAD_LEFT);
		$this->fdate_at = date('Y-m-d',strtotime($this->fdate_at));
		$this->finish_at = date('Y-m-d H:i:s',strtotime("$this->fdate_at $this->ftime_at"));		
		//
		$sql = "insert into event (title, description, sdate_at, stime_at, fdate_at, ftime_at, brand_id, platform_id, modeltype, serialnumber, ticketnumber, client_id, user_id, project_id, category_id, priority_id, status_id, upfile, start_at, finish_at, created_at) ";
		$sql .= "value (\"$this->title\", \"$this->description\", \"$this->sdate_at\", \"$this->stime_at\", \"$this->fdate_at\", \"$this->ftime_at\", $this->brand_id, $this->platform_id, \"$this->modeltype\", \"$this->serialnumber\", $this->ticketnumber, $this->client_id, $this->user_id, $this->project_id, $this->category_id, $this->priority_id, $this->status_id, \"$this->upfile\", \"$this->start_at\", \"$this->finish_at\", $this->created_at)";
		//print($sql);
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

// partiendo de que ya tenemos creado un objecto EventData previamente utilizamos el contexto
	public function update(){
		//Fecha Inicio
		$this->stime_at = str_pad($this->stime_at, 5, "0", STR_PAD_LEFT);
		$this->sdate_at = date('Y-m-d',strtotime($this->sdate_at));
		$this->start_at = date('Y-m-d H:i:s',strtotime("$this->sdate_at $this->stime_at"));
		//Fecha Término
		$this->ftime_at = str_pad($this->ftime_at, 5, "0", STR_PAD_LEFT);
		$this->fdate_at = date('Y-m-d',strtotime($this->fdate_at));
		$this->finish_at = date('Y-m-d H:i:s',strtotime("$this->fdate_at $this->ftime_at"));		
		//$sql = "update ".self::$tablename." set title=\"$this->title\",project_id=$this->project_id,category_id=$this->category_id,date_at=\"$this->date_at\",time_at=\"$this->time_at\",description=\"$this->description\" where id=$this->id";
		$sql = "update ".self::$tablename." set
						description=\"$this->description\",
						sdate_at=\"$this->sdate_at\",
						stime_at=\"$this->stime_at\",
						start_at=\"$this->start_at\",
						fdate_at=\"$this->fdate_at\",
						ftime_at=\"$this->ftime_at\",
						finish_at=\"$this->finish_at\",
						brand_id=$this->brand_id,
						platform_id=$this->platform_id,
						modeltype=\"$this->modeltype\",
						serialnumber=\"$this->serialnumber\",
						ticketnumber=$this->ticketnumber,
						client_id=$this->client_id,
						user_id=$this->user_id,
						project_id=$this->project_id,
						category_id=$this->category_id,
						priority_id=$this->priority_id,
						status_id=$this->status_id
				 where id=$this->id";
		//print($sql);
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EventData());
	}

	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where mail=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EventData());
	}

	public static function getEvery(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}

	public static function getAll(){
		//$sql = "select * from ".self::$tablename." where date(date_at)>=date(NOW()) order by date_at";
		$sql = "select * from ".self::$tablename." where date(sdate_at) >= DATE_ADD(CURDATE(), INTERVAL -30 DAY) order by sdate_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}

	public static function getAllByProjectId($id){
		$sql = "select * from ".self::$tablename." where project_id=$id order by sdate_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}

	public static function getAllByMedicId($id){
		$sql = "select * from ".self::$tablename." where medic_id=$id order by sdate_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}

	public static function getOld(){
		$sql = "select * from ".self::$tablename." where date(sdate_at)<date(NOW()) order by sdate_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}

}

?>