<?php>

$host = '198.71.241.38';
$usuario = 'vymtechn_cfcorre';
$pass = 'QVPx{b?f4oWg';

$conn = mysql_connect($host, $usuario, $pass) or die ('Error conectando a la base de datos');

$bdnombre = 'vymtechn_cf';
mysql_select_db($bdnombre);
