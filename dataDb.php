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
	function getCartBuy($mbd, $user){
		$res = false;
		$consult = null;
		$sql = 'SELECT shopping FROM shoppingcart WHERE user = '.$user;
		$consult = $mbd->query($sql);
		foreach($consult as $cons){
			$res = $cons['shopping'];
		}
		return $res;
	}
	function getProduct($mbd, $id){
		$res;
		$consult = null;
		try{
			$datos = new DataValues();
			$consult = $mbd->query('SELECT * FROM products WHERE Idproduct = "'.$id.'"');
			foreach($consult as $cons){
				//array_push($res, $cons);
				$product = array('Idproduct'=>$cons['Idproduct'],
						'nameProduct'=>$cons['nameProduct'],
						'descriptionProduct'=>$cons['descriptionProduct'],
						'allDescriptionProduct'=>$cons['allDescriptionProduct'],
						'price'=>$cons['price'],
						'urlImage'=>$cons['urlImage'],
						'category'=>$cons['category']);
				$res = $product;
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
				$products = $mbd->query('select Idproduct, nameProduct, allDescriptionProduct, price, urlImage from products where category='.$cons['id']);
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

	function validUser($mbd, $user){
		$res = null;
		try{
			$mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$consult = 'select user from Users where user= :user';
			$res=$mbd->prepare($consult);
			$usuario = htmlentities(addslashes(trim(strip_tags($user))));
			$res->bindValue(":user", $user);
			$res->execute();
		}catch(PDOException $e){
			print "error: ".$e->getMessage();
			die();
		}
		return $res;
	}

	public function validEmail($mbd, $email){
		$res = null;
		try{
			$mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$consult = 'select email from Users where email= :email';
			$res=$mbd->prepare($consult);
			$usuario = htmlentities(addslashes(trim(strip_tags($email))));
			$res->bindValue(":email", $email);
			$res->execute();
		}catch(PDOException $e){
			print "error: ".$e->getMessage();
			die();
		}
		return $res;
	}

	function login($mbd, $user, $sql){
		$res=null;
		//$mail = false;
		
		$usuario = htmlentities(addslashes(trim(strip_tags($user))));
		try{
			$mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			
			$res=$mbd->prepare($sql);
			
	
			$res->bindValue(":user", $usuario);
			$res->execute();
			//$conta= $res->rowCount();
		}catch(PDOException $e){
			print "error: ".$e->getMessage();
			die();
			//$res=null;
		}
		return $res;
	}

	function register($mbd, $names, $lastNames, $identificacion, $email, $user, $password, $phone){
		$res = false;
		try {
			$mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$consult = 'INSERT into users VALUES(?, ?, ?, ?,? ,?,?,?)';
			$sentencia = $mbd->prepare($consult);
			$admin = 0;
			$sentencia->bindParam(1, $identificacion);
			$sentencia->bindParam(2, $names);
			$sentencia->bindParam(3, $lastNames);
			$sentencia->bindParam(4, $email);
			$sentencia->bindParam(5, $phone);
			$password = password_hash($password, PASSWORD_DEFAULT);
			$sentencia->bindParam(6, $password);
			$sentencia->bindParam(7, $admin);
			$sentencia->bindParam(8, $user);

			if ($sentencia->execute()) $res = true;
		}catch(PDOException $e){
			$res = false;
		}
		return $res;
	}

	function addCar($mbd, $carr, $user){
		$sql = 'INSERT INTO shoppingcart (user, shopping) VALUES ("'.$user.'", "'.$carr.'")';
		$consult = $mbd->query($sql);
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
    
    
    
