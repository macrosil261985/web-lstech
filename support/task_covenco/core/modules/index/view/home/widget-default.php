<?php

$events = EventData::getEvery();
$clients = ClientData::getAll();
$users = UserData::getAll();

foreach($events as $event){
	$client = null;
	if($event->client_id!=null){					
		$client  = $event->getClient();
	}

	$user = null;
	if($event->user_id!=null){
		$user = $event->getUser();
	}

	//$thejson[] = array("title"=>$event->title,"url"=>"./?view=editreservation&id=".$event->id,"start"=>$event->date_at."T".$event->time_at);
	$thejson[] = array("title"=>"\n Cli: ".$client->name."\n Esp: ".$user->name." ".$user->lastname,"url"=>"./?view=editreservation&id=".$event->id,"start"=>$event->sdate_at."T".$event->stime_at);
}
// print_r(json_encode($thejson));

?>
<script>


	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '<?php echo date('Y-m-d');?>',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo json_encode($thejson); ?>
		});
		
	});

</script>


<div class="row">
	<div class="col-md-12">
		<h1>Calendario</h1>
		<div id="calendar"></div>
	</div>
</div>

<!--
<div class="panel panel-default">
<div class="panel-heading">Actividad</div>
	<div class="panel-body">
		<div id="calendar"></div>
	</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Agenda</h4>
  </div>
  <div class="card-content table-responsive">
<div id="calendar"></div>
</div>
</div>
</div>
</div>
-->