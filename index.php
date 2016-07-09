<?php

require_once (__DIR__ . '/classes/InserirMensagem.php');
require_once (__DIR__ . '/classes/MensagemCrud.php');
require_once (__DIR__ . '/classes/Util.php');

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Olimpíadas Rio 2016</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<div class="container">
		<h1 class="text-center menu-home" >
			Olimpíadas Rio 2016
		</h1>
		<br>
		<ol class="breadcrumb">
		  <li class="active"><a href="#" class="menu-home">Home</a></li>
		  <li><a href="#" class="menu-nova-mensagem">Nova Mensagem</a></li>
		  <li><a href="#" class="menu-creditos">Créditos</a></li>
		</ol>
		<section id="mensagens" style="height:500px">
			<h2>Mensagens</h2>
			<br>
			<?php
				if(!empty($arrObjMensagens)){
					foreach ($arrObjMensagens as $objMensagem) { ?>
					<blockquote>
						<p><?php echo "Nome: " . $objMensagem->getNome() ?></p>
						<?php if($objMensagem->getImagem() != ""){?>
							<img src="img_mensagem/<?php echo $objMensagem->getImagem()?>" alt="" class="img-thumbnail">
						<?php }?>
						<p id="texto-mensagem"><?php echo ($objMensagem->getMensagem() != "") ? '<br>"'.$objMensagem->getMensagem() . '"' : ""; ?></p>
						<footer><?php echo "Remetente: " . $objMensagem->getRemetente() . " [".Util::invereterData($objMensagem->getData())."]";?></footer>
					</blockquote>
				<?php }
			}else{?>
				<span class="span-center">Nenhuma mensagem cadastrada.</span>
			<?php } ?>
		</section>
		<section id="nova-mensagem">
			<h2>Nova Mensagem</h2>
			<br>
			<form enctype="multipart/form-data" id="formNovaMensagem" method="post" action="classes/InserirMensagem.php">
				<div class="form-group">
					<input type="text" class="form-control" id="strNome" name="strNome" placeholder="Nome">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="strRemetente" name="strRemetente" placeholder="Remetente">
				</div>
				<div class="form-group">
					<label for="strImagem">Imagem</label>
					<input type="file" id="strImagem" name="strImagem">
					<p class="help-block">Example block-level help text here.</p>
				</div>
					<div class="checkbox">
					<label for="strMensagem">Mensagem</label>
					<textarea class="form-control" name="strMensagem" rows="3"></textarea>
				</div>
				<button type="submit" class="btn btn-default" name="inserir_mensagem">Submit</button>
			</form>
		</section>
		<section id="creditos">
			<address>
			  <strong>Copyright &copy; 2016 Talita Oliveira. All rights reserved.</strong><br>
			  <a href="mailto:litaa.oliveira@gmail.com">litaa.oliveira@gmail.com</a><br>
			  <abbr title="Phone">Celular:</abbr> (81) 99955-7316
			</address>
		</section>
	</div>
</body>
</html>