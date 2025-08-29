<div class="row">
	<div class="col-md-12">
<!--<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/clients-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
-->
<!--
<a href="./index.php?view=oldreservations" class="btn btn-default pull-right">Ordenes de servicio anteriores</a>
-->
		<h1>Reporte ordenes de servicio</h1>
		<br><br>
		<form class="form-horizontal" role="form">
		<input type="hidden" name="view" value="reports">
		<?php
		$clients = ClientData::getAll();
		$users = UserData::getAll();
		$statuses = StatusData::getAll();	
		?>

			<div class="form-group">
				<div class="col-lg-2">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-search"></i></span>
						<input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Palabra clave">
					</div>
				</div>

				<div class="col-lg-3">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
						<select name="client_id" class="form-control">
							<option value="">CLIENTE</option>
								<?php foreach($clients as $cli):?>
								<option value="<?php echo $cli->id; ?>" <?php if(isset($_GET["client_id"]) && $_GET["client_id"]!=""){ echo "selected"; } ?>><?php echo $cli->name; ?></option>
								<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-users"></i></span>
						<select name="user_id" class="form-control">
							<option value="">ESPECIALISTA</option>
								<?php foreach($users as $us):?>
								<option value="<?php echo $p->id; ?>" <?php if(isset($_GET["user_id"]) && $_GET["user_id"]!=""){ echo "selected"; } ?>><?php echo $us->name." ".$us->lastname; ?></option>
								<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="date" name="sdate_at" value="<?php if(isset($_GET["sdate_at"]) && $_GET["sdate_at"]!=""){ echo $_GET["sdate_at"]; } ?>" class="form-control" placeholder="DD-MM-AAAA">
					</div>
					<input type="checkbox" name="chkmonth" <?php if(isset($_GET["chkmonth"])){ echo "checked";}?>> Por Mes
				</div>

				<div class="col-lg-2">
					<button class="btn btn-primary btn-block">Buscar</button>
				</div>

			</div>
		</form>

<?php
$events= array();
if((isset($_GET["q"]) && isset($_GET["client_id"]) && isset($_GET["user_id"]) && isset($_GET["sdate_at"])) && ($_GET["q"]!="" || $_GET["client_id"]!="" || $_GET["user_id"]!="" || $_GET["sdate_at"]!="") ) {
	$sql = "select * from event where ";
	
	if($_GET["q"]!=""){
		$sql .= " id like '%$_GET[q]%' or ticketnumber like '%$_GET[q]%' or title like '%$_GET[q]%' or description like '%$_GET[q] %' ";
	}

	if($_GET["client_id"]!=""){
		if($_GET["q"]!=""){
			$sql .= " and ";
		}
		$sql .= " client_id = ".$_GET["client_id"];
	}

	if($_GET["user_id"]!=""){
		if($_GET["q"]!=""||$_GET["client_id"]!=""){
			$sql .= " and ";
		}
		$sql .= " user_id = ".$_GET["user_id"];
	}


	if($_GET["sdate_at"]!=""){
		//print("sql 1: date_at");
		if($_GET["q"]!=""||$_GET["client_id"]!="" ||$_GET["user_id"]!="" ){
			$sql .= " and ";
		}
		$fecha = date('Y-m-d',strtotime($_GET["sdate_at"]));
		if(isset($_GET["chkmonth"])){
			$sql .= " month(sdate_at) = month(\"".$fecha."\") and year(sdate_at) = year(\"".$fecha."\")";
		}else{
			$sql .= " sdate_at = \"".$fecha."\"";
		}
	}

	$sql .= " order by sdate_at desc";

	//print("sql 1: ");
	//print($sql);
	$events = EventData::getBySQL($sql);

//}else{
	//print("sql 2: ");
//	$events = EventData::getAll();

}
		if(count($events)>0){
			$_SESSION["report_data"] = $events;
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
				<thead>
					<th>Nº Orden</th>
					<th>Ticket Cliente</th>
					<th>Cliente</th>
					<th>Especialista</th>
					<th>Fecha / Hora Inicio</th>
					<th>Estado</th>
					<th>Descripción</th>
					<th></th>
				</thead>
			<?php
			foreach($events as $event){
				$client = null;
				if($event->client_id!=null){					
					$client  = $event->getClient();
				}

				$user = null;
				if($event->user_id!=null){
					$user = $event->getUser();
				}

				$status = null;
				if($event->status_id!=null){
					$status = $event->getStatus();
				}				
				?>
				<tr>
					<td><?php echo $event->id; ?></td>
					<td><?php echo $event->ticketnumber; ?></td>
					<td><?php if($client!=null ){ echo $client->name;} ?></td>
					<td><?php if($user!=null){ echo $user->name." ".$user->lastname; }?></td>
					<td><?php echo $event->sdate_at." ".$event->stime_at; ?></td>
					<td><?php if($status!=null ){ echo $status->name;} ?></td>
					<td><?php echo $event->description; ?></td>
					<td style="width:130px;">
						<a href="index.php?view=editreservation&id=<?php echo $event->id;?>" class="btn btn-warning btn-xs">Editar</a>
						<a href="index.php?action=delreservation&id=<?php echo $event->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
					</td>
				</tr>
			<?php
			}
			?>
			<div class="panel-body">
				<a href="./report/ordenesdeservicio-word.php" class="btn btn-default"><i class="fa fa-download"> Descargar (.docx) </i></a>
			</div>
			<?php
		}else{
			echo "<p class='alert alert-danger'>No hay Eventos</p>";
		}

		?>

	</div>
</div>