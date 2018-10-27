<?php
require_once('dataValues.php');
require_once('post.php');

class DataDb{
	
	private $dataName;
	private $dataPass;
	private $dataUser;
	private $datahost;
	function __construct(){
		$datos = new DataValues();
		$this->dataName = $datos->getNameDb();
		$this->dataPassword = $datos->getPasswordDb();
		$this->dataUser = $datos->getUserDb();
	}
	
	function connect() {
		$mbd;
		try {
			//$mbd = new PDO('mysql:host=localhost;dbname='.$this->dataName, $this->dataUser, $this->dataPassword);
			$mbd = new PDO('mysql:host=localhost;dbname=hvdatabase;charset=utf8', 'root', 'Jorge1990');
			//$mbd->exec("set names utf8");
			}
		catch (PDOException $e) {
    	print_r( "¡Error!: " . $e->getMessage() . "<br/>");
    	die();
    	$mbd = null;
		}
		return $mbd;
	}
	
	function sqlPost($mbd) {
		$res = array();
		$consult = null;
		try{
			$datos = new DataValues();
			$consult = $mbd->query('SELECT * from post');
			foreach($consult as $fila) {
      	  /*print('<br>');
      	  print_r($fila['titlePost']);
      	  print('<br>');*/
      	  $post = new Post();
      	  $post->setTitle($fila['titlePost']);
      	  $post->setId($fila['IdPost']);
      	  $post->setAutor($fila['autor']);
      	  $post->setDatePost($fila['datePost']);
      	  $post->setContent($fila['ContentPost']);
      	  array_push($res, $post);
      	  }
		} catch (PDOException $e) {
			print "¡Error!: " . $e->getMessage() . "<br/>";
    		die();
    		$mbd = null;
		}
		return $res;
	}

	function allCategorys($mbd){
		$res = array();
		$consult = null;
		try{
			$datos = new DataValues();
			$consult = $mbd->query('SELECT * from categoria');
			foreach($consult as $cons){
				array_push($res, $cons);
			}
			}
		catch (PDOException $e) {
			print "¡Error!: " . $e->getMessage() . "<br/>";
    		die();
    		$mbd = null;
		}
		return $res;
	}
	function allProducts($mbd){
		$res = array();
		$consult = null;
		try{
			$datos = new DataValues();
			$consult = $mbd->query('SELECT * from products');
			foreach($consult as $cons){
				array_push($res, $cons);
			}
			}
		catch (PDOException $e) {
			print "¡Error!: " . $e->getMessage() . "<br/>";
    		die();
    		$mbd = null;
		}
		return $res;
	}
	function getProduct($mbd, $id){
		$res = array();
		$consult = null;
		try{
			$datos = new DataValues();
			$consult = $mbd->query('SELECT * FROM products WHERE Idproduct = "'.$id.'"');
			foreach($consult as $cons){
				array_push($res, $cons);
			}
		}catch (PDOExceptio $e){
			"¡Error!: " . $e->getMessage() . "<br/>";
    		die();
    		$mbd = null;
		}
		return $res;
	}

	function allProductsCategory($mbd){
		$categoria=array();
		$productos=array();
		$res = array();
		try{
			$consult= $mbd->query('select * from categoria');
			foreach($consult as $cons){
				$products = $mbd->query('select Idproduct, nameProduct, descriptionProduct, price, urlImage from products where category='.$cons['id']);
				foreach($products as $pro){
					array_push($productos, $pro);
				}
				$categoria['id']=$cons['id'];
				$categoria['nombre']=$cons['nombre'];
				$categoria['products']=$productos;
				
				array_push($res, $categoria);
				$productos = array();
			}	
		}catch (PDOException $e){
			print "error: ".$e.getMessage();
			die();
			$mbd = null;
		}
		return $res;
	}

	function categoryProducts($mbd, $category){
		$res = array();
		$consult = null;
		try{
			$datos = new DataValues();
			$consult = $mbd->query('SELECT * from products WHERE category = '.$category);
			foreach($consult as $cons){
				array_push($res, $cons);
			}
			}
		catch (PDOException $e) {
			print "¡Error!: " . $e->getMessage() . "<br/>";
    		die();
    		$mbd = null;
		}
		return $res;
	}


function login($mbd, $user, $pass){
	$res=null;
	try{
		$mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$consult = 'select * from Users where user= :user and password= :pass';
		$res=$mbd->prepare($consult);
		$usuario = htmlentities(addslashes(trim(strip_tags($user))));
		$pwd = htmlentities(addslashes(trim(strip_tags($pass))));
		$res->bindValue(":user", $usuario);
		$res->bindValue(":pass", $pwd);
		$res->execute();
		$conta= $res->rowCount();
	}catch(PDOException $e){
		print "error: ".$e->getMessage();
		die();
		//$res=null;
	}
	return $res;
	}
}

/*"$dbas = new DataValues();
    //print('<br>');
    print_r($dbas->getNameDb());
function connect() {
	
print_r($dbas->getNameDb());
	/*try {
		print_r($dbas->getNameDb());
    	$mbd = new PDO('mysql:host=localhost;dbname=hvDataBase', 'root', '');
   	 foreach($mbd->query('SELECT * from '.$db.getPost) as $fila) {
      	  print_r($fila);
   	 }
   	 $mbd = null;
	} catch (PDOException $e) {
    	print "¡Error!: " . $e->getMessage() . "<br/>";
    	die();
		}*/
	//}
?>
    
    
    
