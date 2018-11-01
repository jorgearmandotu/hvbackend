<?php
//header('Access-Control-Allow-Origin: +');
//header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
ob_start();

require_once('dataDb.php');
$json = file_get_contents('php://input');
$obj = json_decode($json);

//$_POST['user'] = 'Admin';
//$_POST['password'] = '12312';


function login(){
  $db = new DataDb();
  $mbd = $db->connect();
  $json = file_get_contents('php://input');
  $obj = json_decode($json);
  if (isset($obj->user) && isset($obj->password)){
    $consulta = $db->login($mbd, $obj->user, $obj->password);
      if($consulta->rowCount() == 1){
        
          if(!isset($_SESSION['user'])){
            
            session_start();
            
            $_SESSION['user']=$obj->user;
            return true;
          }
        }else { return false;}
      }else { return false;
        }
      
}

  //$res = array($obj);
  $res = array('status'=>login($obj));
  //array_push($res, array('status'=>login()));
  $jsonvar = json_encode($res);
  print($jsonvar);

    
  //header('Content-Type: application/json');
  header('Content-type: application/json');
  header("Access-Control-Allow-Origin: *");
  ob_end_flush();
?>
