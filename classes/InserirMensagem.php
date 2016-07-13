<?php

require_once (__DIR__ . '/MensagemCrud.php');

/* DEFININDO VARIÁVEL $arrObjMensagens PARA SER ACESSADA NA VIEW */

try{
	$arrObjMensagens = MensagemCrud::getInstance()->findAll();
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}

if(isset($_POST['inserir_mensagem'])){
	inserirMensagem($_POST);
}

function inserirMensagem($arrayMensagem = array()){

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
			if($nomeimg == null){
				exit;
			}
		}

		if($_FILES['strImagem']['name'] == "" && $arrayMensagem['strMensagem'] == ""){
			throw new Exception("Coloque ao menos um tipo de mensagem: imagem ou texto<br><a href='../index.php'>voltar</a>");
		}

		$mensagem = new Mensagem(null,
								 $arrayMensagem['strNome'],
								 $arrayMensagem['strRemetente'],
								 $arrayMensagem['strMensagem'],
								 $nomeimg,
								 date('Y-m-d'));

		MensagemCrud::getInstance()->insert($mensagem);

		echo "Inserido com sucesso!<br><a href='../index.php'>voltar</a>";

	}catch(Exception $e){
		echo $e->getMessage();

	}
}

function uploadImagem($arrayImg = array()){
	try{

		$img     = $arrayImg['strImagem'];
		$nome    = $img['name'];
		$tipoimg = $img['type'];
		$tamanho = $img['size'];

		/* validção do formato do aquivo */
		if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp|jpg|JPG)$/', $tipoimg)){
		    throw new Exception("Não é uma imagem válida<br><a href='../index.php'>voltar</a>");
		    return false;
		}

		list($image,$tipo) = explode('/', $tipoimg);

		/* criando hash do nome da imagem */
		$novo_nome_imagem = md5($nome.date("Y.m.d-H.i.s")) . ".".$tipo;

		$pasta_imagens = '../img_mensagem/';

  		move_uploaded_file($img['tmp_name'], $pasta_imagens.$novo_nome_imagem);

		return $novo_nome_imagem;

	}catch(Exception $e){
		echo $e->getMessage();

	}
}



?>