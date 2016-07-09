<?php

require_once (__DIR__ . '/Mensagem.php');
require_once (__DIR__ . '/DB.php');

class MensagemCrud extends DB{

	protected $table = "mensagens";

	private $conn;

	public function __construct(){
		$this->conn = DB::getInstance();
	}

	private function criarObjeto($registro){

		$objMensagem = new Mensagem($registro['id'],
								 	$registro['nome'],
								 	$registro['remetente'],
								 	$registro['mensagem'],
								 	$registro['imagem'],
								 	$registro['data']);

		return $objMensagem;

	}

	public function insert(Mensagem $objMensagem){

		$sql = "INSERT INTO {$this->table} (nome,
											remetente,
											mensagem,
											imagem,
											data)
									VALUES (:nome,
											:remetente,
											:mensagem,
											:imagem,
											:data)";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(":nome",$objMensagem->getNome());
		$stmt->bindValue(":remetente",$objMensagem->getRemetente());
		$stmt->bindValue(":mensagem",$objMensagem->getMensagem());
		$stmt->bindValue(":imagem", ($objMensagem->getImagem() != null) ? $objMensagem->getImagem() : "" );
		$stmt->bindValue(":data", $objMensagem->getData());

		return $stmt->execute();
	}

	public function findAll(){
		try{
			$sql = "SELECT * FROM {$this->table}";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

			$arrayRegistros = array();

			while($registro = $stmt->fetch()){
				$arrayRegistros[] = $this->criarObjeto($registro);
			}

			return $arrayRegistros;
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function find($id){
		try{
			$sql = "SELECT * FROM {$this->table} WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(":id",$id);
			$stmt->execute();
			return $stmt->fetch();
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

}

?>
