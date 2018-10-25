<?php
 require_once 'dataDb.php';
 
 ob_start();

 $db = new DataDb();
 $mbd = $db->connect();
 $consulta = $db->allProductsCategory($mbd);
 $json = json_encode($consulta, JSON_UNESCAPED_UNICODE);
 print_r($json);

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
ob_end_flush();
?>
