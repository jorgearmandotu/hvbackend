<?php
require_once('dataDb.php');
ob_start();
$id =  $_GET['id'];
$id = htmlentities(addslashes(trim(strip_tags($id))));

$db = new DataDb();
$mbd = $db->connect();

$product = $db->getProduct($mbd, $id);
$jsonProduct = json_encode($product, JSON_UNESCAPED_SLASHES  );
print_r($jsonProduct);
$x = '{"Idproduct":"'.$product['Idproduct'].'",'
.'"nameProduct":"'.$product['nameProduct'].'",'
.'"descriptionProduct":"'.$product['descriptionProduct'].'",'
.'"allDescriptionProduct":"'.$product['allDescriptionProduct'].'",'
.'"price":"'.$product['price'].'",'
.'"urlImage":"'.$product['urlImage'].'",'
.'"category":"'.$product['category'].'"}';
//print_r(json_encode($x, JSON_PRETTY_PRINT));
   
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
ob_end_flush();
?>