<?php

require_once (__DIR__ . '/Mensagem.php');
require_once (__DIR__ . '/DB.php');

class MensagemCrud extends DB{

	protected $table = "mensagens";
	private static $instance;

	private $conn;

	public function __construct(){
		$this->conn = DB::getInstance();
	}

	public static function getInstance(){
		if(!isset(self::$instance)){
			self::$instance = new MensagemCrud();
		}
		return self::$instance;
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
		try{
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

		}catch(PDOException $e){
			throw new PDOException("ERRO INSERIR: " . $e->getMessage());
		}

	}

	public function findAll(){
		try{
			$sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

			$arrayRegistros = array();

			while($registro = $stmt->fetch()){
				$arrayRegistros[] = $this->criarObjeto($registro);
			}

			return $arrayRegistros;
		}catch(PDOException $e){
			throw new PDOException("ERRO BUSCAR: " . $e->getMessage());
		}
	}
}

?>
