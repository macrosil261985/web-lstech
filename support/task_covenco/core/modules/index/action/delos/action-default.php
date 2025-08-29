<?php
$user = OsData::getById($_GET["id"]);
$user->del();
print "<script>window.location='index.php?view=oss';</script>";

?>