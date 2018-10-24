<?php
require_once('dataDb.php');
ob_start();

$db = new DataDb();
$mbd = $db->connect();

$products = $db->allCategorys($mbd);
$jsonProducts = json_encode($products, JSON_UNESCAPED_UNICODE );
print_r($jsonProducts);

   
   
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
ob_end_flush();
?>