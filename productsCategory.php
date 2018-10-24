<?php
 require_once 'dataDb.php';
 
 ob_start();

 $db = new DataDb();
 $mbd = $db->connect();
 $consulta = $db->allProductsCategory($mbd);
 print_r($consulta);

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
ob_end_flush();
?>
