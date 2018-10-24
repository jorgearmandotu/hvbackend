<?php
	class DataValues{
		private $nameDb = "hvdataBase";
		private $passwordDb = "Jorge1990";
		private $userDb = "root";
	
		private $post = "post";
		private $idPost = "IdPost";
		private $titlePost = "titlePost";
		private $autorPost = "autor";
		private $datePost = "datePost";
		private $contentPost = "ContentPost";
	
		private $asets = "asets";
		private $idAset = "idAset";
		private $urlAset = "urlAset";
		private $nameAset = "nameAset";
		private $sizeAset = "size";
	
		private $products = "products";
		private $idProduct = "Idproduct";
		private $nameProduct = "nameProduct";
		private $descriptionProduct = "descriptionProduct";
		private $priceProduct = "price";
		private $urlImageProducts = "urlImage";
		private $categoryProduct = "category";
		
		private $users = "Users";
		private $idUser = "IdUser";
		private $nameUser = "name";
		private $lastNameUser = "lastName";
		private $emailUser = "email";
		private $phoneUser = "phone";
		private $passwordUser = "password";
		private $typeUser = "administrador";
		
		//function __construct() {		}
		public function getNameDb () {
			return $this->nameDb;
		}
		public function getPasswordDb() { return $this->passwordDb; }
		public function getUserDb() { return $this->userDb; }
		
		public function getPost() { return $this->post; }
		public function getIdPost() { return $this->IdPost; }
	}
	
?>
