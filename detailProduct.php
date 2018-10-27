<?php
require_once('dataDb.php');
ob_start();
$id =  $_GET['id'];
$id = htmlentities(addslashes(trim(strip_tags($id))));

$db = new DataDb();
$mbd = $db->connect();

$product = $db->getProduct($mbd, $id);
$jsonProduct = json_encode($product, JSON_UNESCAPED_UNICODE );
print_r($jsonProduct);

   
   
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
ob_end_flush();
?>