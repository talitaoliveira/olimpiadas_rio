$(document).ready(function(){

	$("#nova-mensagem").css("display","none");
	$("#creditos").css("display","none");

	$(".menu-nova-mensagem").click(function(){
		$("#nova-mensagem").css("display","block");
		$("#mensagens").css("display","none");
		$("#creditos").css("display","none");
	});

	$(".menu-home").click(function(){
		$("#nova-mensagem").css("display","none");
		$("#mensagens").css("display","block");
		$("#creditos").css("display","none");
	});

	$(".menu-creditos").click(function(){
		$("#nova-mensagem").css("display","none");
		$("#mensagens").css("display","none");
		$("#creditos").css("display","block");
	});

});



