<?php
include "../core/autoload.php";
include "../core/modules/index/model/EventData.php";
include "../core/modules/index/model/ClientData.php";
include "../core/modules/index/model/UserData.php";

//include "../core/modules/model/CategoryData.php";
session_start();

require_once '../PhpWord/Autoloader.php'; 
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

Autoloader::register();

$word = new PhpOffice\PhpWord\PhpWord();

$arithmetic = new Arithmetic();

//$events = EventData::getAll();
$results = $_SESSION["report_data"];
//var_dump($osresults);

$section1 = $word->AddSection();
$section1->addText("Ordenes de Servicio",array("size"=>22,"bold"=>true,"align"=>"right"));
$section1->addText("");
$section1->addText("");
$styleTable = array('borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 40);
$styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => 'AAAAAA');

$table1 = $section1->addTable("table1");
$table1->addRow();
$table1->addCell()->addText("Nº Orden");
$table1->addCell()->addText("Ticket Cliente");
$table1->addCell()->addText("Cliente");
$table1->addCell()->addText("Especialista");
$table1->addCell()->addText("Fecha/Hora Inicio");
$table1->addCell()->addText("Fecha/Hora Término");
$table1->addCell()->addText("Horas Ocupadas");
$table1->addCell()->addText("Descripción");

$hours= array();
foreach($results as $rs){
	$client = $rs->getClient();
	$specialist = $rs->getUser();

	$table1->addRow();
	$table1->addCell(500)->addText($rs->id);
	$table1->addCell(500)->addText($rs->ticketnumber);
	$table1->addCell(500)->addText($client->name);
	$table1->addCell(500)->addText($specialist->name." ".$specialist->lastname);
	if($rs->start_at=="0000-00-00 00:00:00"){
		$table1->addCell(500)->addText("");
	}else{
		$table1->addCell(500)->addText($rs->start_at);
	}

	if($rs->finish_at=="0000-00-00 00:00:00"){
		$table1->addCell(500)->addText("");
	}else{
		$table1->addCell(500)->addText($rs->finish_at);
	}

	if($rs->finish_at=="0000-00-00 00:00:00"){
		$table1->addCell(500)->addText("");
	}else{
		$dteStart = new DateTime($rs->start_at);
   		$dteEnd   = new DateTime($rs->finish_at);
		//
		$dteDiff  = $dteStart->diff($dteEnd); 
		//
		$hours[]=$dteDiff->format("%H:%I:%S");
		$table1->addCell(500)->addText($dteDiff->format("%H:%I:%S"));
	}
	$table1->addCell(5000)->addText($rs->description);

}

$section1->addText("");
$section1->addText("Total horas ocupadas: ".$arithmetic->accumulateHours($hours),array("size"=>14));

$word->addTableStyle('table1', $styleTable,$styleFirstRow);
//datos bancarios
//$section1->addText("");
//$section1->addText("");
//$section1->addText("");
//$section1->addText("Generado por INNOVA SCIA - Task Covenco v2.0");

$filename = 'OrdenesDeServicio-'.time().'.docx';
#$word->setReadDataOnly(true);
$word->save($filename,"Word2007");
  //chmod($filename,0444);
 
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.$filename.'"');
readfile($filename); // or echo file_get_contents($filename);
unlink($filename);  // remove temp file
?>