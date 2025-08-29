<?php
/**
* @author SMR
* @brief Libera la bestia ...
**/

session_start();
include "core/autoload.php";

// si quieres que se muestre las consultas SQL debes decomentar la siguiente linea
 //Core::$debug_sql = true;

$lb = new Lb();
$lb->loadModule("index");

?>