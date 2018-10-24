<?php
require_once('dataDb.php');
 $db = new DataDb();
    $mbd = $db->connect();
    $posts = $db->sqlPost($mbd);
  
    /*foreach($posts as $p){
    	//echo($p);
        print('<br>*****json*****<br>');
        $jsonPost = json_encode($p);
        print($jsonPost);
    }*/
    print_r('<br>');
    echo('este es el completo');
    $jsonPost = json_encode($posts);
    print_r($jsonPost);
?>