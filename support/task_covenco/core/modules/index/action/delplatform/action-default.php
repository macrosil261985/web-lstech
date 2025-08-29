<?php
$user = PlatformData::getById($_GET["id"]);
$user->del();
print "<script>window.location='index.php?view=platforms';</script>";

?>