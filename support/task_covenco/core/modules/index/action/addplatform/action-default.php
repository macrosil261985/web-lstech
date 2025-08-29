<?php

$r = new PlatformData();
$r->name = $_POST["name"];
$r->description = htmlspecialchars($_POST["description"]);

$brand_id = "NULL";
if($_POST["brand_id"]!=""){ $brand_id = $_POST["brand_id"]; }
$r->brand_id = $brand_id;

//$r->user_id = $_SESSION["user_id"];
$r->add();

Core::redir("./index.php?view=platforms");
?>