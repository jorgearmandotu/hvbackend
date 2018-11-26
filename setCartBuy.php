<?php
header('Access-Control-Allow-Origin: +');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
ob_start();

require_once('dataDb.php');
$id = $_GET['id'];
$cant = $_GET['cant'];

if( $id!="" && $cant!="") {
    $db = new DataDB();
    $mbd = $db->connect();
    $temp = $db->getCartBuy($mbd, $id);
    $v = 'id'=>$id, 'cant'=>$cant;
    array_push($temp, 'id'=>$id);
    print_r($temp);
}


//print_r($temp2);
//$json = file_get_contents('php://input');
//$obj = json_decode($json);

//session_start();
//$_SESSION['user'] = 'usercreating';
//$_SESSION['tipo']= 'invitaado';


/*function addCart($temp){
  $db = new DataDb();
  $mbd = $db->connect();
  //$json = file_get_contents('php://input');
  if($temp != ''){
    return $temp;
  }else{
    return '{"lala":":p:p"}';
  }
}

  //$res = array($obj);
  $res = array('status'=>addCart($temp));
  //array_push($res, array('status'=>login()));
  $jsonvar = json_encode($res);
  print($jsonvar);*/

    
  //header('Content-Type: application/json');
  header('Content-type: application/json');
  header("Access-Control-Allow-Origin: *");
  ob_end_flush();
?>
