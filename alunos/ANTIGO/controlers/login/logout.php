<?php
ob_start();
require ("../../config.php");

$session = new SESSION();
$session->Logout();

?>