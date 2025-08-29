<?php

if(count($_POST)>0){
	$user = PlatformData::getById($_POST["id"]);
	$user->name = $_POST["name"];

	$brand_id = "NULL";
	if($_POST["brand_id"]!=""){ $brand_id = $_POST["brand_id"]; }
	$user->brand_id = $brand_id;

	$user->description = htmlspecialchars($_POST["description"]);
	$user->update();

	print "<script>window.location='index.php?view=platforms';</script>";

}

?>