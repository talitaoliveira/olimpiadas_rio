<?php

//require_once (__DIR__ . '/Mensagem.php');
require_once (__DIR__ . '/MensagemCrud.php');

if(isset($_POST['inserir_mensagem'])){
	inserirMensagem($_POST);
}

function inserirMensagem($arrayMensagem){

	try{

		if($arrayMensagem['strNome'] == ""){
			throw new Exception("Campo Nome não pode ser em branco <br><a href='../index.php'>voltar</a>");
		}

		if($arrayMensagem['strRemetente'] == ""){
			throw new Exception("Campo Remetente não pode ser em branco <br><a href='../index.php'>voltar</a>");
		}

		$nomeimg = "";
		if($_FILES['strImagem']['name'] != ""){
			$nomeimg = uploadImagem($_FILES);
		}

		$mensagem = new Mensagem(null,
								 $_POST['strNome'],
								 $_POST['strRemetente'],
								 $_POST['strMensagem'],
								 $nomeimg,
								 date('Y-m-d'));

		$insere = new MensagemCrud();
		$insere->insert($mensagem);

		echo "Inserido com sucesso!<br><a href='../index.php'>voltar</a>";

	}catch(Exception $e){
		echo $e->getMessage();

	}
}

function uploadImagem($arrayImg){
	try{

		$img     = $arrayImg['strImagem'];
		$nome    = $img['name'];
		$tipoimg    = $img['type'];
		$tamanho = $img['size'];

		// Validações básicas
		// Formato
		if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/', $tipoimg)){
		    throw new Exception('Isso não é uma imagem válida');
		    exit;
		}

		list($image,$tipo) = explode('/', $tipoimg);


		$new_name = date("Y.m.d-H.i.s") . ".".$tipo;
		$dir = '../imagens/'; //Diretório para uploads

  		move_uploaded_file($img['tmp_name'], $dir.$new_name);

		return $new_name;

	}catch(Exception $e){
		echo $e->getMessage();

	}
}



?>