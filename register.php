<?php
header('Access-Control-Allow-Origin: +');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

ob_start();

require_once('dataDb.php');
$json = file_get_contents('php://input');
if($json != ""){
    $obj = json_decode($json);
    if(isset($obj->lastNames) && isset($obj->names) && isset($obj->id) && isset($obj->email) && isset($obj->user)
       && isset($obj->password) && isset($obj->phone) ) {
        $names = $obj->names;
        $lastNames = $obj->lastNames;
        $identificacion = $obj->id;
        $email = $obj->email;
        $user = $obj->user;
        $password = $obj->password;
        $phone = $obj->phone;
        
        $db = new DataDb();
        $mbd = $db->connect();
        $res = $db->register($mbd, $names, $lastNames, $identificacion, $email, $user, $password, $phone);

        $arr = array('status'=>$res);
        $js = json_encode($arr);
        print_r($js);
    }
    else {
        $arr = array('names'=>'entrando','lastnames'=>$obj);
        $j = json_encode($arr);
        print_r($j);
    }
    
    //$arr = array('names'=>$obj->names,
    //'lastnames'=>$obj->lastNames);
    //$j = json_encode($arr);
}else{
    $arr = array('names'=>'pedro','lastnames'=>'apelldios');
        $j = json_encode($arr);
        print_r($j);
}



header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
ob_end_flush();
?>