<?php

if(count($_POST)>0){
	$user = ClientData::getById($_POST["id"]);

	$user->name = $_POST["name"];
	$user->address = $_POST["address"];
	$user->contact = $_POST["contact"];
	$user->phone = $_POST["phone"];
	$user->update();

print "<script>window.location='index.php?view=clients';</script>";

}

?>