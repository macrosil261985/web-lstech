<?php

if(count($_POST)>0){
	$os = OsData::getById($_POST["id"]);
	$os->name = $_POST["name"];

	$platform_id = "NULL";
	if($_POST["platform_id"]!=""){ $platform_id = $_POST["platform_id"]; }
	$os->platform_id = $platform_id;

	$os->description = htmlspecialchars($_POST["description"]);
	$os->update();

	print "<script>window.location='index.php?view=oss';</script>";

}

?>