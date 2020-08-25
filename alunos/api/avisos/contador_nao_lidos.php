<?php
require_once("../../ambiente.php");
$url = URL_NODE_BACKEND."CountAvisos/12";

$json = file_get_contents($url);
$json = json_decode($json);
echo $lat = $json->total;

?>