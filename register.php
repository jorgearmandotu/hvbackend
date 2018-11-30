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
        $names = htmlentities(addslashes(trim(strip_tags($names))));
        $lastNames = $obj->lastNames;
        $lastNames = htmlentities(addslashes(trim(strip_tags($lastNames))));
        $identificacion = $obj->id;
        $identificacion = htmlentities(addslashes(trim(strip_tags($identificacion))));
        $email = $obj->email;
        $email = htmlentities(addslashes(trim(strip_tags($email))));
        $user = $obj->user;
        $user = htmlentities(addslashes(trim(strip_tags($user))));
        $password = $obj->password;
        $password = htmlentities(addslashes(trim(strip_tags($password))));
        $phone = $obj->phone;
        $phone = htmlentities(addslashes(trim(strip_tags($phone))));
        
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