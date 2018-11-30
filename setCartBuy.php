<?php
header('Access-Control-Allow-Origin: +');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
ob_start();

require_once('dataDb.php');
session_start();


if(isset($_GET['carr']) && isset($_SESSION['id'])){
  $carr = $_GET['carr'];
  $carr = htmlentities(addslashes(trim(strip_tags($carr))));
  $db = new DataDB();
  $mbd = $db->connect();
  $db->addCar($mbd, $carr, $_SESSION['id']);
  //$carr = html_entity_decode(stripslashes($carr));//devulbe json a su estado normal :)
  //$carr = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($carr) : mysqli_escape_string($carr);
  print_r($carr);
}elseif(isset($_SESSION['id'])){
    $db = new DataDB();
    $mbd = $db->connect();
    $res = $db->getCartBuy($mbd, $_SESSION['id']);
    $res = html_entity_decode(stripslashes($res));
    print_r($res);
}else{
  print_r(json_encode(false));
}


  header('Content-type: application/json');
  header("Access-Control-Allow-Origin: *");
  ob_end_flush();
?>
