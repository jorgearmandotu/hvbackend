
<?php
//echo '<meta http-equiv="Content-type" content="text/html; charset=utf-8" />';
require_once('dataValues.php');
require_once('dataDb.php');
//ob_start();



    $dataArray = array(['url' => 'http://localhost/my-site/images/1.jpeg', 'alt' => 'description imagen 1 alt', 'description' => 'descrtipcion de imagen parrafo'],
    ['url' => 'http://localhost/my-site/images/2.jpg', 'alt' => 'descriptiopn imagen 2 alt', 'description' => 'descripcion de imagen parrafo'],
    ['url' => 'http://localhost/my-site/images/2.jpg', 'alt' => 'descriptiopn imagen 2 alt', 'description' => 'descripcion de imagen parrafo'],
    ['url' => 'http://localhost/my-site/images/2.jpg', 'alt' => 'descriptiopn imagen 2 alt', 'description' => 'descripcion de imagen parrafo'],
    ['url' => 'http://localhost/my-site/images/2.jpg', 'alt' => 'descriptiopn imagen 2 alt', 'description' => 'descripcion de imagen parrafo']);
    $json = json_encode($dataArray);
    print_r($json);

    header('Content-type: application/json');
    header("Access-Control-Allow-Origin: *");
    ob_end_flush();


    

    /*$db = new DataDb();
    $mbd = $db->connect();
    $posts = $db->sqlPost($mbd);
  
    foreach($posts as $p){
    	//echo($p);
        print('<br>*****json*****<br>');
        $jsonPost = json_encode($p);
        print($jsonPost);
    }
    print_r('<br>');
    echo('este es el completo');
    $jsonPost = json_encode($posts);*/
    //print_r($jsonPost);
?>
    
