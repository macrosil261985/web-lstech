<?php

if(count($_POST)>0){
	$user = new ClientData();
	$user->name = $_POST["name"];
	$user->address = $_POST["address"];
	$user->contact = $_POST["contact"];
	$user->phone = $_POST["phone"];
	$user->add();

print "<script>window.location='index.php?view=clients';</script>";

}

?>