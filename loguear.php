<?php
header('Access-Control-Allow-Origin: +');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

require_once('dataDb.php');
function login(){
  $db = new DataDb();
  $mbd = $db->connect();
  if (isset($_POST['user']) && isset($_POST['password'])){
    $consulta = $db->login($mbd, $_POST['user'], $_POST['password']);
      if($consulta->rowCount() == 1){
          if(!isset($_SESSION['user'])){
            session_start();
            $_SESSION['user']=$_POST['user'];
            return true;
          }
        }else { return false;}
      }else { return false;
      }
}

  $res = array(login());
  $jsonvar = json_encode($res);
  print($jsonvar);

    
  header('Content-Type: application/json');
?>
