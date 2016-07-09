$(document).ready(function(){

	/*$('#formNovaMensagem').submit(function(){
		var dados = $('#formNovaMensagem').serialize();

		$.post(
			"classes/InserirMensagem.php",
			{data: dados},
			function( data )
			{
				alert( data );
			}
		);

		return false;
	});*/

	$("#nova-mensagem").css("display","none");
	$("#creditos").css("display","none");

	$("#menu-nova-mensagem").click(function(){
		$("#nova-mensagem").css("display","block");
		$("#mensagens").css("display","none");
		$("#creditos").css("display","none");
	});

	$("#menu-home").click(function(){
		$("#nova-mensagem").css("display","none");
		$("#mensagens").css("display","block");
		$("#creditos").css("display","none");
	});

	$("#menu-creditos").click(function(){
		$("#nova-mensagem").css("display","none");
		$("#mensagens").css("display","none");
		$("#creditos").css("display","block");
	});

});



