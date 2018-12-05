<?php
header('Access-Control-Allow-Origin: +');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
ob_start();

session_start();
/*if(isset($_SESSION['user'])){ //empty()
session_destroy();
print_r(json_encode(true));
}else{
    print_r(json_encode(false));
}*/
if(isset($_SESSION['user'])){
    $a = array('status'=>$_SESSION['user']);
    session_destroy();
    print_r(json_encode($a));
}else{
    $a = array('status'=>'NoLog');
    print_r(json_encode($a));
}


header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
ob_end_flush();
?>