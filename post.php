<?php

class Post{
	
	public $id;
	public $title;
	public $autor;
	public $datePost;
	public $content;
	
	function __construct() { }
	
	function setId($id) { $this->id = $id; }
	function getId() { return $this->id; }
	function setTitle($title) { $this->title = $title; }
	function getTitlw() { return $this->title; }
	function setAutor($autor) { $this->autor = $autor; }
	function getAutor() { return $this->autor; }
	function setDatePost($datePost) { $this->datePost = $datePost; }
	function getDatePost() { return $this->datePost; }
	function setContent($content) { $this->content = $content; }
	function getContent() { return $this->content; }
	
}

?>
