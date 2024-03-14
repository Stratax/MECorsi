function show(n){
	switch(n){
		case 1:
			$("#title").text("Inicio")
			$(".panel").hide();
			$("#menu1").show();
			$("li").css("background-color","transparent");
			$("#m_Home").css("background-color","#3080C0");
		break;
		case 2:
			$("#title").text("Usuarios")
			$(".panel").hide();
			$("#menu2").show();
			$("li").css("background-color","transparent");
			$("#m_User").css("background-color","#3080C0");
			$("#userHolder").load("../php/getUser.php");
		break;
		case 3:
			$("#title").text("Transportes")
			$(".panel").hide();
			$("#menu3").show();
			$("li").css("background-color","transparent");
			$("#m_Trans").css("background-color","#3080C0");
			$("#showLista").load("../php/getTransportadora.php");
			$("#showListaOp").load("../php/getOperator.php",{Transportadora: 0});
		break;
		case 4:
			$("#title").text("Boleta de Selección")
			$(".panel").hide();
			$("#menu4").show();
			$("li").css("background-color","transparent");
			$("#m_Select").css("background-color","#3080C0");
		break;
	}
}

$(document).ready(function(){
	
	$("#userIcon").click(function(){$("#userDiv").slideToggle(100);});

	$("#m_Home").click(function(){show(1);});
	$("#m_User").click(function(){show(2);});
	$("#m_Trans").click(function(){show(3);});
	$("#m_Select").click(function(){show(4);});

	$("#transElement1").click(function(){alert("Hola")});

	
	
});

