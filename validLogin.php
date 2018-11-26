<?php
/*
header('Access-Control-Allow-Origin: +');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
*/
ob_start();
session_start();
function validarsession(){
    
    if(isset($_SESSION['user'])){
        return $_SESSION['user'];
    }else{ return "no valido"; }
}
$res = array('status'=>validarsession());
$jsonrest = json_encode($res);
print_r($jsonrest);

//header('Content-Type: application/json');
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
ob_end_flush();
?>