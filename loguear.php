<?php

require_once('dataDb.php');

  $db = new DataDb();
  $mbd = $db->connect();
  echo'alert('.$_POST['user'].')';
  $consulta = $db->login($mbd, $_POST['user'], $_POST['password']);
  if($consulta->rowCount() == 1){
  	header('location:logueado.php');
  }
  else{
  	print('y no me logue');
  	print_r($consulta->rowCount());
  	}
?>
