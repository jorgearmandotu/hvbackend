<?php
require_once('dataDb.php');
header('Access-Control-Allow-Origin: +');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
ob_start();

$user = "";
$exist = true;
$json = file_get_contents('php://input');
if($json != ""){
    $obj = json_decode($json);
    if(isset($obj->user)){
        $user = $obj->user;
        $user = htmlentities(addslashes(trim(strip_tags($user))));

        $db = new DataDb();
        $mbd = $db->connect();
        $user = $db->validUser($mbd, $user);
        $exist = false;
        foreach ($user as $usuario){
            $exist = true;
        }
    }
}
if($exist){
    print_r('true');
}else{
    print_r('false');
}


header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
ob_end_flush();

?>