<?php
require_once('dataDb.php');
ob_start();

$db = new DataDb();
$mbd = $db->connect();
if (isset($_GET['category']) && !empty($_GET['category'])) {
    $products = $db->categoryProducts($mbd, $_GET['category']);
    $jsonProducts = json_encode($products, JSON_UNESCAPED_UNICODE );
    print_r($jsonProducts);
  }
else {
    $products = $db->allProducts($mbd);
    $jsonProducts = json_encode($products, JSON_UNESCAPED_UNICODE );
    print_r($jsonProducts);
}
   
   
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
ob_end_flush();
?>