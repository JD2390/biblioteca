<?php

class Acervo{
	
	private $id;
	private $isbn;
	private $autor;
	private $titulo;
	private $ano_publicacao;
	private $editora;
	private $npaginas;
	private $exemplar;

	public function __construct ($isbn, $autor, $titulo, $ano_publicacao, $editora, $npaginas, $exemplar){
		$this->isbn = $isbn;
		$this->autor = $autor;
		$this->titulo = $titulo;
		$this->ano_publicacao = $ano_publicacao;
		$this->editora = $editora;
		$this->npaginas = $npaginas;
		$this->exemplar = $exemplar;

	}

	public function getId(){
		return $this->id;
	}
	public function getIsbn(){
		return $this->isbn;
	}
	public function getAutor(){
		return $this->autor;
	}
	public function getTitulo(){
		return $this->titulo;
	}
	public function getAno_publicacao(){
		return $this->ano_publicacao;
	}
	public function getEditora(){
		return $this->editora;
	}
	public function getNpaginas(){
		return $this->npaginas;
	}
	public function getExemplar(){
		return $this->exemplar;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function setIsbn($isbn){
		$this->isbn = $isbn;
	}
	public function setAutor($autor){
		$this->autor = $auto;
	}
	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}
	public function setAno_plublicacao($ano_publicacao){
		$this->ano_publicacao = $ano_publicacao;
	}
	public function setEditora($editora){
		$this->editora = $editora;
	}
	public function setNpaginas($npaginas){
		$this->npaginas = $npaginas;
	}
	public function setExemplar($exemplar){
		$this->exemplar = $exemplar;
	}
}
?>