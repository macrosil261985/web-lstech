<?php

$r = new OsData();
$r->name = $_POST["name"];
$r->description = htmlspecialchars($_POST["description"]);

$platform_id = "NULL";
if($_POST["platform_id"]!=""){ $platform_id = $_POST["platform_id"]; }
$r->platform_id = $platform_id;

$r->add();

Core::redir("./index.php?view=oss");
?>