<?php

if(count($_POST)>0){
	$event = EventData::getById($_POST["id"]);

	//$event->title = "Orden de Servicio";//$_POST["title"];
	//$event->client_id = $_POST["client_id"];
	//$event->user_id = $_POST["user_id"];
	//$_SESSION["user_id"];
	$event->sdate_at = $_POST["sdate_at"];
	$event->stime_at = $_POST["stime_at"];
	$event->fdate_at = $_POST["fdate_at"];
	$event->ftime_at = $_POST["ftime_at"];
	$event->brand_id = $_POST["brand_id"];
	$event->platform_id = $_POST["platform_id"];
	
	$event->modeltype = $_POST["modeltype"];
	$event->serialnumber = $_POST["serialnumber"];
	$event->ticketnumber = $_POST["ticketnumber"];
	
	$event->description = $_POST["description"];
	
	$category_id = "NULL";
	if($_POST["category_id"]!=""){ $category_id = $_POST["category_id"]; }
	$event->category_id = $category_id;
	
	$project_id = "NULL";
	if($_POST["project_id"]!=""){ $project_id = $_POST["project_id"]; }
	$event->project_id = $project_id;
	
	$event->priority_id = $_POST["priority_id"];
	$event->status_id = $_POST["status_id"]; 

	
/*
	if (!file_exists($_FILES['upfile']['tmp_name']) || !is_uploaded_file($_FILES['upfile']['tmp_name'])) 
	{
		echo 'No upload';
		$event->add();
	}
	else
	{
		//echo 'Yes upload';// Your file has been uploaded
		$upfile = new Upload($_FILES["upfile"]);
		if($upfile->uploaded){
		  $upfile->Process("storage/uploads/");
		  if($upfile->processed){
			$event->upfile = $upfile->file_dst_name;
			$event->add_with_file();
		  }
		}else{
			$event->add();
		}    
	}
*/
	$event->update();
	print "<script>window.location='index.php?view=reservations';</script>";
}
?>