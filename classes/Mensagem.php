<?php

class Mensagem{

	protected $table = "mensagens";

	private $id;
	private $nome;
	private $remetente;
	private $mensagem;
	private $imagem;
	private $data;

	public function __construct($id, $nome, $remetente, $mensagem, $imagem, $data){

		$this->id        = $id;
		$this->nome      = $nome;
		$this->remetente = $remetente;
		$this->mensagem  = $mensagem;
		$this->imagem    = $imagem;
		$this->data      = $data;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}

	public function setRemetente($remetente){
		$this->remetente = $remetente;
	}
	public function getRemetente(){
		return $this->remetente;
	}

	public function setMensagem($mensagem){
		$this->mensagem = $mensagem;
	}
	public function getMensagem(){
		return $this->mensagem;
	}

	public function setImagem($imagem){
		$this->imagem = $imagem;
	}
	public function getImagem(){
		return $this->imagem;
	}

	public function setData($data){
		$this->data = $data;
	}
	public function getData(){
		return $this->data;
	}

}

?>
