<?php
/*
header('Access-Control-Allow-Origin: +');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
*/
ob_start();

function validarsession(){
    session_start();
    if(isset($_SESSION['user'])){
        return true;
    }else{ return false; }
}
$res = array();
array_push($res, array('status'=>validarsession()));
$jsonrest = json_encode($res);
print_r($jsonrest);

//header('Content-Type: application/json');
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
ob_end_flush();
?>