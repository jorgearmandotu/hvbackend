<?php
header('Access-Control-Allow-Origin: +');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

ob_start();

require_once('dataDb.php');
$json = file_get_contents('php://input');
$obj = json_decode($json);

if($json != ""){
    $obj = json_decode($json);
    if(isset($obj->names) && isset($obj->lastNames) && isset($obj->id) && isset($obj->phone)
    && isset($obj->email) && isset($obj->user) && isset($obj->password)) {
        $names = $obj->names;
        $lastNames = $obj->lastNames;
        $identificacion = $obj->id;
        $email = $obj->email;
        $user = $obj->user;
        $password = $obj->password;
        $phone = $obj->phone;
        
        $db = new DataDb();
        $mbd = $db->connect();
        //$res = $db->register($mbd, $names, $lastNames, $identificacion, $email, $user, $password, $phone);

        $arr = array('hola'=>'mundo','pedro'=>'suares');
        $js = json_encode($arr);
        print_r($js);
    }
    //$arr = array('names'=>$obj->names,
    //'lastnames'=>$obj->lastNames);
    //$j = json_encode($arr);
}



header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
ob_end_flush();
?>